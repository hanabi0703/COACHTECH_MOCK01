@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/js/preview.js') }}"></script>
@endsection


@section('title', 'COACHTECH')

@section('content')
<div class="edit-page">
    <div class="edit__heading">
    </div>
        @csrf
    <div class="edit-contents__upper">
        <div class="edit__figure">
            <figure id="existFigure" class="edit__figure-exist">
                <img src="" alt="">
            </figure>
        </div>
        <div class="edit-form__contents">
            <div class="edit-form__content">
                <p>{{ $user['name'] }}</p>
            </div>
        </div>
    </div>
    <div class="form__button">
        <a class="form__button-back" href="/mypage/profile">プロフィールを編集</a>
    </div>
    <div class="sell_product">
    <span>出品した商品</span>
    @foreach ($products as $product)
        <li>
            <a href="{{ route('product.detail', ['id'=>$product->id]) }}" class="product-list__link">
            <div class="products-list__item">
                    <img src="{{ asset('storage/images/'. $product->image) }}" alt="">
                <div class="products-list_text">
                    <span class="">{{$product->name}}</span>
                </div>
            </div>
            </a>
        </li>
    @endforeach
    </div>
    <div class="sell_product">
    <span>購入した商品</span>
    @foreach ($purchases as $purchase)
        <li>
            <a href="{{ route('product.detail', ['id'=>$purchase->id]) }}" class="product-list__link">
            <div class="products-list__item">
                    <img src="{{ asset('storage/images/'. $purchase->image) }}" alt="">
                <div class="products-list_text">
                    <span class="">{{$purchase->name}}</span>
                </div>
            </div>
            </a>
        </li>
    @endforeach
    </div>
</div>
@endsection