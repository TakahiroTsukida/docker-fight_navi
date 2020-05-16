@extends('layouts.app')
@section('title', 'ジムを検索する')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                @if (session('flash_message_add'))
                <div class="flash_message alert-success text-center rounded py-3 my-2">
                    {{ session('flash_message_add') }}
                </div>
                @endif
                @if (session('flash_message_delete'))
                <div class="flash_message alert-danger text-center rounded py-3 my-2">
                    {{ session('flash_message_delete') }}
                </div>
                @endif

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
                                    <input type="text" name="search_name" class="form-control" placeholder="スペースを入れずに入力" value="{{ $search_name }}">
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
                                    <input type="text" name="address_city" class="form-control col-sm-12 col-md-8 offset-md-2" placeholder="市区郡名をご入力ください" placeholder="スペースを入れずに入力" value="{{ $search_address_city }}">
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-sm-8 offset-md-2 mt-3 text-left">
                                    <label for="search_gym"><i class="fas fa-sort fa-lg mr-2"></i>並び替え</label>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col mb-3">
                                    <select name="sort" class="form-control col-sm-12 col-md-8 offset-md-2">
                                        <option value="">並び替えができます</option>
                                        <option value="point_desc" {{ $search_sort == 'point_desc' ? 'selected="selected"' : '' }}>総合評価が高い順</option>
                                        <option value="point_asc" {{ $search_sort == 'point_asc' ? 'selected="selected"' : '' }}>総合評価が低い順</option>
                                        <option value="favorite_desc" {{ $search_sort == 'favorite_desc' ? 'selected="selected"' : '' }}>お気に入り数が多い順</option>
                                        <option value="favorite_asc" {{ $search_sort == 'favorite_asc' ? 'selected="selected"' : '' }}>お気に入り数が少ない順</option>
                                        <option value="review_desc" {{ $search_sort == 'review_desc' ? 'selected="selected"' : '' }}>レビューが多い順</option>
                                        <option value="review_asc" {{ $search_sort == 'review_asc' ? 'selected="selected"' : '' }}>レビューが少ない順</option>
                                    </select>
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
                @if (isset($shops))
                    <div class="page-title title">
                        <p>検索結果（{{ $shops->total() }}件）</p>
                    </div>
                    @foreach ($shops as $key => $shop)

                            @if (Auth::guard('user')->check())
                              @php
                                if(isset($shop->favorites)) {
                                    $favorites = $shop->favorites;
                                    $favorite = $favorites->where('user_id', Auth::user()->id)->first();
                                }
                              @endphp
                            @endif

                          <div class="card card-group">
                              <div class="search-body">
                                  <a href="{{ action('User\UserController@shop', ['id' => $shop->id]) }}">
                                  <div class="search-list">
                                      <h2 class="search-name">
                                        @if ($key + 1 == 1)
                                            <span class="rank-top"><img src="{{ asset('image/rank1.png') }}"></span>
                                        @elseif ($key + 1 == 2)
                                            <span class="rank-top"><img src="{{ asset('image/rank2.png') }}"></span>
                                        @elseif ($key + 1 == 3)
                                            <span class="rank-top"><img src="{{ asset('image/rank3.png') }}"></span>
                                        @else
                                            <span class="rank">{{ $key+1 }}</span>
                                        @endif
                                        {{ $shop->name }}</h2>
                                      <label class="favorite-icon">
                                          @if (Auth::guard('user')->check())

                                              @if (isset($favorite))
                                                  <form action="{{ action('User\FavoriteController@delete') }}" class="favorite-form">
                                                      <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                                      <button type="submit" class="favorite-icon"><i class="fas fa-bookmark" style="color: #FF3366;"><span class="favorite_count">{{ $shop->favorites_count }}</span></i></button>
                                                  </form>
                                              @else
                                                  <form action="{{ action('User\FavoriteController@add') }}" class="favorite-form">
                                                      <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                                      <button type="submit" class="favorite-icon"><i class="fas fa-bookmark" style="color: #C0C0C0;"><span class="favorite_count">{{ $shop->favorites_count }}</span></i></button>
                                                  </form>
                                              @endif

                                          @else
                                              <i class="fas fa-bookmark" style="color: #C0C0C0;"><span class="favorite_count">{{ $shop->favorites_count }}</span></i>
                                          @endif
                                      </label>
                                  </div>


                                  <div class="search-list">
                                      <p class="search-name"><i class="fas fa-map-marker-alt fa-lg mr-1"></i>{{ $shop->address_ken }}{{ $shop->address_city }}</p>
                                  </div>

                                  <div class="review-item mb-2">
                                      <p class="review-text">総合評価</p>
                                          <div class="review-star">
                                            @if(($shop->point) > 0)

                                              @switch ($shop->point)
                                                  @case ($shop->point < 1.5)
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                  @break
                                                  @case ($shop->point < 2)
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star-half fa-lg" style="color: #fbca4d;"></i>
                                                  @break
                                                  @case ($shop->point < 2.5)
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                  @break
                                                  @case ($shop->point < 3)
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star-half fa-lg" style="color: #fbca4d;"></i>
                                                  @break
                                                  @case ($shop->point < 3.5)
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                  @break
                                                  @case ($shop->point < 4)
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star-half fa-lg" style="color: #fbca4d;"></i>
                                                  @break
                                                  @case ($shop->point < 4.5)
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                  @break
                                                  @case ($shop->point < 5)
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star-half fa-lg" style="color: #fbca4d;"></i>
                                                  @break
                                                  @case ($shop->point == 5)
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                      <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                  @break
                                              @endswitch

                                              <p class="review-point">{{ round($shop->point, 2) }}点</p>
                                              <p class="review-count"><i class="far fa-comment-alt fa-lg"></i> {{ $shop->reviews_count }}</p>
                                        @else
                                            <p class="review-point"></p>
                                            <p class="review-count"><i class="far fa-comment-alt fa-lg"></i> {{ $shop->reviews_count }}</p>
                                        @endif
                                      </div>
                                  </div>

                                  <div class="index-type">
                                      <label class="type">ジャンル：</label>
                                      <ul class="type-list">
                                          @foreach($shop->types as $type)
                                              <li class="type-text"><i class="fas fa-check"></i> {{ $type->name }}</li>
                                          @endforeach
                                      </ul>
                                  </div>

                                  @if (isset($shop->description))
                                  <div class="profile">
                                      <label class="index-desc">簡単な説明</label>
                                      <p class="index-desc">{!! nl2br(e($shop->description)) !!}</p>
                                  </div>
                                  @endif

                                </a>

                                  <div class="index-btn-group">
                                  <!-- Button trigger modal -->
                                      <button type="button" class="btn btn-primary index-btn" data-toggle="modal" data-target="#exampleModalLong{{ $shop->id }}">
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

                                        @if (isset($shop->image_path))
                                            <div class="image-group">
                                                <p class="shop-img"><img src="{{ asset('storage/image/shop_images/'.$shop->image_path) }}"></p>
                                            </div>
                                        @else
                                            <div class="profile">
                                                <p class="shop-img"><img src="{{ asset('image/l_e_others_501.png') }}"></p>
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
                                                    <p class="type-text d-inline">{{ number_format($shop->trial_price) }}<span class="symbol">円</span></p>
                                                    @endif
                                            </div>

                                            @if (isset($shop->description))
                                            <div class="profile">
                                                <label>簡単な説明</label>
                                                <p class="description">{!! nl2br(e($shop->description)) !!}</p>
                                            </div>
                                            @endif

                                            @if (count($shop->prices) >= 1)
                                                <div class="profile">
                                                    <i class="fas fa-yen-sign fa-lg"></i>
                                                    <label class="shop-about">会費<small>（税込）</small></label>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th class="num"></th>
                                                            <th class="name">会費名</th>
                                                            <th class="price-lg">金額</th>
                                                        </tr>
                                                        @foreach ($shop->prices as $price)
                                                            <tr>
                                                              <td>{{ $loop->iteration }}</td>
                                                              <td>{{ $price->name }}</td>
                                                              <td><strong>{{ number_format($price->price) }}</strong><span class="symbol">円</span></td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            @endif

                                            @if (count($shop->personals) >= 1)
                                                <div class="profile">
                                                    <i class="fas fa-user-friends fa-lg"></i>
                                                    <label class="shop-about">パーソナルトレーニング会費<small>（税込）</small></label>
                                                    <table class="table table-bordered">
                                                        <tr>
                                                            <th class="num"></th>
                                                            <th class="course">コース名</th>
                                                            <th class="time">時間</th>
                                                            <th class="price">金額</th>
                                                        </tr>
                                                        @foreach ($shop->personals as $personal)
                                                            <tr>
                                                              <td>{{ $loop->iteration }}</td>
                                                              <td>{{ $personal->course }}</td>
                                                              <td>{{ $personal->time }}<small>分</small></td>
                                                              <td><strong>{{ number_format($personal->price) }}</strong><small>円</small></td>
                                                            </tr>
                                                        @endforeach
                                                    </table>
                                                </div>
                                            @endif

                                            @if (count($shop->opens) >= 1)
                                            <div class="profile">
                                                <i class="fas fa-calendar-alt fa-lg"></i>
                                                <label class="shop-about">営業日</label>
                                                <table class="table table-bordered">
                                                    <tr>
                                                        <th class="open-day">日時</th>
                                                        <th class="open-time">営業時間</th>
                                                    </tr>
                                                    @foreach ($shop->opens as $open)
                                                        <tr>
                                                          <td class="text-center">{{ $open->day }}</td>
                                                          <td>{{ $open->time }}</td>
                                                        </tr>
                                                    @endforeach
                                                </table>
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
                    <div class="page-title">
                        {{ $shops->appends(request()->input())->links() }}
                    </div>
                @else
                    <div class="page-title title">
                        <p>検索結果（0件）</p>
                    </div>
                @endif

            </div>
        </div>
    </div>


@endsection
