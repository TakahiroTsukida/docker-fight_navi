@extends('layouts.app')
@section('title', 'マイページ')
@section('content')
    <div class="container">
        <div class="card page-title">
            <div class="col-sm-12 mx-auto card-body mypage-body">
                <div class="myprofile">
                    @if (isset($user->image_path))
                        <p class="profile-img"><img src="{{ asset('storage/image/profile_images/'.$user->image_path) }}" alt="name" class="rounded-circle"></p>
                    @else
                        <p class="profile-img"><img src="{{ asset('storage/image/app_images/macOS-Guest-user-logo-icon.jpg') }}" alt="name" class="rounded-circle"></p>
                    @endif
                    <p class="myname">{{ $user->name }}</p>
                </div>
                @if (isset($user->gender))
                <div class="profile">
                    <p><i class="fas fa-transgender fa-lg"></i> {{ $user->gender }}</p>
                </div>
                @endif
                @if (isset($user->birthday))
                <div class="profile">
                    <p><i class="fas fa-birthday-cake fa-lg"></i> {{ $user->birthday }}</p>
                </div>
                @endif
                <div class="profile">
                    <p>自己紹介</p>
                    @if(isset($user->introduction))
                        <p class="text-left">{{ $user->introduction }}</p>
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
                        <div class="search-body">
                            <div class="review-group">
                                @if(isset($user->image_path))
                                    <p class="review-user"><img src="{{ asset('storage/image/profile_images/'.$user->image_path) }}" alt="name" class="rounded-circle"></p>
                                @else
                                    <p class="review-user"><img src="{{ asset('storage/image/app_images/macOS-Guest-user-logo-icon.jpg') }}" alt="name" class="rounded-circle"></p>
                                @endif
                                <p class="user-name"> {{ $user->name }} </p>
                            </div>
                            <div class="search-list">
                                <a href="{{ action('User\UserController@shop', ['id' => $review->shop_id]) }}">
                                    <p class="search-name">{{ $review->name }}</p>
                                </a>
                            </div>
                            <div class="search-list">
                                <p class="search-name"><i class="fas fa-map-marker-alt fa-lg mr-1"></i> {{ $review->address_ken }}  {{ $review->address_city }}</p>
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
                                    </div>
                                <p class="review-point">{{ $review->total_point }}点</p>
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
                                    <p class="d-inline">{{ $review->season }}</p>
                                </div>
                            </div>

                            <div class="review-text-group">
                                <p><i class="far fa-thumbs-up fa-lg"></i>良かったところ</p>
                                <p class="review-merit"> {{ $review->merit }} </p>
                            </div>

                            <div class="review-text-group">
                                <p><i class="far fa-hand-point-down fa-lg"></i>イマイチなところ</p>
                                <p class="review-merit"> {{ $review->demerit }} </p>
                            </div>

                            <div class="review-up-group">
                                <p class="review-update"><i class="fas fa-undo fa-lg"></i>更新日時</p>
                                <p class="review-updated_at">{{ $review->updated_at->format('Y / m / d') }}</p>
                            </div>

                            <div class="revier-btn-group">
                                <div>
                                    <a href="{{ route('user.review.edit', ['review_id' => $review->id, 'shop_id' => $review->shop_id]) }}" class="btn btn-success show-btn">編集</a>
                                    <button type="button" class="btn btn-danger show-btn" data-toggle="modal" data-target="#exampleModalCenter{{ $review->id }}">
                                      削除
                                    </button>
                                </div>
                            </div>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenter{{ $review->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                                    <a href="{{ route('user.review.delete',['review_id' => $review->id]) }}" class="btn btn-danger">削除</a>
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
