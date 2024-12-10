<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Profile;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Condition;
use App\Models\Like;
use App\Models\Purchase;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\PurchaseRequest;
use App\Http\Requests\ExhibitionRequest;


class ProductController extends Controller
{
    public function index(){
        $products = Product::all();
        $likes = Like::where('likes.user_id','=', Auth::id())->join('products' ,'likes.product_id' ,'=', 'products.id')->get(); //Likes中間テーブルに基づいて商品テーブルから取得する
        return view('/index', compact('products', 'likes'));
    }

    public function sell(){
        $categories = Category::all();
        $conditions = Condition::all();
        return view('/sell', compact('categories', 'conditions'));
    }

    public function addProduct(ExhibitionRequest $request){
        Log::debug($request);
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        if($request->image){
            $image_path = $request->file('image')->store('public/images');
            $product->image = basename($image_path);
        }
        $product->user_id = $request->user()->id;
        $product->description = $request->description;
        $product->condition_id = $request->condition_id;
        $product-> is_sold_out = '0';
        $product->save();
        return redirect('/');
    }

    public function purchase(Request $request){
        $product = Product::find($request->id);
        $user = User::find($request->user()->id);
        $profile = Profile::where('user_id','=', $user->id)->first();
        return view('/purchase', compact('product', 'user', 'profile'));
    }

    public function editAddress(Request $request){
        $product = Product::find($request->id);
        return view('/edit_address', compact('product'));
    }

    public function updateAddress(Request $request){
        $product = Product::find($request->id);
        $user = User::find($request->user()->id);
        $profile = Profile::where('user_id','=', $user->id)->first();
        if($request->post_code != null){
            $profile->post_code = $request->post_code;
        }
        if($request->address != null){
            $profile->address = $request->address;
        }
        if($request->building != null){
            $profile->building = $request->building;
        }
        return view('/purchase', compact('product', 'user', 'profile'));
    }

    public function buy(PurchaseRequest $request){
        // $user = User::find($request->user()->id);
        $purchase = new Purchase(); //purchaseテーブルを操作するのと同義となる
        $purchase->payment = $request->payment;
        $purchase->post_code = $request->post_code;
        $purchase->address = $request->address;
        $purchase->building = $request->building;
        $purchase->product_id = $request->id;
        $purchase->user_id = $request->user()->id;
        $purchase->save();
        $product = Product::find($request->id);
        $product->is_sold_out = '1';
        $product->save();
        $products = Product::all();
        $likes = Like::where('likes.user_id','=', Auth::id())->join('products' ,'likes.product_id' ,'=', 'products.id')->get();
        return view('/index', compact('products', 'likes'));
    }

    public function productDetail(Request $request){
        $product = Product::find($request->id);
        $comments = comment::where('product_id','=', $request->id)->get();
        $categories = Category::all();
        return view('/product', compact('product', 'categories', 'comments'));
    }

    // public function addComment(Request $request){
    //     $product = Product::find($request->id);
    //     return redirect('/product');
    // }

    public function like(Request $request){
        $user = User::find($request->user()->id);
        $isLiked = $user->likes()->where('product_id', $request->id)->exists();
        if ($isLiked) {
        $user->likes()->detach($request->id);
        }
        else {
        $user->likes()->attach($request->id);
        }
        return back();
    }

public function comment(CommentRequest $request)
    {
        $user = User::find($request->user()->id);
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->product_id = $request->id;
        $comment->user_id = $request->user()->id;
        $comment->save();
        return back();
    }
}