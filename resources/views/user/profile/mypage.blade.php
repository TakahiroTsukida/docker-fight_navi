@extends('layouts.app')
@section('title', 'マイページ')
@section('content')
    <div class="container">
            @if (session('flash_message_user_login'))
            <div class="flash_message alert-primary text-center rounded py-3 my-2">
                {{ session('flash_message_user_login') }}
            </div>
            @endif
            @if (session('flash_message_no_user_auth'))
            <div class="flash_message alert-danger text-center rounded py-3 my-2">
                {{ session('flash_message_no_user_auth') }}
            </div>
            @endif
            @if (session('flash_message_review_create'))
            <div class="flash_message alert-primary text-center rounded py-3 my-2">
                {{ session('flash_message_review_create') }}
            </div>
            @endif
            @if (session('flash_message_review_update'))
            <div class="flash_message alert-success text-center rounded py-3 my-2">
                {{ session('flash_message_review_update') }}
            </div>
            @endif
            @if (session('flash_message_review_delete'))
            <div class="flash_message alert-danger text-center rounded py-3 my-2">
                {{ session('flash_message_review_delete') }}
            </div>
            @endif
        <div class="card page-title border-dark">
            <div class="col-sm-12 mx-auto card-body mypage-body">
                <div class="myprofile">
                    @if (isset($user->image_path))
                        <p class="profile-img"><img src="{{ asset('storage/image/profile_images/'.$user->image_path) }}" alt="name" class="rounded-circle"></p>
                    @else
                        <p class="profile-img"><img src="{{ asset('image/macOS-Guest-user-logo-icon.jpg') }}" alt="name" class="rounded-circle"></p>
                    @endif
                    <h1 class="myname">{{ $user->name }}</h1>
                </div>

                @if (isset($user->gender))
                <div class="profile">
                    <p><i class="fas fa-transgender fa-lg"></i> {{ $user->gender }}
                      @if (isset($user->secret_gender))
                          <span class="badge badge-danger">非公開</span></p>
                      @endif
                </div>
                @endif
                @if (isset($user->birthday))
                <div class="profile">
                    <p><i class="fas fa-birthday-cake fa-lg"></i> {{ $user->birthday }}
                      @if (isset($user->secret_birthday))
                          <span class="badge badge-danger">非公開</span></p>
                      @endif</p>
                </div>
                @endif
                <div class="profile">
                    <p>自己紹介</p>
                    @if(isset($user->introduction))
                        <p class="text-left">{!! nl2br(e($user->introduction)) !!}</p>
                    @endif
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
                              @if ($review->secret_name == '1')
                                  <p class="review-user"><img src="{{ asset('image/macOS-Guest-user-logo-icon.jpg') }}" alt="name" class="rounded-circle"></p>
                                  <p class="user-name"> 匿名で投稿 </p>
                              @else
                                  @if(isset($review->user->image_path))
                                      <p class="review-user"><img src="{{ asset('storage/image/profile_images/'.$review->user->image_path) }}" alt="name" class="rounded-circle"></p>
                                  @else
                                      <p class="review-user"><img src="{{ asset('image/macOS-Guest-user-logo-icon.jpg') }}" alt="name" class="rounded-circle"></p>
                                  @endif
                                  <p class="user-name"> {{ $review->user->name }} </p>
                              @endif
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
                                        "" : $review->season_end."年" }}
                                    </p>
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

                            <div class="revier-btn-group">
                                <div>
                                    <a href="{{ action('User\ReviewController@edit', ['review_id' => $review->id]) }}" class="btn btn-success show-btn">編集</a>
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
                                    {{ $review->shop->name }} のレビューを削除しますか？
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

              {{ $reviews->links() }}
            </div>
        </div>
    </div>

@endsection
