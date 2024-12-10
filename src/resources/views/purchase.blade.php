@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title', 'COACHTECH')

@section('content')
<div class="detail-page">
    <div class="detail">
        <h2>商品詳細</h2>
    </div>
    <form class="detail-form" action="/buy" method="post" enctype="multipart/form-data">
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
        <div class="edit-form__contents">
            <div class="edit-form__content">
                <span>支払い方法</span>
            <select class="search-form__item-gender" name="payment">
            <option value="1">コンビニ払い</option>
            <option value="2">カード払い</option>
            </select>
            </div>
        </div>
        <div class="edit-form__contents">
            <div class="edit-form__content">
                <a href="{{ route('purchase.address', ['id'=>$user->id]) }}">変更する</a>
                <span>配送先</span>
                <input type="hidden" name="post_code" value="{{ $profile['post_code'] }}"/>
                <input type="hidden" name="address" value="{{ $profile['address'] }}"/>
                <input type="hidden" name="building" value="{{ $profile['building'] }}"/>
                <p>〒{{ $profile['post_code'] }}</p>
                <p>{{ $profile['address'] }}</p>
                <p>{{ $profile['building'] }}</p>
            </div>
        </div>
    </div>
    <div class="form__content">
        <span>商品代金</span>
        <p>{{ $product['price'] }}</p>
    </div>
    <div class="form__content">
        <span>支払い方法</span>
        <p></p>
    </div>
    <button class="form__button-submit" type="submit">購入する</button>
    </form>
</div>
@endsection