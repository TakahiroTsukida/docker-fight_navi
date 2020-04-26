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
                          </div>

                          <div class="profile">
                              <p class="address">{{ $shop->address_ken }}{{ $shop->address_city }}</p>
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

                          <div class="profile">
                              <i class="fas fa-image fa-lg"></i>
                              <label class="shop-about">写真</label>
                          </div>

                          @if (isset($shop->images))
                              @foreach ($shop->images as $image)
                                  <div class="image-group">
                                      <p class="shop-image"><img src="{{ asset('storage/image/store_images/'.$image->image_path) }}"></p>
                                  </div>
                              @endforeach
                              <a href="#" class="link">もっと見る</a>
                          @else
                              <div class="profile">
                                  <label class="shop-about">現在写真は登録されていません</label>
                              </div>
                          @endif

                          @if (isset($shop->description))
                          <div class="profile">
                              <label class="admin-label">簡単な説明</label>
                              <p class="description">{{ $shop->description }}</p>
                          </div>
                          @endif

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

                          <div class="profile">
                              <div class="center-btn">
                                  <a href="{{ action('User\ReviewController@add', ['id' => $shop->id]) }}" class="btn btn-primary shop-btn new-review"><i class="fas fa-edit fa-lg review"></i><span class="small-text">新規レビュー</span></a>
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
                          @auth
                              @if ($review->user_id == Auth::user()->id)
                                  <div class="revier-btn-group">
                                      <div>
                                          <a href="#" class="btn btn-success review-btn">編集</a>
                                          <button type="#" class="btn btn-danger review-btn">削除</button>
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
