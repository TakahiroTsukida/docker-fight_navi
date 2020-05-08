@extends('layouts.app')
@section('title', 'レビューの編集')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-12">
          @if (session('flash_message_no_user_auth'))
            <div class="flash_message alert-danger text-center rounded py-3 my-2">
                {{ session('flash_message_no_user_auth') }}
            </div>
            @endif
            <h2 class="text-center page-title">レビューの編集</h2>
            <div class="card">
                <div class="card-body mypage-body">
                    <div>
                        <a href="{{ action('User\UserController@shop', ['id' => $review->shop_id]) }}">
                        <p class="review-shop">{{ $review->shop->name }}</P></a>
                        <p class="review-address"><i class="fas fa-map-marker-alt fa-lg"></i> {{ $review->shop->address_ken }}  {{ $review->shop->address_city }}</p>
                    </div>
                    <div class="profile my-3">
                        <label class="type">ジャンル：</label>
                        <ul class="type-list">
                            @foreach($review->shop->types as $type)
                                <li class="type-text"><i class="fas fa-check"></i> {{ $type->name }}</li>
                            @endforeach
                        </ul>
                    </div>

                    <form action="{{ route('user.review.update') }}" method="post">

                        @if (count($errors) > 0)
                            <ul>
                                @foreach($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        @endif

                        <div class="form-group row">
                            <p class="col-sm-3 col-lg-2 col-form-label review-label">総合評価</p>
                            <select name="total_point" class="col-sm-9 col-lg-10 form-control">
                                <option value="{{ $review->total_point }}" selected>{{ $review->total_point }}点</option>
                                @include('parts/review/total_point')
                            </select>
                        </div>

                        <div class="form-group row">
                            <p class="col-sm-3 col-lg-2 col-form-label review-label">通い方</p>
                            <select name="learn" class="col-sm-9 col-lg-10 form-control">
                                <option value="{{ $review->learn }}" selected>{{ $review->learn }}</option>
                                @include('parts/review/learn')
                            </select>
                        </div>

                        <div class="form-group row">
                            <p class="col-sm-3 col-lg-2 col-form-label review-label">時期</p>
                            <select name="season" class="col-sm-9 col-lg-10 form-control">
                                <option value="{{ $review->season }}" selected>{{ $review->season }}</option>
                                @include('parts/review/season')
                            </select>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label review-label">良かったところ</label>
                            <textarea rows="10" cols="200" name="merit" class="form-control" placeholder="ご自由にお書きください">{{ $review->merit }}</textarea>
                        </div>

                        <div class="form-group row">
                            <label class="col-form-label review-label">イマイチなところ</label>
                            <textarea rows="10" cols="200" name="demerit" class="form-control" placeholder="ご自由にお書きください">{{ $review->demerit }}</textarea>
                        </div>

                        <input type="hidden" name="review_id" value="{{ $review->id }}">

                        <div class="form-group row justify-content-center">
                            <div class="revier-btn-group">
                                <button type="button" class="btn btn-success show-btn" onclick=history.back()>戻る</button>

                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary show-btn" value="更新">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
