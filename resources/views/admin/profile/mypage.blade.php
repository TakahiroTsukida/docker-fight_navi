@extends('layouts.admin')
@section('title', 'マイページ')
@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-sm-12 mx-auto">
              @if (session('flash_message_admin_login'))
              <div class="flash_message alert-primary text-center rounded py-3 my-2">
                  {{ session('flash_message_admin_login') }}
              </div>
              @endif
              @if (session('flash_message_create'))
              <div class="flash_message alert-primary text-center rounded py-3 my-2">
                  {{ session('flash_message_create') }}
              </div>
              @endif
              @if (session('flash_message_update'))
              <div class="flash_message alert-success text-center rounded py-3 my-2">
                  {{ session('flash_message_update') }}
              </div>
              @endif
              @if (session('flash_message_delete'))
              <div class="flash_message alert-danger text-center rounded py-3 my-2">
                  {{ session('flash_message_delete') }}
              </div>
              @endif
              @if (session('flash_message_no_auth'))
              <div class="flash_message alert-danger text-center rounded py-3 my-2">
                  {{ session('flash_message_no_auth') }}
              </div>
              @endif
              <h1 class="page-title title">マイページ</h1>
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
                  <div class="card card-group">
                      <div class="search-body">
                          <div class="search-list">
                              <h2 class="search-name">{{ $shop->name }}</h2>
                              <label class="favorite-icon">
                                  <i class="fas fa-bookmark" style="color: #C0C0C0;"><span class="favorite_count">{{ $shop->favorite_count }}</span></i>
                              </label>
                          </div>

                          <div class="search-list">
                              <p class="search-name"><i class="fas fa-map-marker-alt fa-lg mr-1"></i>{{ $shop->address_ken }}{{ $shop->address_city }}</p>
                          </div>

                          <div class="review-item mb-2">
                              <p class="review-text">総合評価</p>
                                  <div class="review-star">
                                    @if($shop->point > 0)

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

                                      <p class="review-point">{{ $shop->point }}点</p>
                                      <p class="review-count"><i class="far fa-comment-alt fa-lg"></i> {{ $shop->reviews_count }}</p>
                                @else
                                    <p class="review-point">レビューなし</p>
                                @endif
                              </div>
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

                          <div class="admin-mypage-body">
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

                              @if (isset($shop->description))
                              <div class="profile">
                                  <label>簡単な説明</label>
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
                                      <a href="{{ action('User\UserController@shop', ['id' => $shop->id]) }}" class="btn btn-primary show-btn long-btn">レビュー</a>
                                      <a href="{{ route('admin.shop.edit',['id' => $shop->id]) }}" class="btn btn-success show-btn">編集</a>
                                      <button type="button" class="btn btn-danger show-btn" data-toggle="modal" data-target="#exampleModalCenter{{ $shop->id }}">削除</button>
                                  </div>
                              </div>
                          </div>

                              <!-- Modal -->
                              <div class="modal fade" id="exampleModalCenter{{ $shop->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalCenterTitle">削除確認画面</h5>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                      {{ $shop->name }} のデータを削除しますか？
                                    </div>
                                    <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                      <a href="{{ route('admin.shop.delete',['id' => $shop->id]) }}" class="btn btn-danger">削除</a>
                                    </div>
                                  </div>
                                </div>

                          </div>
                      </div>
                  </div>
              @endforeach

              {{ $shops->links() }}

          </div>
      </div>

  </div>
@endsection
