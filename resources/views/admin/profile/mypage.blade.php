@extends('layouts.admin')
@section('title', 'マイページ')
@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-sm-12 mx-auto">
              <div class="card card-group">
                  <div class="card-body">
                      <div class="body">

                          <div>
                              <h2>登録情報</h2>
                              <h3>個人情報</h3>
                          </div>

                          <div class="profile">
                              <label>名前</label>
                              <p class="admin">{{ $admin->name }}</p>
                          </div>

                          <div class="profile">
                              <label>性別</label>
                              <p class="admin">{{ $admin->gender }}</p>
                          </div>

                          <div class="profile">
                              <label>誕生日</label>
                              <p class="admin">{{ $admin->birthday }}</p>
                          </div>
                          <div class="profile">
                              <label>メールアドレス</label>
                              <p class="admin">{{ $admin->email }}</p>
                          </div>


                          <div class="profile">
                              <h3>会社情報</h3>
                          </div>

                          <div class="profile">
                              <label>会社名</label>
                              <p class="admin">{{ $admin->company_name }}</p>
                          </div>

                          @if (isset($admin->tel))
                              <div class="profile">
                                  <label>電話番号</label>
                                  <p class="admin">{{ $admin->tel }}</p>
                              </div>
                          @endif

                          <div class="profile">
                              <label>住所</label>
                              <p class="admin"><span class="symbol">〒 </span>{{ $admin->address_number }}</p>
                              <p class="admin">{{ $admin->address_ken }}{{ $admin->address_city }}</p>
                          </div>

                          @if (isset($admin->tel))
                              <div class="profile">
                                  <label>ホームページ</label>
                                  <a class="link admin" href="{{ $admin->web }}">{{ $admin->web }}</a>
                              </div>
                          @endif
                      </div>
                  </div>
              </div>

              @foreach ($shops as $shop)
                  @if($shop->admin_id == Auth::user()->id)

                      <div class="card card-group">
                          <div class="card-body">
                              <div class="body">

                                  <div>
                                      <h2>{{ $shop->name }}</h2>
                                  </div>

                                  <div class="profile">
                                    @if (isset($shop->address_number))
                                      <p><span class="symbol">〒 </span>{{ $shop->address_number }}</p>
                                    @endif
                                      <p>{{ $shop->address_ken }}{{ $shop->address_city }}</p>
                                  </div>

                                  <div class="profile">
                                      <p class="type">ジャンル：</p>
                                      <ul class="type-list">
                                          @foreach($shop->types as $type)
                                              <li class="shop-text">{{ $type->name }}</li>
                                          @endforeach
                                      </ul>
                                  </div>

                                  <div class="profile">
                                      <label class="shop-text">簡単な説明</label>
                                      <p class="description">{{ $shop->description }}</p>
                                  </div>

                                  <div class="profile mt-3">
                                      <i class="far fa-handshake fa-lg"></i>
                                      @foreach ($shop->prices as $price)
                                          @if ($price->name == "入会金")
                                          <p class="shop-about">{{ $price->name }} <strong>{{ $price->price }}</strong><span class="symbol">円（税込）</span></p><br>
                                          @endif
                                      @endforeach
                                  </div>

                                  <div class="profile">
                                      <i class="fas fa-yen-sign fa-lg"></i>
                                      <p class="shop-about">月会費</label>
                                      @foreach ($shop->prices as $price)
                                          @if ($price->name != "入会金")
                                          <p class="shop-price">{{ $price->name }} <strong>{{ $price->price }}</strong><span class="symbol">円（税込）</span></p>
                                          @endif
                                      @endforeach
                                  </div>

                                  <div class="profile">
                                      <i class="fas fa-user-friends fa-lg"></i>
                                      <label class="shop-about">パーソナルトレーニング会費</label>
                                  </div>

                                  <div class="profile">
                                      @foreach ($shop->personals as $personal)
                                          <p class="shop-price">
                                            {{ $personal->course }}　
                                            {{ $personal->time }} 分　
                                            <strong>{{ $personal->price }}</strong>
                                             <span class="symbol">円（税込）</span>
                                          </p>
                                      @endforeach
                                  </div>

                                  <div class="form-group mt-4">
                                      <i class="fas fa-calendar-alt fa-2x ml-2"></i>
                                      <label class="ml-2">営業日</label>
                                  </div>

                                  <div class="form-group mt-4">
                                      <i class="fas fa-calendar-alt fa-2x ml-2" style="color: #7d7d7d;"></i>
                                      <label class="ml-2">定休日</label>
                                  </div>

                                  <div class="form-group mt-4">
                                      <i class="fas fa-phone fa-2x ml-2"></i>
                                      <label class="ml-2">電話番号</label>
                                  </div>

                                  <div class="form-group mt-4">
                                      <i class="fas fa-home fa-2x ml-2"></i>
                                      <label class="ml-2">ホームページ</label>
                                  </div>

                                  <div class="form-group mt-4">
                                      <i class="fas fa-map-marker-alt fa-2x ml-2"></i>
                                      <label class="ml-2">住所</label>
                                  </div>

                                  <div class="form-group mt-4">
                                      <i class="fas fa-image fa-2x ml-2"></i>
                                      <label class="ml-2">写真</label>
                                  </div>
                                  <div class="form-group row">
                                      <img src="{{ asset('image/写真のフリーアイコン7.png') }}" width="100">
                                      <a href="#">もっと見る</a>
                                  </div>
                              </div>
                          </div>
                      </div>

                  @endif
              @endforeach

          </div>
      </div>

  </div>
@endsection
