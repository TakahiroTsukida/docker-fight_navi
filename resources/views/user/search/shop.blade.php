@extends('layouts.app')
@section('title', '店舗情報')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
              <div class="card card-group">
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
                                  <a href="#" class="btn btn-success shop-btn">戻る</a>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>



                <div class="card">
                    <div class="card-body">
                        <div class="offset-lg-2">
                            <div class="form-group row">
                                <p> GYM_name / adress / city </p>
                                <p>ジャンル： type </p>
                            </div>
                            <div class="form-group row">
                                <label class="col">レッスン　<i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star-half" style="color: #fbca4d;"></i>
                                    <strong class="pl-2">4.5</strong>
                                </label>
                            </div>

                            <div class="form-group row">
                                <label class="col">値段　　　<i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <strong class="pl-2">4.0</strong>
                                </label>
                            </div>

                            <div class="form-group row">
                                <label class="col">清潔さ　　<i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <strong class="pl-2">4.0</strong>
                                </label>
                            </div>

                            <div class="form-group row">
                                <label class="col">接客　　　<i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <strong class="pl-2">4.0</strong>
                                </label>
                            </div>

                            <div class="form-group row">
                                <label class="col">雰囲気　　<i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <strong class="pl-2">4.0</strong>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
