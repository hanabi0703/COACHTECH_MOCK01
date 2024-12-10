<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Profile;
use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Support\Facades\Log;
use App\Http\Requests\ProfileRequest;
use App\Http\Requests\AddressRequest;

class ProfileController extends Controller
{
    public function mypage()
    {
        $user = Auth::user();
        $products = Product::where('user_id','=', $user->id)->get();
        $purchases = Purchase::where('purchases.user_id','=', $user->id)->join('products' ,'purchases.product_id' ,'=', 'products.id')->get();
        //内部結合によってpurchaseテーブルにproductテーブルを結合して取得
        return view('/profile', compact('user', 'products', 'purchases'));
    }

    public function registerProfile()
    {
        $user = Auth::user();
        $profile = new Profile();
        $profile->user_id = $user->id;
        return view('/edit_profile', compact('user', 'profile'));
    }

    public function profile()
    {
        $user = Auth::user();
        $profile = Profile::where('user_id','=', $user->id)->first();
        return view('/edit_profile', compact('user', 'profile'));
    }

    public function updateProfile(AddressRequest $request)
    {
        $form = $request->all();
        Log::debug($request->id);
        unset($form['_token']);
        // if($request->image){
        // $image_path = $request->file('image')->store('public/images');
        // $form['image'] = basename($image_path);
        // }
        Profile::where('user_id','=', $request->id)->first()->update($form);
        $user = Auth::user();
        $products = Product::where('user_id','=', $user->id)->get();
        $purchases = Purchase::where('purchases.user_id','=', $user->id)->join('products' ,'purchases.product_id' ,'=', 'products.id')->get();
        return view('/profile', compact('user', 'products', 'purchases'));
    }
}
