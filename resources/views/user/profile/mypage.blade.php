@extends('layouts.app')
@section('title', 'マイページ')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 mx-auto page-title">
                <div>
                    <p class="profile-img"><img src="{{ asset('storage/image/profile_images/'.$profile->image_path) }}" alt="name" class="rounded-pill"></p>
                </div>
                <div>
                    <p class="text-left">{{ isset($profile->name) ? $profile->name : $user->name }}</p>
                </div>
                @if (isset($profile->gender))
                <div class="profile">
                    <label class="admin-label">性別</label>
                    <p class="admin">{{ $profile->gender }}</p>
                </div>
                @endif
                @if (isset($profile->birthday))
                <div class="profile">
                    <label class="admin-label">誕生日</label>
                    <p class="admin">{{ $profile->birthday }}</p>
                </div>
                @endif
                <div>
                    <label for="introduction">自己紹介</label>
                    @if(isset($profile->introduction))
                        <p class="text-left">{{ $profile->introduction }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h5 class="text-center page-title">最近の投稿</h5>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-12 mx-auto">
                @foreach ($reviews as $review)
                    <div class="card page-title">
                        <div class="card-body">
                            <div>
                                @if(isset($profile->image_path))
                                <p class="review-user"><img src="{{ asset('storage/image/profile_images/'.$profile->image_path) }}" alt="name" class="rounded-pill"></p>
                                @endif
                                <p> {{ isset($profile->name) ? $profile->name : $user->name }} </p>
                            </div>
                            <div>
                                <p>レビュー</p>
                                <a href="{{ action('User\UserController@shop', ['id' => $review->shop_id]) }}">
                                <p> {{ $review->name }} / {{ $review->address_ken }} / {{ $review->address_city }} </p></a>
                                <p>レッスン： {{ $review->resson }} </p>
                                <p>値段　： {{ $review->price }} </p>
                                <p>清潔さ： {{ $review->clean }} </p>
                                <p>接客　： {{ $review->service }} </p>
                                <p>雰囲気： {{ $review->atmosphere }} </p>
                            </div>
                            <div>
                                <label>良かった点</label>
                                <p> {{ $review->merit }} </p>
                            </div>

                            <div>
                                <label>直したほうが良い点</label>
                                <p> {{ $review->demerit }} </p>
                            </div>

                            <div>
                                <p>更新日時</p>
                                <p>{{ $review->updated_at->format('Y / m / d') }}</p>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div>
                                    <input type="#" class="btn btn-success mx-3 mt-5 mb-3 px-5 rounded-pill" value="編集">
                                    <input type="#" class="btn btn-danger mx-3 mt-5 mb-3 px-5 rounded-pill" value="削除">
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
