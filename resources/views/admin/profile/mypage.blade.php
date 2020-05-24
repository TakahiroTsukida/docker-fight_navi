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
              <div class="card card-group border-dark">
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

                          @if (isset($admin->gender))
                          <div class="profile">
                              <label class="admin-label">性別</label>
                              <p class="admin">{{ $admin->gender }}</p>
                          </div>
                          @endif

                          @if (isset($admin->birthday))
                          <div class="profile">
                              <label class="admin-label">誕生日</label>
                              <p class="admin">{{ $admin->birthday }}</p>
                          </div>
                          @endif

                          <div class="profile">
                              <label class="admin-label">メールアドレス</label>
                              <p class="admin">{{ $admin->email }}</p>
                          </div>

                          <div class="profile mt-3">
                              @if (isset($admin->company_name) || isset($admin->tel) || isset($admin->address_number) || isset($admin->address_ken) || isset($admin->address_city) || isset($admin->web))
                                  <h3>会社情報</h3>
                              @else
                                  <h3>会社情報が登録されていません</h3>
                              @endif
                          </div>

                          @if (isset($admin->company_name))
                          <div class="profile">
                              <label class="admin-label">会社名</label>
                              <p class="admin">{{ $admin->company_name }}</p>
                          </div>
                          @endif

                          @if (isset($admin->tel))
                              <div class="profile">
                                  <label class="admin-label">電話番号</label>
                                  <p class="admin">{{ $admin->tel }}</p>
                              </div>
                          @endif

                          @if (isset($admin->address_number) || isset($admin->address_ken) || isset($admin->address_city))
                          <div class="profile">
                              <label class="admin-label">住所</label>
                              @if (isset($admin->address_number))
                              <p class="admin"><span class="symbol">〒 </span>{{ $admin->address_number }}</p>
                              @endif
                              @if (isset($admin->address_ken) || isset($admin->address_city))
                              <p class="admin">{{ $admin->address_ken }}{{ $admin->address_city }}</p>
                              @endif
                          </div>
                          @endif

                          @if (isset($admin->web))
                              <div class="profile">
                                  <label class="admin-label">ホームページ</label>
                                  <a class="link admin" href="{{ $admin->web }}">{{ $admin->web }}</a>
                              </div>
                          @endif
                      </div>
                  </div>
              </div>

              <div class="page-title title">
                  <h2>登録済みジム（{{ count($admin->shops->toArray()) }}件）</h2>
              </div>

              @foreach ($shops as $shop)
                  <div class="card card-group">
                      <div class="search-body">
                          <a href="{{ action('User\UserController@shop', ['id' => $shop->id]) }}">
                              <div class="search-list">
                                  <h2 class="search-name"><span class="rank">{{ $loop->iteration + ($shops->currentPage() - 1) * $shops->perPage() }}</span>{{ $shop->name }}</h2>
                                  <label class="favorite-icon">
                                      <i class="fas fa-bookmark" style="color: #C0C0C0;"><span class="favorite_count">{{ $shop->favorites_count }}</span></i>
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

                          </a>

                          <div class="profile">
                              <div class="center-btn">
                                  <button type="button" class="btn btn-primary show-btn" data-toggle="modal" data-target="#exampleModalLongshop{{ $shop->id }}">詳細</button>

                                  <a href="{{ route('admin.shop.edit',['id' => $shop->id]) }}" class="btn btn-success show-btn">編集</a>

                                  <button type="button" class="btn btn-danger show-btn" data-toggle="modal" data-target="#exampleModalCenter{{ $shop->id }}">削除</button>
                              </div>
                          </div>


                          <div class="modal fade" id="exampleModalLongshop{{ $shop->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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

                                      <div class="modal-body">
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
                                                  <label class="shop-about">会費</label>
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
                                                  <label class="shop-about">パーソナルトレーニング会費</label>
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

                                          <div class="profile">
                                              <i class="fas fa-map-marker-alt fa-lg"></i>
                                              <label class="shop-about">住所</label>
                                              @if (isset($shop->address_number))
                                              <p class="open"><span class="symbol">〒 </span>{{ $shop->address_number }}</p>
                                              @endif
                                              <p class="open">{{ $shop->address_ken }}{{ $shop->address_city }}{{ $shop->address_other }}</p>
                                          </div>

                                          <div class="modal-footer mt-4">
                                              <a href="{{ route('admin.shop.edit',['id' => $shop->id]) }}" class="btn btn-success">編集</a>
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                          </div>

                                      </div>
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
