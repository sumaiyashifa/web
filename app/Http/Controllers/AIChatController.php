<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Cache;

class AIChatController extends Controller
{
    /**
     * Handle incoming chat messages and proxy to the AI backend.
     */
    public function chat(Request $request)
    {
        // Rate limiting: max messages per minute per IP
        $rateLimit = config('ai.rate_limit', 30);
        $cacheKey = 'ai_chat_' . $request->ip();
        $attempts = Cache::get($cacheKey, 0);

        if ($attempts >= $rateLimit) {
            return response()->json([
                'reply' => '⏳ You\'re sending messages too quickly. Please wait a moment before trying again.',
                'suggestions' => ['Contact support'],
                'category' => 'rate_limited'
            ], 429);
        }

        Cache::put($cacheKey, $attempts + 1, 60); // expires in 60 seconds

        // Gather request data
        $userName = auth()->check() ? auth()->user()->name : 'anonymous';
        $message = $request->input('message', '');
        $sessionId = $request->input('session_id', $request->ip());

        if (empty(trim($message))) {
            return response()->json([
                'reply' => 'Please type a message to get started! 😊',
                'suggestions' => ['How to find jobs?', 'How to register?', 'Contact support'],
                'category' => 'empty'
            ]);
        }

        try {
            // Proxy to Python AI backend
            $backendUrl = config('ai.backend_url', 'http://127.0.0.1:5000');
            $timeout = config('ai.timeout', 10);

            $response = Http::timeout($timeout)->post("{$backendUrl}/chat", [
                'user' => $userName,
                'message' => $message,
                'session_id' => $sessionId,
            ]);

            if ($response->successful()) {
                $data = $response->json();

                // Log chat if enabled
                if (config('ai.log_chats', true)) {
                    Log::channel('single')->info('AI Chat', [
                        'user' => $userName,
                        'message' => $message,
                        'category' => $data['category'] ?? 'unknown',
                    ]);
                }

                return response()->json([
                    'reply' => $data['reply'] ?? 'I received your message!',
                    'suggestions' => $data['suggestions'] ?? [],
                    'category' => $data['category'] ?? 'unknown',
                    'timestamp' => $data['timestamp'] ?? now()->toISOString(),
                ]);
            }

            // Backend returned an error status
            return $this->fallbackResponse();

        } catch (\Exception $e) {
            Log::error('AI Chat Backend Error: ' . $e->getMessage());
            return $this->fallbackResponse();
        }
    }

    /**
     * Clear chat history for the current session.
     */
    public function clearChat(Request $request)
    {
        $sessionId = $request->input('session_id', $request->ip());

        try {
            $backendUrl = config('ai.backend_url', 'http://127.0.0.1:5000');
            Http::timeout(5)->post("{$backendUrl}/chat/clear", [
                'session_id' => $sessionId,
            ]);

            return response()->json(['status' => 'cleared']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'cleared']); // Clear locally even if backend fails
        }
    }

    /**
     * Return a graceful fallback response when the AI backend is unavailable.
     */
    private function fallbackResponse()
    {
        return response()->json([
            'reply' => config('ai.fallback_response', 'Our AI assistant is currently taking a break. Please use the contact form or email us at hello@freelancehub.io for support. 📧'),
            'suggestions' => ['Fill out contact form', 'Email support', 'Try again later'],
            'category' => 'offline',
        ]);
    }
}
