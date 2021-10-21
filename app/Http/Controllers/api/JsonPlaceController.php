<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JsonPlaceController extends Controller
{
    public function index()
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts');

        if ($response->ok()) {
            return response()->json($response->json(), 200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Data not found'
            ]);
        }
    }

    public function store(Request $post)
    {

        $response = Http::withHeaders([
            'Content-type' => 'application/json'
        ])->post('https://jsonplaceholder.typicode.com/posts', [
            'title' => $post->title,
            'body' => $post->body,
            'userId' => $post->user_id
        ]);

        if ($response->status()==201) {
            return response()->json($response->json(), 200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Data not found'
            ]);
        }
    }

    public function show($post)
    {
        $response = Http::get('https://jsonplaceholder.typicode.com/posts', [
            'id' => $post
        ]);
      
        if ($response->status() == 200) {
            return response()->json($response->json());

        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Data not found'
            ]);
        }
    }
    
}
