@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title', 'COACHTECH')

@section('button')
<nav class="header-nav">
    <!-- <form class="form_logout" action="/logout" method="post">
        @csrf
        <button class="header-nav__button">logout</button>
    </form> -->
    <a class="header-nav__link" href="/register">register</a>
    <a class="header-nav__link" href="/login">login</a>
</nav>
@endsection

@section('content')
<div class="detail-page">
    <div class="detail">
        <h2>商品詳細</h2>
    </div>
    <form action="{{ route('product.like', ['id'=>$product->id]) }}" method="POST">
        @csrf
        <button type="submit" class="">いいね
        </button>
    </form>
    <form class="detail-form" action="/" method="post" enctype="multipart/form-data">
        @csrf
    <div class="detail-contents__upper">
        <input type="hidden" name="id" value="{{ $product['id'] }}"/>
        <div class="detail__figure">
            <figure id="existFigure" class="detail__figure-exist">
                <img src="{{ $product['image'] }}" alt="">
            </figure>
            <figure id="figure" style="display:none">
                <img id="figureImage">
            </figure>
        </div>
        <div class="edit-form__contents">
            <div class="edit-form__content">
                <span>商品名</span>
                <p>{{ $product['name'] }}</p>
            </div>
            <div class="edit-form__content">
                <span>値段</span>
                <p>{{ $product['price'] }}</p>
            </div>
        </div>
    </div>
    <div class="form__button">
        <button class="form__button-submit" type="submit">購入手続きへ</button>
    </div>
    <div class="edit-contents__lower">
        <span>商品説明</span>
        <p name="description" class="p-content">{{ $product['description'] }}</p>
    </div>
    <div class="edit-form__content">
        <span>商品の情報</span>
        <span>カテゴリー</span>
        @foreach ($product->categories as $category)
        <label class="category__content">
            <p>{{$category->name}}</p>
        </label>
        @endforeach
        <span>商品の状態</span>
            <?php
                if ($product['condition_id'] == '1') {
                echo '良好';
                } else if ($product['condition_id'] == '2') {
                echo '目立った傷や汚れなし';
                } else if ($product['condition_id'] == '3') {
                echo '商品トラブル';
                } else if ($product['condition_id'] == '4') {
                echo 'やや傷や汚れあり';
                } else if ($product['condition_id'] == '5') {
                echo '状態が悪い';
                }
                ?>
    </div>
    </form>
    <form class="form" action="{{ route('product.comment', ['id'=>$product->id])}}" method="post">
        @csrf
        <span>コメント</span>
        <span>商品へのコメント</span>
        @foreach ($comment->comments as $comment)
        <label class="seasons__content">
            <p>{{$comment->comment}}</p>
        </label>
        @endforeach
        <textarea name="comment" placeholder="コメントを入力" value="{{ old('comment') }}" ></textarea>
        <button class="form__button-submit" type="submit">コメントを送信する</button>
    </form>
</div>
@endsection