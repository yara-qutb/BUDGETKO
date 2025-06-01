<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class JsonController extends Controller
{
    public function index()
    {
        $jsonData = json_decode(file_get_contents(storage_path('app/raneen.json')), true);
        // Perform any further operations with $jsonData
        return view('home', compact('jsonData'));
    }
}
