@extends('layouts.app')
@section('title', 'fightなび')
@section('content')
    <div class="container">

        @include('parts/top_search')

        <div class="row mx-auto">
            <div class="col-md-12 my-5">
                <div>
                    <img src="{{ asset('image/macOS-Guest-user-logo-icon.jpg') }}" class="mx-auto d-block" alt="ゲストさん" width="70">
                </div>
                <div>
                    <p class="text-center">こんにちは、ゲストさん</p>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary mb-2">ログインはこちらから</button>
                </div>
                <div class="text-center">
                    <a href="#">新規登録はこちらから</a>
                </div>
            </div>
        </div>
    </div>
@endsection
