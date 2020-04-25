@extends('layouts.app')
@section('title', 'マイページ')
@section('content')
    <div class="container">
        <div class="card page-title">
            <div class="col-sm-12 mx-auto card-body mypage-body">
                <div class="myprofile">
                    @if (isset($profile->image_path))
                        <p class="profile-img"><img src="{{ asset('storage/image/profile_images/'.$profile->image_path) }}" alt="name" class="rounded-circle"></p>
                    @else
                        <p class="profile_img"><img src="{{ asset('storage/image/app_images/macOS-Guest-user-logo-icon.jpg') }}" alt="name" class="rounded-circle"></p>
                    @endif
                    <p class="myname">{{ isset($profile->name) ? $profile->name : $user->name }}</p>
                </div>
                @if (isset($profile->gender))
                <div class="profile">
                    <p><i class="fas fa-transgender fa-lg"></i> {{ $profile->gender }}</p>
                </div>
                @endif
                @if (isset($profile->birthday))
                <div class="profile">
                    <p><i class="fas fa-birthday-cake fa-lg"></i> {{ $profile->birthday }}</p>
                </div>
                @endif
                <div class="profile">
                    <p>自己紹介</p>
                    @if(isset($profile->introduction))
                        <p class="text-left">{{ $profile->introduction }}</p>
                    @endif
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h2 class="text-center page-title">最近の投稿</h2>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-sm-12 mx-auto">
              @if (isset($reviews))
                @foreach ($reviews as $review)
                    <div class="card page-title">
                        <div class="card-body mypage-body">
                            <div class="review-group">
                                @if(isset($profile->image_path))
                                    <p class="review-user"><img src="{{ asset('storage/image/profile_images/'.$profile->image_path) }}" alt="name" class="rounded-circle"></p>
                                @else
                                    <p class="review-user"><img src="{{ asset('storage/image/app_images/macOS-Guest-user-logo-icon.jpg') }}" alt="name" class="rounded-circle"></p>
                                @endif
                                <p class="user-name"> {{ isset($profile->name) ? $profile->name : $user->name }} </p>
                            </div>
                            <div>
                                <a href="{{ action('User\UserController@shop', ['id' => $review->shop_id]) }}">
                                <p class="review-shop">{{ $review->name }}</P></a>
                                <p class="review-address"><i class="fas fa-map-marker-alt fa-lg"></i> {{ $review->address_ken }}  {{ $review->address_city }}</p>
                            </div>
                            <div class="review-item">
                                <p class="review-text">レッスン</p>
                                    <div class="review-star">
                                        @switch ($review->resson)
                                            @case ($review->resson = 1)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->resson = 2)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->resson = 3)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->resson = 4)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->resson = 5)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                        @endswitch
                                    </div>
                                <p class="review-point">{{ $review->resson }}</p>
                            </div>

                            <div class="review-item">
                                <p class="review-text">値段</p>
                                    <div class="review-star">
                                        @switch ($review->price)
                                            @case ($review->price = 1)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->price = 2)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->price = 3)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->price = 4)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->price = 5)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                        @endswitch
                                    </div>
                                <p class="review-point">{{ $review->price }}</p>
                            </div>

                            <div class="review-item">
                                <p class="review-text">清潔さ</p>
                                    <div class="review-star">
                                        @switch ($review->clean)
                                            @case ($review->clean = 1)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->clean = 2)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->clean = 3)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->clean = 4)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->clean = 5)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                        @endswitch
                                    </div>
                                <p class="review-point">{{ $review->clean }}</p>
                            </div>

                            <div class="review-item">
                                <p class="review-text">接客</p>
                                    <div class="review-star">
                                        @switch ($review->service)
                                            @case ($review->service = 1)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->service = 2)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->service = 3)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->service = 4)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->service = 5)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                        @endswitch
                                    </div>
                                <p class="review-point">{{ $review->service }}</p>
                            </div>

                            <div class="review-item">
                                <p class="review-text">雰囲気</p>
                                    <div class="review-star">
                                        @switch ($review->atmosphere)
                                            @case ($review->atmosphere = 1)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->atmosphere = 2)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->atmosphere = 3)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->atmosphere = 4)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                            @case ($review->atmosphere = 5)
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                            @break
                                        @endswitch
                                    </div>
                                <p class="review-point">{{ $review->atmosphere }}</p>
                            </div>

                            <div class="review-text-group">
                                <p><i class="far fa-thumbs-up fa-lg"></i>良かった点</p>
                                <p class="review-merit"> {{ $review->merit }} </p>
                            </div>

                            <div class="review-text-group">
                                <p><i class="far fa-hand-point-down fa-lg"></i>直したほうが良い点</p>
                                <p class="review-merit"> {{ $review->demerit }} </p>
                            </div>

                            <div class="review-item">
                                <p class="review-update"><i class="fas fa-undo fa-lg"></i>更新日時</p>
                                <p class="review-updated_at">{{ $review->updated_at->format('Y / m / d') }}</p>
                            </div>

                            <div class="revier-btn-group">
                                <div>
                                    <a href="{{ route('review.edit', ['review_id' => $review->id, 'shop_id' => $review->shop_id]) }}" class="btn btn-success review-btn">編集</a>
                                    <!-- <button type="#" class="btn btn-danger review-btn">削除</button> -->
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-danger review-btn" data-toggle="modal" data-target="#exampleModalCenter">
                                      削除
                                    </button>
                                </div>
                            </div>


                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                              <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalCenterTitle">削除確認画面</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                    </button>
                                  </div>
                                  <div class="modal-body">
                                    本当にこのレビューを削除してもよろしいでしょうか？
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                    <a href="{{ route('review.delete',['review_id' => $review->id]) }}" class="btn btn-danger">削除</a>
                                  </div>
                                </div>
                              </div>
                            </div>

                        </div>
                    </div>
                @endforeach
              @endif
            </div>
        </div>
    </div>

@endsection
