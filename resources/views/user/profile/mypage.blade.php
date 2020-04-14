@extends('layouts.app')
@section('title', 'マイページ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 mx-auto">
                <div>
                    <p class="profile-img"><img src="{{ asset('image/macOS-Guest-user-logo-icon.jpg') }}" alt="name" class="rounded-pill"></p>
                </div>
                <div>
                    <p class="text-left">{{ Auth::user()->name }}</p>
                    <label for="introduction">自己紹介</label>
                    <p class="text-left">{{ Auth::user()->introduction }}</p>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h5 class="text-center">最近の投稿</h5>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-12 mx-auto">
                <div class="card">
                    <div class="card-body">
                        <div>
                            <p class="review-user"><img src="{{ asset('image/macOS-Guest-user-logo-icon.jpg') }}" alt="name" class="rounded-pill"></p>

                            <p> name </p>
                        </div>
                        <div>
                            <p>レビュー</p>
                            <p> GYM_name / adress / city </p>
                            <p>ジャンル： type </p>
                            <p>レッスン： resson </p>
                            <p>値段　： price </p>
                            <p>レッスン： resson </p>
                            <p>清潔さ： clean </p>
                            <p>接客　： service </p>
                            <p>雰囲気： atmosphere</p>
                        </div>
                        <div>
                            <p>感想</p>
                            <p> body </p>
                        </div>

                        <div>
                            <p>更新日時</p>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div>
                                <input type="submit" class="btn btn-success mx-3 mt-5 mb-3 px-5 rounded-pill" value="編集">
                                <input type="submit" class="btn btn-danger mx-3 mt-5 mb-3 px-5 rounded-pill" value="削除">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
