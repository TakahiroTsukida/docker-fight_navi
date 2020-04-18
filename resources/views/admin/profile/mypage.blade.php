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
                              <label class="admin-label">名前</label>
                              <p class="admin">{{ $admin->name }}</p>
                          </div>

                          <div class="profile">
                              <label class="admin-label">性別</label>
                              <p class="admin">{{ $admin->gender }}</p>
                          </div>

                          <div class="profile">
                              <label class="admin-label">誕生日</label>
                              <p class="admin">{{ $admin->birthday }}</p>
                          </div>
                          <div class="profile">
                              <label class="admin-label">メールアドレス</label>
                              <p class="admin">{{ $admin->email }}</p>
                          </div>


                          <div class="profile mt-3">
                              <h3>会社情報</h3>
                          </div>

                          <div class="profile">
                              <label class="admin-label">会社名</label>
                              <p class="admin">{{ $admin->company_name }}</p>
                          </div>

                          @if (isset($admin->tel))
                              <div class="profile">
                                  <label class="admin-label">電話番号</label>
                                  <p class="admin">{{ $admin->tel }}</p>
                              </div>
                          @endif

                          <div class="profile">
                              <label class="admin-label">住所</label>
                              <p class="admin"><span class="symbol">〒 </span>{{ $admin->address_number }}</p>
                              <p class="admin">{{ $admin->address_ken }}{{ $admin->address_city }}</p>
                          </div>

                          @if (isset($admin->tel))
                              <div class="profile">
                                  <label class="admin-label">ホームページ</label>
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
                                      <p class="open">{{ $shop->address_ken }}{{ $shop->address_city }}</p>
                                  </div>

                                  <div class="profile">
                                      <i class="fas fa-image fa-lg"></i>
                                      <label class="shop-about">写真</label>
                                  </div>
                                  <div class="profile">
                                      <p class="shop-image"><img src="{{ asset('image/写真のフリーアイコン7.png') }}"></p>
                                      <a href="#" class="link">もっと見る</a>
                                  </div>
                                  <div class="profile">
                                      <div class="center-btn">
                                          <a href="{{ route('admin.shop.edit',['id' => $shop->id]) }}" class="btn btn-success shop-btn">編集</a>
                                          <button type="button" class="btn btn-danger shop-btn" data-toggle="modal" data-target="#testModal">削除</button>
                                      </div>
                                  </div>

                                  <!-- ボタン・リンククリック後に表示される画面の内容 -->
                                  <div class="modal fade" id="testModal" tabindex="-1" role="dialog" aria-labelledby="basicModal" aria-hidden="true">
                                      <div class="modal-dialog">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h4 class="modal-title" id="myModalLabel">削除確認画面</h4>
                                              </div>
                                              <div class="modal-body">
                                                  <label>本当にデータを削除しますか？</label>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-default" data-dismiss="modal">閉じる</button>
                                                  <a href="{{ route('admin.shop.delete',['id' => $shop->id]) }}" class="btn btn-danger">削除</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>

                  @endif
              @endforeach

          </div>
      </div>

  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
@endsection
