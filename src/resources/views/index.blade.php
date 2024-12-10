@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title', 'COACHTECH')

@section('button')
    <form class="form" action="/" method="get">
    @csrf
        <div class="search-form__item">
            <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}">
        </div>
        <div class="search-form__button">
            <button class="search-form__button-submit" type="submit">検索</button>
            </div>
        </div>
    </form>
@endsection

@section('content')
<div class="admin_content">
    <div class="admin-form__heading">
    </div>
    <div>
    <span>おすすめ</span>
        @foreach ($products as $product)
            <li>
                <a href="{{ route('product.detail', ['id'=>$product->id]) }}" class="product-list__link">
                <div class="products-list__item">
                    <img src="{{ asset('storage/images/'. $product->image) }}" alt="">
                    <div class="products-list_text">
                        <span class="">{{$product->name}}</span>
                        <span class="">¥{{$product->price}}</span>
                    </div>
                </div>
                </a>
            </li>
        @endforeach
    </div>
    <div>
        <span>マイリスト</span>
        @foreach ($likes as $like)
            <li>
                <a href="{{ route('product.detail', ['id'=>$like->id]) }}" class="product-list__link">
                <div class="products-list__item">
                    <img src="{{ asset('storage/images/'. $like->image) }}" alt="">
                        <div class="products-list_text">
                        <span class="">{{$like->name}}</span>
                        <span class="">¥{{$like->price}}</span>
                    </div>
                </div>
                </a>
            </li>
        @endforeach
    </div>
</div>
@endsection