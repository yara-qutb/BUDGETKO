<?php

use App\Http\Controllers\ApiAddToController;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ApiCommunityController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Authentication
Route::controller(ApiAuthController::class)->group(function(){
    Route::post("register","register");
    Route::post("login","login");
    Route::post("logout","logout");
    Route::get('profile/{id}','showProfile');
    Route::put('profile/update/{id}','updateProfile');
});


// Community
Route::controller(ApiCommunityController::class)->group(function(){
    //posts
    Route::get("posts","allPosts");
    Route::get("post/{id}","showPost");
    Route::post("post","createPost");
    Route::put("post/{id}","updatePost");
    Route::delete("post/{id}","deletePost");
    //comments
    Route::get("comments","allComments");
    Route::get("comment/{id}","showComment");
    Route::post("comment/{id}","createComment");
    Route::put("comment/{id}","updateComment");
    Route::delete("comment/{id}","deleteComment");
});


// fav and cart
Route::controller(ApiAddToController::class)->group(function(){
    Route::get('/cart' ,'showCart');
    Route::post('/cart/add' ,'addToCart');
    Route::post('/favorite/add' ,'addToFav');
    Route::get('/favorite' ,'showFav');
    Route::delete('/cart/{id}', 'removeFromCart');
    Route::delete('/cart', 'clearCart');
    Route::delete('/favorite/{id}', 'removeFromFav');
    Route::delete('/favorite', 'clearFav');
    Route::post('/search', 'search');
    Route::post('/budget', 'budget');
});





// Route::middleware('apiLocalization')->get("change/{lang}",function($lang){
//     $translations = Lang::get('message');

//     // Optionally, you can filter or modify the translations as needed

//     return response()->json([
//         'translations' => $translations,
//         'lang' => $lang,
//     ]);
// });
