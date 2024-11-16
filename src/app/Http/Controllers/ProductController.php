<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Condition;
use App\Models\Like;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    //
    public function index(){
        // $products = Product::Paginate(7);
        $products = Product::all();
        return view('/index', ['products' => $products]);
    }

    public function productDetail(Request $request){

        $product = Product::find($request->id);
        $comment = comment::where('product_id', $request->id)->get();
        Log::debug($comment);
        $categories = Category::all();
        return view('/product', compact('product', 'categories', 'comment'));
    }

    public function addComment(Request $request){
        $product = Product::find($request->id);
        return redirect('/product');
    }


public function like(Request $request)
    {
        $user = User::find($request->user()->id);
        $isLiked = $user->likes()->where('product_id', $request->id)->exists();

        if ($isLiked) {
        $user->likes()->detach($request->id);
        } else {
        $user->likes()->attach($request->id);

        }

        return back();
    }

public function comment(Request $request)
    {
        $user = User::find($request->user()->id);
        // $user->comments()->attach($request->id,$request->comment);
       $comment = new Comment();
       $comment->comment = $request->comment;
       $comment->product_id = $request->id;
       $comment->user_id = $request->user()->id;
       $comment->save();
        return back();
    }
}