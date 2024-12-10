@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/sell.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/js/preview.js') }}"></script>
@endsection


@section('title', 'COACHTECH')

@section('content')
<div class="edit-page">
    <div class="edit__heading">
        <h2>商品の出品</h2>
    </div>
    <!-- <form class="edit-form" action="/products/{id}/update" method="post" enctype="multipart/form-data"> -->
    <form class="edit-form" action="/sell" method="post" enctype="multipart/form-data">
        @csrf
    <div class="edit-contents">
        <input type="hidden" name="id" value=""/>
        <div class="edit__figure">
            <figure id="existFigure" class="edit__figure-exist">
                <img src="" alt="">
            </figure>
            <input id="input" type="file" name="image" value=""/>
            <div class="form__error">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="edit-form__content">
            <span>商品の詳細</span>
            <span>カテゴリー</span>
            <div class="content__seasons">
                @foreach ($categories as $category)
                <label class="category__content">
                    <input type="checkbox" name="category_ids[]" value="{{$category->id}}"/>
                {{$category->name}}
                </label>
                @endforeach
            </div>
            <div class="form__error">
                @error('category_ids')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="edit-form__content">
            <span>商品の状態</span>
            <select class="search-form__item-category" name="condition_id">
            <option value="">選択してください</option>
            @foreach ($conditions as $condition)
            <option value="{{ $condition['id'] }}">{{ $condition['name'] }}</option>
            @endforeach
            </select>
            <div class="form__error">
                @error('condition_id')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="edit-form__content">
            <span>商品名と説明</span>
            <span>商品名</span>
            <input type="text" name="name" value="{{ old('name') }}"/>
            <div class="form__error">
                @error('name')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="edit-contents__lower">
            <span>商品の説明</span>
            <textarea name="description" class="textarea-content">{{ old('description') }}</textarea>
            <div class="form__error">
                @error('description')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="edit-form__content">
            <span>販売価格</span>
            <input type="text" name="price" value="{{ old('price') }}"/>
            <div class="form__error">
                @error('price')
                    {{ $message }}
                @enderror
            </div>
        </div>
    </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">出品する</button>
        </div>
    </form>
</div>
@endsection