<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Inertia\Inertia;

class GalleryController extends Controller
{
    public function index() 
    {
        return Inertia::render('Gallery');
    }

    public function getImages(Request $request)
    {
        $query = $request->input('search');

        $response = Http::withHeaders([
            'Authorization' => 'RM6px6Vm1VjGMay6EMta0cEpNxxaWH5YPjbBfq75qco4e7uh8PWAkM9n'
        ])->get('https://api.pexels.com/v1/search', [
            'query' => $query,
        ]);

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Unable to fetch data from Pexels'], 500);
        }
    }
    //
}
