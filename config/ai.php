<?php

return [

    /*
    |--------------------------------------------------------------------------
    | AI Backend Configuration
    |--------------------------------------------------------------------------
    |
    | Configuration for the FreelanceHub AI Chat Agent backend service.
    | The AI agent runs as a separate Python FastAPI service.
    |
    */

    // Base URL of the Python AI backend server
    'backend_url' => env('AI_BACKEND_URL', 'http://127.0.0.1:5000'),

    // Request timeout in seconds
    'timeout' => env('AI_BACKEND_TIMEOUT', 10),

    // Rate limiting: max messages per minute per IP
    'rate_limit' => env('AI_CHAT_RATE_LIMIT', 30),

    // Fallback response when the AI backend is unavailable
    'fallback_response' => 'Our AI assistant is currently offline. Please use the contact form above or email us at hello@freelancehub.io for support.',

    // Enable/disable chat history logging
    'log_chats' => env('AI_LOG_CHATS', true),

];
