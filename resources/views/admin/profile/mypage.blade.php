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
                <a href="{{ action('User\UserController@shop', ['id' => $new_shop]) }}">{{ session('flash_message_create') }}</a>
              </div>
              @endif
              @if (session('flash_message_shop_copy'))
              <div class="flash_message alert-primary text-center rounded py-3 my-2">
                <a href="{{ action('User\UserController@shop', ['id' => $new_shop]) }}">{{ session('flash_message_shop_copy') }}</a>
              </div>
              @endif
              @if (session('flash_message_update'))
              <div class="flash_message alert-success text-center rounded py-3 my-2">
                <a href="{{ action('User\UserController@shop', ['id' => $new_shop]) }}">{{ session('flash_message_update') }}</a>
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

                          <!-- <div class="profile mt-3">
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
                          @endif -->
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
                                    <a href="{{ action('User\UserController@shop', ['id' => $shop->id]) }}" class="btn btn-primary admin-mypage-btn">詳細</a>

                                    <a href="{{ route('admin.shop.edit',['id' => $shop->id]) }}" class="btn btn-success admin-mypage-btn">編集</a>

                                    <button type="button" class="btn btn-secondary admin-mypage-btn" data-toggle="modal" data-target="#exampleModalCenterCopy{{ $shop->id }}">複製</button>

                                    <button type="button" class="btn btn-danger admin-mypage-btn" data-toggle="modal" data-target="#exampleModalCenter{{ $shop->id }}">削除</button>
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

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModalCenterCopy{{ $shop->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalCenterTitle">複製確認画面</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                        {{ $shop->name }} のデータを複製しますか？
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>

                                            <a href="{{ route('admin.shop.copy',['shop_id' => $shop->id]) }}" class="btn btn-primary">複製する</a>
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
