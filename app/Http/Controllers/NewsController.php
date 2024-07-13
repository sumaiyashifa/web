<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $client = new Client();
        $response = $client->request('GET', 'https://newsapi.org/v2/top-headlines', [
            'query' => [
                'q' => 'company',         // Search query for jobs
                'pageSize' => 15,      // Limit the number of results to 10
                'apiKey' => env('NEWS_API_KEY'),
            ]
        ]);
        $skillDev = $client->request('GET', 'https://newsapi.org/v2/top-headlines', [
            'query' => [
                'q' => 'career',         // Search query for jobs
                'pageSize' => 15,      // Limit the number of results to 10
                'apiKey' => env('NEWS_API_KEY'),
            ]
        ]);
        $latestNews = $client->request('GET', 'https://newsapi.org/v2/top-headlines', [
            'query' => [
                'q' => 'latest',         // Search query for jobs
                'pageSize' => 15,      // Limit the number of results to 10
                'apiKey' => env('NEWS_API_KEY'),
            ]
        ]);
        $popularNews = $client->request('GET', 'https://newsapi.org/v2/top-headlines', [
            'query' => [
                'q' => 'popular',         // Search query for jobs
                'pageSize' => 15,      // Limit the number of results to 10
                'apiKey' => env('NEWS_API_KEY'),
            ]
        ]);
        $headlines = json_decode($response->getBody(), true);
        $motivation = json_decode($skillDev->getBody(), true);
        $latest = json_decode($latestNews->getBody(), true);
        $popular = json_decode($popularNews->getBody(), true);

        return view('news', compact('headlines','motivation','popular','latest'));
    }
}
