@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/js/preview.js') }}"></script>
@endsection


@section('title', 'COACHTECH')

@section('content')
<div class="edit-page">
    <div class="edit__heading">
        <h2>プロフィール設定</h2>
    </div>
    <form class="detail-form" action="{{ route('profile.update') }}" method="post">
        @csrf
    <div class="edit-contents__upper">
        <input type="hidden" name="id" value="{{ $user['id'] }}"/>
        <div class="edit__figure">
            <figure id="existFigure" class="edit__figure-exist">
                <img src="" alt="">
            </figure>
            <input id="input" type="file" name="image" value="{{ $profile['image'] }}"/>
            <div class="form__error">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="edit-form__contents">
            <div class="edit-form__content">
                <span>ユーザー名</span>
                <input type="text" name="name" value="{{ $user['name'] }}"/>
                <div class="form__error">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="edit-form__content">
                <span>郵便番号</span>
                <input type="text" name="post_code" value="{{ $profile['post_code'] }}"/>
                <div class="form__error">
                    @error('post_code')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="edit-contents__lower">
        <span>住所</span>
            <input type="text" name="address" value="{{ $profile['address'] }}"/>
        <div class="form__error">
            @error('address')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="edit-contents__lower">
        <span>建物名</span>
            <input type="text" name="building" value="{{ $profile['building'] }}"/>
        <div class="form__error">
            @error('building')
                {{ $message }}
            @enderror
        </div>
    </div>
        <div class="form__button">
            <button class="form__button-submit" type="submit">変更する</button>
        </div>
    </form>
</div>
@endsection