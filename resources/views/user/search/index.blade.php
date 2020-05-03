@extends('layouts.app')
@section('title', 'ジムを検索する')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">

                <div class="card page-title border-dark">
                    <div class="card-body">

                        <form action="{{ route('user.search') }}" method="get">
                            <div class="form-group row mt-5">
                                <div class="col-sm-8 offset-md-2 my-3 text-left">
                                    <label><i class="fas fa-search fa-lg"></i> ジム名・キーワードで検索</label>
                                </div>
                            </div>
                            <div class="form-group row mb-5">
                                <div class="col-md-8 offset-md-2">
                                    <input type="text" name="search_shop" class="form-control" value="{{ $search_shop }}">
                                </div>
                            </div>

                            <div class="form-group row mt-5">
                                <div class="col-sm-8 offset-md-2 mt-2 mb-3 text-left">
                                    <label class="mb-2 d-block">詳細条件</label>

                                    <img src="{{ asset('image/ボクシングなど格闘競技のヘッドギア.png') }}" alt="検索" class="i-con">
                                    <label class="d-inline">カテゴリー</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="category-group col-sm-6 col-md-4 offset-md-2">
                                    <label for="category1" class="right-group">
                                        <input type="checkbox" name="type[]" id="category1" value="1" {{ is_array($search_type) && in_array("1", $search_type, true)? 'checked="checked"' : '' }}>
                                        <p>ボクシング</p>
                                    </label>

                                    <label for="category2" class="right-group">
                                        <input type="checkbox" name="type[]" id="category2" value="2" {{ is_array($search_type) && in_array("2", $search_type, true)? 'checked="checked"' : '' }}>
                                        <p>キックボクシング</p>
                                    </label>
                                </div>
                                <div class="category-group col-sm-6 col-md-4">
                                    <label for="category3" class="left-group">
                                        <input type="checkbox" name="type[]" id="category3" value="3" {{ is_array($search_type) && in_array("3", $search_type, true)? 'checked="checked"' : '' }}>
                                        <p>総合格闘技</p>
                                    </label>
                                    <label for="category4" class="left-group">
                                        <input type="checkbox" name="type[]" id="category4" value="4" {{ is_array($search_type) && in_array("4", $search_type, true)? 'checked="checked"' : '' }}>
                                        <p>パーソナルトレーニング</p>
                                    </label>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-sm-8 offset-md-2 my-3 text-left">
                                    <img src="{{ asset('image/地図マーカーのアイコン素材4.png') }}" alt="検索" class="i-con">
                                    <label for="search_gym">場所から選ぶ</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col mb-3">
                                    <select name="address_ken" class="form-control col-sm-12 col-md-8 offset-md-2">
                                        @if (isset($search_address_ken))
                                        <option value="{{ $search_address_ken }}" selected>{{ $search_address_ken }}</option>
                                        @endif

                                        @include('parts/address_ken');

                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col mb-3">
                                    <input type="text" name="address_city" class="form-control col-sm-12 col-md-8 offset-md-2" placeholder="市区町村名をご入力ください" value="{{ $search_address_city }}">
                                </div>
                            </div>

                            <div class="row justify-content-center my-5">
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-primary rounded-pill px-5" value="検索">
                            </div>
                        </form>
                    </div>
                </div>
            <!-- </div>

            <div class=""> -->
                @if (count($shops) >= 1)
                    @foreach ($shops as $shop)
                        @if (Auth::guard('user')->check())
                          @php
                            if(isset($shop->favorites)) {
                                $favorites = $shop->favorites;
                                $favorite = $favorites->where('user_id', Auth::user()->id)->first();
                            }
                          @endphp
                        @endif

                        @php
                            if (count($shop->reviews) >= 1) {
                                $reviews = $shop->reviews->toArray();
                                $total_point = array_sum(array_column($reviews, 'total_point')) / count(array_column($reviews, 'total_point'));
                            }
                        @endphp

                          <div class="card card-group">
                              <div class="search-body">
                                  <a href="{{ action('User\UserController@shop', ['id' => $shop->id]) }}">
                                  <div class="search-list">
                                      <h2 class="search-name">{{ $shop->name }}</h2>
                                      @if (Auth::guard('user')->check())
                                          <label class="favorite-icon">
                                              @if (isset($favorite))
                                                  <i class="fas fa-bookmark" style="color: #FF3366;"></i>
                                              @else
                                                  <i class="fas fa-bookmark" style="color: #C0C0C0;"></i>
                                              @endif
                                          </label>
                                      @endif
                                  </div>
                                  </a>

                                  <div class="search-list">
                                      <p class="search-name"><i class="fas fa-map-marker-alt fa-lg mr-1"></i>{{ $shop->address_ken }}{{ $shop->address_city }}</p>
                                  </div>

                                  <div class="review-item mb-2">
                                      <p class="review-text">総合評価</p>
                                      @if(isset($total_point))
                                          <div class="review-star">
                                              @switch ($total_point)
                                                  @case ($total_point == 0)
                                                      <p class="review-point">レビューなし</p>
                                                  @break
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
                                                  @case ($total_point == 5)
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

                                  @if (count($shop->images) >= 1)
                                      @foreach ($shop->images as $image)
                                          <div class="image-group">
                                              <p class="shop-img"><img src="{{ asset('storage/image/store_images/'.$image->image_path) }}"></p>
                                          </div>
                                      @endforeach
                                  @else
                                      <div class="profile">
                                          <p class="shop-img"><img src="{{ asset('storage/image/app_images/l_e_others_501.png') }}"></p>
                                      </div>
                                  @endif

                                  <div class="right-btn">
                                  <!-- Button trigger modal -->
                                      <button type="button" class="btn btn-primary show-btn" data-toggle="modal" data-target="#exampleModalLong{{ $shop->id }}">
                                        詳細
                                      </button>
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

                                        <div class="modal-cont">
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
                                                <i class="far fa-handshake"></i>
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

                                            <div class="profile mb-2">
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
                                          <a href="{{ action('User\UserController@shop', ['id' => $shop->id]) }}" class="btn btn-primary">レビューを見る</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>

                              </div>
                          </div>
                    @endforeach
                @else
                    <div class="page-title title">
                        <label>検索結果がありません</label>
                    </div>
                @endif
            </div>
        </div>
    </div>


@endsection
