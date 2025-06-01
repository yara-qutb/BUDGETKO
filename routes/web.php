<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

////////////////////HOME//////////////////////////
Route::controller(HomeController::class)->group(function(){
    Route::get('/','home' );
    Route::get("/product/{i}",'scrapeProducts')->name('product');
    Route::get("/product",'product')->name('search_product');
    Route::get("/product-cart/{id}",'getCartProducts')->name('getCartProducts');
    Route::get("/product-fav/{id}",'getFavProducts')->name('fav');
    Route::get("/topoffer/{x}",'topOffers')->name('topoffers');
    Route::get("/sale/{y}",'sales')->name('sales');
    Route::get("/search",'search')->name('search');
    Route::get("/category/{trans}",'category')->name('category');
    Route::put('/update-cart/{id}', 'updateCart')->name('update-cart');
});
// ////////////////////END HOME//////////////////////////
// Route::get("/search",function(){
//     return view('user.search');
// });

////////////////////CART & FAV/////////////////////
Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',
])->group(function () {
    ///////////////////////CART////////////////////////
    Route::post("/addToCart",[HomeController::class,'cart'])->name('addToCart');
    Route::controller(CartController::class)->group(function(){
        Route::delete("/delete/cart/{id}",'deleteCart')->name('deleteCart');
        Route::delete("/delete/cart-all",'deleteCartAll')->name('deleteCartAll');
        Route::get("/cart",'showCart')->name('cart');
    });
    ///////////////////////END CART////////////////////////
    Route::post("/goToCommunity",[HomeController::class,'goToCommunity'])->name('goToCommunity');

    ///////////////////////FAVORITE////////////////////////
    Route::post("/addToFavorite",[HomeController::class,'favorite'])->name('addToFavorite');
    Route::controller(FavoriteController::class)->group(function(){
        Route::get("/favorite",'showFavorite')->name('cart');
        Route::delete("/delete/favorite/{id}",'deleteOne')->name('deleteOne');
        Route::delete("/delete/favorite-all",'deleteFavoriteAll')->name('deleteFavoriteAll');
    });
    ///////////////////////END FAVORITE////////////////////////
});
////////////////////END CART & FAV/////////////////////

//////////////////budget_search///////////////////////
Route::get('/budget_search', function () {
    if (Auth::check()) {
        $fullName = Auth::user()->name;
        $userName = explode(' ', $fullName)[0];
        return view('user.budget-search',['userName' => $userName]);

    } else {
        return view('user.budget-search');
    }
});
//////////////////END budget_search///////////////////////

//////////////////budget_details///////////////////////
Route::get('/budget_details',[BudgetController::class, 'budget'])->name('budget');
// Route::post('/budget_details',[BudgetController::class, 'budget'])->name('budget');
//////////////////END budget_details///////////////////////

//////////////////PRODUCT///////////////////////
// Route::get('/product', function () {
//     if (Auth::check()) {
//         $fullName = Auth::user()->name;
//         $userName = explode(' ', $fullName)[0];
//         return view('user.product', ['userName' => $userName]);
//     } else {
//         return view('user.product');
//     }
// });
//////////////////END PRODUCT///////////////////////

// Start Socialite
Route::controller(LoginController::class)->group(function(){
    Route::get("login/google",'redirectGoogle')->name('login.google');
    Route::get("login/google/callback",'redirectGoogleCallback');

    Route::get("login/facebook",'redirectGoogle')->name('login.facebook');
    Route::get("login/facebook/callback",'redirectGoogleCallback');
});
// End Socialite

// Localization
Route::get('change/{lang}', function($lang) {
    if ($lang == 'ar' || $lang == 'en') {
        session()->put('lang', $lang);
    }
    return redirect()->back();
})->name('change.language');
// End Localization

// Profile
Route::controller(UserController::class)->group(function(){
    Route::get('/profile','profile');
    Route::put('/profile/update','updateProfile');
});
// End Profile

// Community
Route::controller(PostController::class)->group(function(){
    //create and show all
    Route::get('/community','create')->name('posts.show');
    //show user posts
    Route::get('/user/{id}', 'showMyPosts')->name('user.posts');
    //store
    Route::post('/store','store')->name('store');
    //delete one
    Route::delete('/post/{id}','deletePost')->name('deleteOnePost');
    //delete all
    Route::delete('/posts', 'deleteAllPosts')->name('deleteAllPosts');
});

// comments
Route::get('/comment',function(){
    if (Auth::check()) {
        $fullName = Auth::user()->name;
        $userName = explode(' ', $fullName)[0];
        return view('user.reviews',['userName' => $userName]);
    } else {
        return view('user.reviews');
    }
});
Route::controller(CommentController::class)->group(function(){
    Route::post('/post/{id}/comment', 'addComment')->name('post.comment');
    Route::get('/post/{id}', 'show')->name('post.show');
});
// END comments

