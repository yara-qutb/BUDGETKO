<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

class ProductController extends Controller
{
    public function scrapeProducts($i, HomeController $data)
    {
        $product = $data['products'][$i];
        return view('user.product', ['product' => $product]);
    }
}
