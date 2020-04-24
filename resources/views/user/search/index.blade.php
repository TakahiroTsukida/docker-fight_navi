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
                @if (isset($shops))
                    @foreach ($shops as $shop)
                          <div class="card card-group">
                              <div class="card-body">
                                  <div class="shop-body">
                                      <a href="{{ action('User\UserController@shop', ['id' => $shop->id]) }}">
                                      <div class="profile">
                                          <h2 class="shop-name">{{ $shop->name }}</h2>
                                      </div>
                                      </a>

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

                                      <div class="profile">
                                          <div class="center-btn">

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
