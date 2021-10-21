<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class NasaController extends Controller
{
    public $apiKey = '9fxvumg4fZym9Wp1zLA6NCMrQihW05pqlThxes9t';

    public function apod()
    {

        $response = Http::get('https://api.nasa.gov/planetary/apod', [
            'api_key' => $this->apiKey
        ]);

        if ($response->ok()) {
            
            return response()->json($response->json(), 200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Data not found'
            ]);
        }
    }

    public function neo($start, $end)
    {
        $response = Http::get('https://api.nasa.gov/neo/rest/v1/feed', [
            'start_date' => $start,
            'end_date' => $end,
            'api_key' => $this->apiKey
        ]);

        if ($response->ok()) {
            return response()->json($response->json(), 200);
        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Data not foud'
            ]);
        }
    }

    public function neoBrowser()
    {
        $response = Http::get('https://api.nasa.gov/neo/rest/v1/neo/browse', [
            'api_key' => $this->apiKey
        ]);

        if ($response->ok()) {
            return response()->json($response->json());

        } else {
            return response()->json([
                'status' => 404,
                'error' => 'Data not foud'
            ]);
        }
    }
    
}
