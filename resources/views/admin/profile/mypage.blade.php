@extends('layouts.admin')
@section('title', 'マイページ')
@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-sm-12 mx-auto">
              <div class="card">
                  <div class="card-body">
                      <div class="body">

                          <div class="ml-2 my-2">
                              <h2>登録情報</h2>
                              <h3 class="my-2">個人情報</h3>
                          </div>

                          <div class="ml-2 my-2">
                              <label>名前</label>
                              <p class="ml-2">{{ $admin->name }}</p>
                          </div>
                          <div class="ml-2 my-2">
                              <label>性別</label>
                              <p class="ml-2">{{ $admin->gender }}</p>
                          </div>
                          <div class="ml-2 my-2">
                              <label>誕生日</label>
                              <p class="ml-2">{{ $admin->birthday }}</p>
                          </div>
                          <div class="ml-2 my-2">
                              <label>メールアドレス</label>
                              <p class="ml-2">{{ $admin->email }}</p>
                          </div>


                          <div class="ml-2 mt-4">
                              <h3>会社情報</h3>
                          </div>

                          <div class="ml-2 my-2">
                              <label>会社名</label>
                              <p class="ml-2">{{ $admin->company_name }}</p>
                          </div>

                          @if (isset($admin->tel))
                              <div class="ml-2 my-2">
                                  <label>電話番号</label>
                                  <p class="ml-2">{{ $admin->tel }}</p>
                              </div>
                          @endif

                          <div class="ml-2 my-2">
                              <label>住所</label>
                              <p class="ml-2">〒{{ $admin->address_number }}</p>
                              <p class="ml-2">{{ $admin->address_ken }}{{ $admin->address_city }}</p>
                          </div>

                          @if (isset($admin->tel))
                              <div class="ml-2 my-2">
                                  <label>ホームページ</label>
                                  <a class="ml-2 d-block" href="{{ $admin->web }}">{{ $admin->web }}</a>
                              </div>
                          @endif
                      </div>
                  </div>
              </div>

              @foreach ($shops as $shop)

              <div class="row justify-content-center">
                  <div class="col-sm-12">
                      <div class="card">
                          <div class="card-body">
                              <div class="offset-lg-2">
                                  <div class="form-group row">
                                      <p>{{ $shop->name }}</p>
                                      <p>{{ $shop->address_ken }}{{ $shop->address_city }}</p>
                                      <p>ジャンル： </p>
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

                                  <div class="form-group row">
                                      <label class="col-md-4">簡単な説明</label>
                                  </div>

                                  <div class="form-group row mt-4">
                                      <i class="far fa-handshake fa-2x ml-3"></i>
                                      <label class="col ml-1">入会金　　<strong>11000円</strong><small>（税込）</small></label>
                                  </div>

                                  <div class="form-group row mt-4">
                                      <i class="fas fa-yen-sign fa-2x ml-4"></i>
                                      <label class="col ml-2">月会費</label>
                                  </div>

                                  <div class="form-group">
                                      <label for="man_price" class="d-inline ml-5">男性　<strong>11000円</strong><small>（税込）</small></label>
                                  </div>

                                  <div class="form-group">
                                      <label for="woman_price" class="d-inline ml-5">女性　<strong> 8800円</strong><small>（税込）</small></label>
                                  </div>

                                  <div class="form-group">
                                      <label for="student_price" class="d-inline ml-5">学生　<strong> 8800円</strong><small>（税込）</small></label>
                                  </div>

                                  <div class="form-group mt-4">
                                      <i class="fas fa-funnel-dollar fa-2x ml-2"></i>
                                      <label for="other_price" class="ml-2">その他の会費</label>
                                  </div>

                                  <div class="form-group mt-4">
                                      <i class="fas fa-user-friends fa-2x ml-2"></i>
                                      <label class="ml-2">パーソナルトレーニング会費</label>
                                  </div>

                                  <div class="form-group">
                                      <label class="d-inline ml-3 mr-1 ml-5">①　　ボクシング　　　60分　 <strong>5500円</strong>
                                          <small>（税込）</small>
                                      </label>
                                  </div>

                                  <div class="form-group">
                                      <label class="d-inline ml-3 mr-1 ml-5">②　　ボクシング　　　80分　 <strong>7000円</strong>
                                          <small>（税込）</small>
                                      </label>
                                  </div>

                                  <div class="form-group">
                                      <label class="d-inline ml-3 mr-1 ml-5">③　　ボクシング　 　110分　 <strong>8800円</strong>
                                          <small>（税込）</small>
                                      </label>
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
                  </div>
              </div>

              @endforeach
          </div>
      </div>

  </div>
@endsection
