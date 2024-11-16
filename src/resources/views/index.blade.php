@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title', 'COACHTECH')

@section('button')
<nav class="header-nav">
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
    <form class="form_logout" action="/logout" method="post">
        @csrf
        <button class="header-nav__button">logout</button>
    </form>
</nav>
@endsection

@section('content')
<div class="admin_content">
    <div class="admin-form__heading">
    </div>
        @foreach ($products as $product)
            <li>
                <a href="{{ route('product.detail', ['id'=>$product->id]) }}" class="product-list__link">
                <div class="products-list__item">
                        <img src="{{ $product['image'] }}" alt="">
                    <div class="products-list_text">
                        <span class="">{{$product->name}}</span>
                        <span class="">¥{{$product->price}}</span>
                    </div>
                </div>
                </a>
            </li>
        @endforeach
        </table>
    </div>
</div>
@endsection