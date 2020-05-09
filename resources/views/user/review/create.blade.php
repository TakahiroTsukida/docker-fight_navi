@extends('layouts.app')
@section('title', '新規レビュー')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                @if (session('flash_message_user_login'))
                <div class="flash_message alert-primary text-center rounded py-3 my-2">
                    {{ session('flash_message_user_login') }}
                </div>
                @endif
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

                        <form action="{{ route('user.review.create') }}" method="post">

                            @error('total_point')
                                <div>
                                    <p class="error price-en">{{ $message }}</p>
                                </div>
                            @enderror
                            <div class="form-group row">
                                <p class="col-sm-3 col-lg-2 col-form-label review-label">総合評価</p>
                                <select name="total_point" class="col-sm-9 col-lg-10 form-control">
                                    @include('parts/review/total_point')
                                </select>
                            </div>

                            @error('learn')
                                <div>
                                    <p class="error price-en">{{ $message }}</p>
                                </div>
                            @enderror
                            <div class="form-group row">
                                <p class="col-sm-3 col-lg-2 col-form-label review-label">通い方</p>
                                <select name="learn" class="col-sm-9 col-lg-10 form-control">
                                    @include('parts/review/learn')
                                </select>
                            </div>

                            @error('season')
                                <div>
                                    <p class="error price-en">{{ $message }}</p>
                                </div>
                            @enderror
                            <div class="form-group row">
                                <p class="col-sm-3 col-lg-2 col-form-label review-label">時期</p>
                                <select name="season" class="col-sm-9 col-lg-10 form-control">
                                    @include('parts/review/season')
                                </select>
                            </div>

                            @error('merit')
                                <div>
                                    <p class="error price-en">{{ $message }}</p>
                                </div>
                            @enderror
                            <div class="form-group row">
                                <label class="col-form-label review-label">良かったところ</label>
                                <textarea rows="10" cols="200" name="merit" class="form-control" placeholder="ご自由にお書きください"></textarea>
                            </div>

                            @error('demerit')
                                <div>
                                    <p class="error price-en">{{ $message }}</p>
                                </div>
                            @enderror
                            <div class="form-group row">
                                <label class="col-form-label review-label">イマイチなところ</label>
                                <textarea rows="10" cols="200" name="demerit" class="form-control" placeholder="ご自由にお書きください"></textarea>
                            </div>

                            <input type="hidden" name="shop_id" value="{{ $shop->id }}">

                            <div class="form-group row justify-content-center">
                                <div class="revier-btn-group">
                                    <button type="button" class="btn btn-success show-btn" onclick=history.back()>戻る</button>

                                    {{ csrf_field() }}
                                    <input type="submit" class="btn btn-primary show-btn" value="投稿">
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
