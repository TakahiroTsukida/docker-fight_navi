@extends('layouts.app')
@section('title', '店舗情報')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
              <div class="card card-group page-title">
                  <div class="card-body">
                      <div class="shop-body">

                          <div class="profile">
                              <h2 class="shop-name">{{ $shop->name }}</h2>
                              @auth
                                  @if(isset($favorite))
                                      <form action="{{ action('User\FavoriteController@delete') }}">
                                          <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                          <button type="submit"><i class="fas fa-bookmark fa-lg" style="color: #FF3366;"></i></button>
                                      </form>
                                  @else
                                      <form action="{{ action('User\FavoriteController@add') }}">
                                          <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                          <button type="submit"><i class="fas fa-bookmark fa-lg" style="color: #C0C0C0;"></i></button>
                                      </form>
                                  @endif
                              @endauth

                          </div>

                          <div class="review-item mb-5">
                              <p class="review-text">総合評価</p>
                              @if(isset($total_point))
                                  <div class="review-star">
                                      @switch ($total_point)
                                          @case ($total_point < 1.5)
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                          @break
                                          @case ($total_point < 2)
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star-half fa-lg" style="color: #fbca4d;"></i>
                                          @break
                                          @case ($total_point < 2.5)
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                          @break
                                          @case ($total_point < 3)
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star-half fa-lg" style="color: #fbca4d;"></i>
                                          @break
                                          @case ($total_point < 3.5)
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                          @break
                                          @case ($total_point < 4)
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star-half fa-lg" style="color: #fbca4d;"></i>
                                          @break
                                          @case ($total_point < 4.5)
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                          @break
                                          @case ($total_point < 5)
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star-half fa-lg" style="color: #fbca4d;"></i>
                                          @break
                                          @case ($total_point = 5)
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                          @break
                                      @endswitch
                                  </div>
                              <p class="review-point">{{ round($total_point, 1) }}点</p>
                              @else
                              <p class="review-point">レビューなし</p>
                              @endif
                          </div>

                          @if (isset($shop->images))
                              @foreach ($shop->images as $image)
                                  <div class="image-group">
                                      <img src="{{ asset('storage/image/store_images/'.$image->image_path) }}">
                                  </div>
                              @endforeach
                          @else
                              <div class="profile">
                                  <label class="shop-about">現在写真は登録されていません</label>
                              </div>
                          @endif

                          <div class="center-btn">
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary mr-3" data-toggle="modal" data-target="#exampleModalLong{{ $shop->id }}">
                            詳細
                          </button>
                          <a href="{{ action('User\ReviewController@add', ['id' => $shop->id]) }}" class="btn btn-success"><i class="fas fa-edit fa-lg review"></i><span class="small-text">新規レビュー</span></a>
                        </div>

                          <!-- Modal -->
                          <div class="modal fade" id="exampleModalLong{{ $shop->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h2 class="modal-title" id="exampleModalLongTitle">{{ $shop->name }}</h2>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">

                                    <div class="profile">
                                        <p class="address"><i class="fas fa-map-marker-alt fa-lg mr-1"></i>{{ $shop->address_ken }}{{ $shop->address_city }}</p>
                                    </div>

                                    <div class="profile">
                                        <label class="type">ジャンル：</label>
                                        <ul class="type-list">
                                            @foreach($shop->types as $type)
                                                <li class="type-text"><i class="fas fa-check"></i> {{ $type->name }}</li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="profile">
                                        <label class="shop-about d-inline"><i class="fas fa-star" style="color: #fbca4d;"></i>入会前の体験：</label>
                                            <p class="type-text d-inline">{{ $shop->trial }}</p>
                                            @if ($shop->trial == '有料')
                                            <p class="type-text d-inline">{{ $shop->trial_price }}<span class="symbol">円</span></p>
                                            @endif
                                    </div>

                                    @if (isset($shop->prices))
                                    <div class="profile">
                                        <i class="far fa-handshake fa-lg"></i>
                                        @foreach ($shop->prices as $price)
                                            @if ($price->name == "入会金")
                                            <label class="join">{{ $price->name }}</label>
                                            <p class="join"><strong>{{ $price->price }}</strong><span class="symbol">円（税込）</span></p><br>
                                            @endif
                                        @endforeach
                                    </div>
                                    @endif

                                    @if (isset($shop->prices))
                                    <div class="profile">
                                        <i class="fas fa-yen-sign fa-lg"></i>
                                        <label class="shop-about">月会費</label>
                                        @foreach ($shop->prices as $price)
                                            @if ($price->name != "入会金")
                                            <p class="shop-price">{{ $price->name }} <strong>{{ $price->price }}</strong><span class="symbol">円（税込）</span></p>
                                            @endif
                                        @endforeach
                                    </div>
                                    @endif

                                    @if (isset($shop->personals))
                                    <div class="profile mt-3">
                                        <i class="fas fa-user-friends fa-lg"></i>
                                        <label class="shop-about">パーソナルトレーニング会費</label>
                                    </div>
                                        @foreach ($shop->personals as $personal)
                                            <div class="shop-price">
                                                <p class="personal-course">{{ $personal->course }}</p>
                                                <p class="personal-time">{{ $personal->time }} 分</p>
                                                <p class="personal-price">{{ $personal->price }}
                                                   <span class="symbol">円（税込）</span>
                                                </p><br>
                                            </div>
                                        @endforeach
                                    @endif

                                    @if (isset($shop->open))
                                    <div class="profile">
                                        <i class="fas fa-calendar-alt fa-lg"></i>
                                        <label class="shop-about">営業日</label>
                                        <p class="open">{{ $shop->open }}</p>
                                    </div>
                                    @endif

                                    @if (isset($shop->close))
                                    <div class="profile">
                                        <i class="fas fa-calendar-alt fa-lg" style="color: #7d7d7d;"></i>
                                        <label class="shop-about">定休日</label>
                                        <p class="open">{{ $shop->close }}</p>
                                    </div>
                                    @endif

                                    @if (isset($shop->tel))
                                    <div class="profile">
                                        <i class="fas fa-phone fa-lg"></i>
                                        <label class="shop-about">電話番号</label>
                                        <p class="open">{{ $shop->tel }}</p>
                                    </div>
                                    @endif

                                    @if (isset($shop->web))
                                    <div class="profile">
                                        <i class="fas fa-home fa-lg"></i>
                                        <label class="shop-about">ホームページ</label>
                                        <a href="{{ $shop->web }}" class="open">{{ $shop->web }}</a>
                                    </div>
                                    @endif

                                    <div class="profile">
                                        <i class="fas fa-map-marker-alt fa-lg"></i>
                                        <label class="shop-about">住所</label>
                                        @if (isset($shop->address_number))
                                        <p class="open"><span class="symbol">〒 </span>{{ $shop->address_number }}</p>
                                        @endif
                                        <p class="open">{{ $shop->address_ken }}{{ $shop->address_city }}{{ $shop->address_other }}</p>
                                    </div>

                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                              </div>
                            </div>
                          </div>

                      </div>
                  </div>
              </div>

              @if(isset($reviews))
              @foreach ($reviews as $review)
                  <div class="card page-title">
                      <div class="card-body mypage-body">
                          <div class="review-group">
                              @if(isset($review->image_path))
                              <p class="review-user"><img src="{{ asset('storage/image/profile_images/'.$review->image_path) }}" alt="name" class="rounded-circle"></p>
                              @else
                              <p class="review-user"><img src="{{ asset('storage/image/app_images/macOS-Guest-user-logo-icon.jpg') }}" alt="name" class="rounded-circle"></p>
                              @endif
                              <p class="user-name"> {{ $review->name }} </p>
                          </div>
                          <div>
                              <a href="{{ action('User\UserController@shop', ['id' => $review->shop_id]) }}">
                              <p class="review-shop">{{ $shop->name }}</P></a>
                              <p class="review-address"><i class="fas fa-map-marker-alt fa-lg"></i> {{ $shop->address_ken }}  {{ $shop->address_city }}</p>
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
                                  <p>{{ $review->learn }}</p>
                              </div>
                          </div>

                          <div class="review-item">
                              <p class="review-text">時期</p>
                              <div class="review-star">
                                  <p>{{ $review->season }}</p>
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

                          <div class="review-item">
                              <p class="review-update"><i class="fas fa-undo fa-lg"></i>更新日時</p>
                              <p class="review-updated_at">{{ $review->updated_at->format('Y / m / d') }}</p>
                          </div>
                          @auth
                              @if ($review->user_id == Auth::user()->id)
                                  <div class="revier-btn-group">
                                      <div>
                                          <a href="{{ route('user.review.edit', ['review_id' => $review->id, 'shop_id' => $shop->id]) }}" class="btn btn-success review-btn">編集</a>
                                          <button type="button" class="btn btn-danger review-btn" data-toggle="modal" data-target="#exampleModalCenter{{ $review->id }}">
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


                              @endif
                          @endauth

                      </div>
                  </div>

            @endforeach
            @endif
            </div>
        </div>
    </div>
@endsection
