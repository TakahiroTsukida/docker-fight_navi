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

                                        @include('parts/address_ken_search');

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
                                        @php
                                            $sorts = [
                                                'point_desc' => '総合評価が高い順',
                                                'point_asc' => '総合評価が低い順',
                                                'favorite_desc' => 'お気に入り数が多い順',
                                                'favorite_asc' => 'お気に入り数が少ない順',
                                                'review_desc' => 'レビューが多い順',
                                                'review_asc' => 'レビューが少ない順',
                                            ];
                                        @endphp
                                        
                                        @foreach ($sorts as $key => $value)
                                            <option value="{{ $key }}" {{ isset($search_sort) && $search_sort == $key ? 'selected="selected"' : '' }}>{{ $value }}</option>
                                        @endforeach
                                        
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
                                  <div class="search-list">
                                      <h2 class="search-name">
                                        @if ($loop->iteration + ($shops->currentPage() - 1) * $shops->perPage() == 1)
                                            <span class="rank-top"><img src="{{ asset('image/rank1.png') }}"></span>
                                        @elseif ($loop->iteration + ($shops->currentPage() - 1) * $shops->perPage() == 2)
                                            <span class="rank-top"><img src="{{ asset('image/rank2.png') }}"></span>
                                        @elseif ($loop->iteration + ($shops->currentPage() - 1) * $shops->perPage() == 3)
                                            <span class="rank-top"><img src="{{ asset('image/rank3.png') }}"></span>
                                        @else
                                            <span class="rank">{{ $loop->iteration + ($shops->currentPage() - 1) * $shops->perPage() }}</span>
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
                                          @include('parts/review/shop_point')
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

                                  <div class="index-btn-group">
                                    <a href="{{ action('User\UserController@shop', ['id' => $shop->id]) }}" class="btn btn-primary index-btn">詳細</a>
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
