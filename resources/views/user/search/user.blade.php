@extends('layouts.app')
@section('title', 'ユーザー情報')
@section('content')
    <div class="container">
        @if (session('flash_message_user_login'))
        <div class="flash_message alert-primary text-center rounded py-3 my-2">
            {{ session('flash_message_user_login') }}
        </div>
        @endif
        <div class="card page-title">
            <div class="col-sm-12 mx-auto card-body mypage-body">
                <div class="myprofile">
                    @if (isset($user->image_path))
                        <p class="profile-img"><img src="{{ asset('storage/image/profile_images/'.$user->image_path) }}" alt="name" class="rounded-circle"></p>
                    @else
                        <p class="profile-img"><img src="{{ asset('image/macOS-Guest-user-logo-icon.jpg') }}" alt="name" class="rounded-circle"></p>
                    @endif
                    <p class="myname">{{ $user->name }}</p>
                </div>
                @if (isset($user->gender) && $user->secret_gender != "1")
                <div class="profile">
                    <p><i class="fas fa-transgender fa-lg"></i> {{ $user->gender }}</p>
                </div>
                @endif
                @if (isset($user->birthday) && $user->secret_birthday != "1")
                @php
                    $now = date("Ymd");
                    $user_birthday = str_replace("-", "", $user->birthday);
                    $age = floor(($now-$user_birthday)/10000).'歳';
                @endphp
                <div class="profile">
                    <p><i class="fas fa-birthday-cake fa-lg"></i> {{ $age }}</p>
                </div>
                @endif
                <div class="profile">
                    <p>自己紹介</p>
                    @if(isset($user->introduction))
                        <p class="text-left">{!! nl2br(e($user->introduction)) !!}</p>
                    @endif
                </div>
                <div class="revier-btn-group">
                    <div>
                        <button type="button" class="btn btn-success show-btn" onclick=history.back()>戻る</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h2 class="text-center page-title">投稿したレビュー（{{ $reviews->total() }}件）</h2>
            </div>
        </div>


        <div class="row justify-content-center">
            <div class="col-sm-12 mx-auto">
              @if (isset($reviews))
                @foreach ($reviews as $review)
                    <div class="card page-title">
                        <div class="search-body">
                            <div class="review-group">
                                @if(isset($review->user->image_path))
                                    <p class="review-user"><img src="{{ asset('storage/image/profile_images/'.$review->user->image_path) }}" alt="name" class="rounded-circle"></p>
                                @else
                                    <p class="review-user"><img src="{{ asset('image/macOS-Guest-user-logo-icon.jpg') }}" alt="name" class="rounded-circle"></p>
                                @endif
                                <p class="user-name"> {{ $review->user->name }} </p>
                            </div>
                            <div class="search-list">
                                <a href="{{ action('User\UserController@shop', ['id' => $review->shop_id]) }}">
                                    <p class="search-name">{{ $review->shop->name }}</p>
                                </a>
                            </div>
                            <div class="search-list">
                                <p class="search-name"><i class="fas fa-map-marker-alt fa-lg mr-1"></i> {{ $review->shop->address_ken }}  {{ $review->shop->address_city }}</p>
                            </div>
                            <div class="review-item">
                                <p class="review-text">総合評価</p>
                                    <div class="review-star">
                                        @switch ($review->total_point)
                                            @case ($review->total_point = 1)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->total_point = 2)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->total_point = 3)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->total_point = 4)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->total_point = 5)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                        @endswitch
                                        <p class="review-point">{{ $review->total_point }}点</p>
                                    </div>
                            </div>

                            <div class="review-item">
                                <p class="review-text">通い方</p>
                                <div class="review-star">
                                    <p class="d-inline">{{ $review->learn }}</p>
                                </div>
                            </div>

                            <div class="review-item">
                                <p class="review-text">時期</p>
                                <div class="review-star">
                                    <p class="d-inline">
                                      {{ $review->season_begin == "2009" ?
                                        $review->season_begin."年以前" : $review->season_begin."年" }}
                                        〜
                                      {{ $review->season_end == null ?
                                        "" : $review->season_end."年" }}</p>
                                </div>
                            </div>

                            <div class="review-text-group">
                                <p><i class="far fa-thumbs-up fa-lg"></i>良かったところ</p>
                                <p class="review-merit"> {!! nl2br(e($review->merit)) !!} </p>
                            </div>

                            <div class="review-text-group">
                                <p><i class="far fa-hand-point-down fa-lg"></i>イマイチなところ</p>
                                <p class="review-merit"> {!! nl2br(e($review->demerit)) !!} </p>
                            </div>

                            <div class="review-up-group">
                                <p class="review-update"><i class="fas fa-undo fa-lg"></i>更新日時</p>
                                <p class="review-updated_at">{{ $review->updated_at->format('Y / m / d') }}</p>
                            </div>

                        </div>
                    </div>
                @endforeach
              @endif

              {{ $reviews->links() }}
            </div>
        </div>
    </div>

@endsection
