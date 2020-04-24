@extends('layouts.app')
@section('title', '新規レビュー')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h2 class="text-center page-title">レビューの投稿</h2>
                <div class="card">
                    <div class="card-body mypage-body">

                        <div>
                            <a href="{{ action('User\UserController@shop', ['id' => $shop->id]) }}">
                            <p class="review-shop">{{ $shop->name }}</P></a>
                            <p class="review-address"><i class="fas fa-map-marker-alt fa-lg"></i> {{ $shop->address_ken }}  {{ $shop->address_city }}</p>
                        </div>

                        <div class="profile my-3">
                            <label class="type">ジャンル：</label>
                            <ul class="type-list">
                                @foreach($shop->types as $type)
                                    <li class="type-text"><i class="fas fa-check"></i> {{ $type->name }}</li>
                                @endforeach
                            </ul>
                        </div>

                        <form action="{{ route('review.create') }}" method="post">

                            @if (count($errors) > 0)
                                <ul>
                                    @foreach($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <div class="form-group row">
                                <p for="resson" class="col-sm-3 col-lg-2 col-form-label review-label">レッスン</p>
                                <select name="resson" class="col-sm-9 col-lg-10 form-control">
                                    @include('parts/review/resson');
                                </select>
                            </div>

                            <div class="form-group row">
                                <p for="price" class="col-sm-3 col-lg-2 col-form-label review-label">値段</p>
                                <select name="price" class="col-sm-9 col-lg-10 form-control">
                                    @include('parts/review/price');
                                </select>
                            </div>

                            <div class="form-group row">
                                <p for="clean" class="col-sm-3 col-lg-2 col-form-label review-label">清潔さ</p>
                                <select name="clean" class="col-sm-9 col-lg-10 form-control">
                                    @include('parts/review/clean');
                                </select>
                            </div>

                            <div class="form-group row">
                                <p for="service" class="col-sm-3 col-lg-2 col-form-label review-label">接客</p>
                                <select name="service" class="col-sm-9 col-lg-10 form-control">
                                    @include('parts/review/service');
                                </select>
                            </div>

                            <div class="form-group row">
                                <p for="atmosphere" class="col-sm-3 col-lg-2 col-form-label review-label">雰囲気</p>
                                <select name="atmosphere" class="col-sm-9 col-lg-10 form-control">
                                    @include('parts/review/atmosphere');
                                </select>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label review-label">良いと思うところ</label>
                                <textarea rows="10" cols="200" name="merit" class="form-control" placeholder="ご自由にお書きください"></textarea>
                            </div>

                            <div class="form-group row">
                                <label class="col-form-label review-label">直した方が良いと思うところ</label>
                                <textarea rows="10" cols="200" name="demerit" class="form-control" placeholder="ご自由にお書きください"></textarea>
                            </div>

                            <input type="hidden" name="shop_id" value="{{ $shop->id }}">

                            <div class="form-group row justify-content-center">
                                <div class="revier-btn-group">
                                    <a href="#" class="btn btn-success review-btn">戻る</a>

                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary review-btn" value="投稿">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
