<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function showCart(Request $request){
        $fullName = Auth::user()->name;
        $userName = explode(' ', $fullName)[0];
        $user = Auth::user()->id;
        $carts = Cart::where('user_id', $user)->get();
        return view('user.cart',compact('carts'), ['userName' => $userName]);
    }

    public function deleteCart($id){
        $deletedItem=Cart::findOrFail($id);
        $deletedItem->delete();
        $locale = App::getLocale();
        if ($locale == 'ar') {
            return redirect()->back()->with("success","تم حذف المنتج بنجاح");
        }else{
            return redirect()->back()->with("success","Product removed successfully");
        }
    }
    public function deleteCartAll(){
        Cart::truncate();
        $locale = App::getLocale();
        if ($locale == 'ar') {
            return redirect()->back()->with("success","تم حذف جميع المنتاجات بنجاح");
        }else{
            return redirect()->back()->with("success","All product removed successfully");
        }
    }
}
