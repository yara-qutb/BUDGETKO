<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FetchController extends Controller
{
    public function fetchProducts($keyword)
    {
        $response = Http::get("http://127.0.0.1:8000/scrape-products/$keyword");

        if ($response->successful()) {
            $products = $response->json();
            return view('test', ['products' => $products]);
        } else {
            return response()->json(['error' => 'Failed to fetch data'], $response->status());
        }
    }
}
