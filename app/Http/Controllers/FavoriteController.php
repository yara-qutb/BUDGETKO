<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function showFavorite(){
        $fullName = Auth::user()->name;
        $userName = explode(' ', $fullName)[0];
        $user = Auth::user()->id;
        $favorites = Favorite::where('user_id', $user)->get();
        return view('user.favorite',compact('favorites'), ['userName' => $userName]);
    }
    public function deleteOne($id){
        $deletedItem=Favorite::findOrFail($id);
        $deletedItem->delete();
        $locale = App::getLocale();
        if ($locale == 'ar') {
            return redirect()->back()->with("success","تم حذف المنتج بنجاح");
        }else{
            return redirect()->back()->with("success","Product removed successfully");
        }
    }
    public function deleteFavoriteAll(){
        Favorite::truncate();
        $locale = App::getLocale();
        if ($locale == 'ar') {
            return redirect()->back()->with("success","تم حذف جميع المنتاجات بنجاح");
        }else{
            return redirect()->back()->with("success","All product removed successfully");
        }
    }

}
