@extends('layouts.app')
@section('title', '店舗情報')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
              @if (session('flash_message_user_login'))
              <div class="flash_message alert-primary text-center rounded py-3 my-2">
                  {{ session('flash_message_user_login') }}
              </div>
              @endif
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
              @if (session('flash_message_review_create'))
              <div class="flash_message alert-primary text-center rounded py-3 my-2">
                  {{ session('flash_message_review_create') }}
              </div>
              @endif
              @if (session('flash_message_review_update'))
              <div class="flash_message alert-success text-center rounded py-3 my-2">
                  {{ session('flash_message_review_update') }}
              </div>
              @endif
              @if (session('flash_message_review_delete'))
              <div class="flash_message alert-danger text-center rounded py-3 my-2">
                  {{ session('flash_message_review_delete') }}
              </div>
              @endif
              <div class="card card-group page-title border-dark">
                  <div class="search-body">
                      <div class="search-list">
                          <h1 class="search-name">{{ $shop->name }}</h1>
                          @if (Auth::guard('user')->check())
                              @if(isset($favorite))
                                  <form action="{{ action('User\FavoriteController@delete') }}" class="favorite-form">
                                      <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                      <button type="submit" class="favorite-icon"><i class="fas fa-bookmark" style="color: #FF3366;"><span class="favorite_count">{{ $shop->favorites_count }}</span></i></button>
                                  </form>
                              @else
                                  <form action="{{ action('User\FavoriteController@add') }}" class="favorite-form">
                                      <input type="hidden" name="shop_id" value="{{ $shop->id }}">
                                      <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                      <button type="submit" class="favorite-icon"><i class="fas fa-bookmark" style="color: #C0C0C0;"><span class="favorite_count">{{ $shop->favorites_count }}</span></i></button>
                                  </form>
                              @endif
                          @else
                              <label class="favorite-icon">
                                <i class="fas fa-bookmark" style="color: #C0C0C0;"><span class="favorite_count">{{ $shop->favorites_count }}</span></i>
                            </label>
                          @endif


                      </div>

                      <div class="search-list">
                          <p class="search-name"><i class="fas fa-map-marker-alt fa-lg mr-1"></i>{{ $shop->address_ken }}{{ $shop->address_city }}</p>
                      </div>

                      <div class="review-item mb-2">
                          <p class="review-text">総合評価</p>
                              <div class="review-star">
                                @if(isset($shop->point))

                                  @switch ($shop->point)
                                      @case ($shop->point == 0)
                                          <p class="review-point">レビューなし</p>
                                      @break
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
                                      @case ($shop->point = 5)
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

                      <div class="text-center">
                          <!-- <button type="button" class="btn btn-success show-btn" onclick=history.back()>戻る</button> -->
                          <!-- Button trigger modal -->
                          <button type="button" class="btn btn-primary show-btn" data-toggle="modal" data-target="#exampleModalLongshop{{ $shop->id }}">詳細</button>
                          @if (Auth::guard('admin')->check())

                              @if ($shop->admin_id == Auth::guard('admin')->user()->id)
                                  <a href="{{ route('admin.shop.edit',['id' => $shop->id]) }}" class="btn btn-success show-btn">編集</a>
                                  <button type="button" class="btn btn-danger show-btn" data-toggle="modal" data-target="#exampleModalCenterdelete{{ $shop->id }}">削除</button>

                                  <div class="modal fade" id="exampleModalCenterdelete{{ $shop->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                      <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                              <div class="modal-header">
                                                  <h5 class="modal-title" id="exampleModalCenterTitle">削除確認画面</h5>
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                  </button>
                                              </div>
                                              <div class="modal-body">
                                                  <div class="text-left">
                                                      <p>{{ $shop->name }} のデータを削除するとユーザーが書いたレビューやお気に入り登録なども削除されます。<br>
                                                      本当に {{ $shop->name }} を削除しますか？</p>
                                                  </div>
                                              </div>
                                              <div class="modal-footer">
                                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                                  <a href="{{ route('admin.shop.delete',['id' => $shop->id]) }}" class="btn btn-danger">削除</a>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                              @endif

                          @else
                              @if (Auth::guard('user')->check())
                                  @if (isset($shop->reviews))
                                      @php
                                          $user_reviews = $shop->reviews;
                                          $user_review = $user_reviews->where('user_id', Auth::user()->id)->toArray();
                                      @endphp
                                  @endif
                              @endif
                              @if (empty($user_review))
                                  <a href="{{ action('User\ReviewController@add', ['id' => $shop->id]) }}" class="btn btn-success rv-ca-btn"><i class="fas fa-edit fa-lg review"></i>新規レビュー</a>
                              @endif

                          @endif
                      </div>

                      <!-- Modal -->
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
                                      <div class="image-group">
                                          <p><img src="{{ asset('image/l_e_others_501.png') }}"></p>
                                      </div>
                                  @endif

                                  <div class="modal-body">

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

                                      <div class="profile">
                                          <i class="fas fa-map-marker-alt fa-lg"></i>
                                          <label class="shop-about">住所</label>
                                          @if (isset($shop->address_number))
                                          <p class="open"><span class="symbol">〒 </span>{{ $shop->address_number }}</p>
                                          @endif
                                          <p class="open">{{ $shop->address_ken }}{{ $shop->address_city }}{{ $shop->address_other }}</p>
                                      </div>

                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>


              @if(isset($reviews))
                  <div class="page-title title">
                      <h2>レビュー ({{ $reviews->total() }}件)</h2>
                  </div>
                  @foreach ($reviews as $review)
                      <div class="card page-title">
                          <div class="search-body">
                              @if ($review->secret_name == "1")
                                  <div class="review-group">
                                      <p class="review-user"><img src="{{ asset('image/macOS-Guest-user-logo-icon.jpg') }}" alt="name" class="rounded-circle"></p>
                                      <p class="user-name"> 匿名でのレビュー </p>
                                  </div>
                              @else
                                  <a href="{{ action('User\UserController@user_info', ['user_id' => $review->user_id]) }}" class="user-name">
                                      <div class="review-group">
                                          @if(isset($review->user->image_path))
                                              <p class="review-user"><img src="{{ asset('storage/image/profile_images/'.$review->user->image_path) }}" alt="name" class="rounded-circle"></p>
                                          @else
                                              <p class="review-user"><img src="{{ asset('image/macOS-Guest-user-logo-icon.jpg') }}" alt="name" class="rounded-circle"></p>
                                          @endif
                                          <p class="user-name"> {{ $review->user->name }} </p>
                                      </div>
                                  </a>
                              @endif

                              <div class="search-list">
                                  <a href="{{ action('User\UserController@shop', ['id' => $review->shop_id]) }}">
                                      <h2 class="search-name">{{ $review->shop->name }}</h2>
                                  </a>
                              </div>
                              <div class="search-list">
                                  <p class="search-name"><i class="fas fa-map-marker-alt fa-lg mr-1"></i> {{ $review->shop->address_ken }}  {{ $review->shop->address_city }}</p>
                              </div>
                              <div class="review-item">
                                  <p class="review-text">総合評価</p>
                                      <div class="review-star">
                                          @switch ($review->total_point)
                                              @case ($review->total_point = 1)
                                                  <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              @break
                                              @case ($review->total_point = 2)
                                                  <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                  <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              @break
                                              @case ($review->total_point = 3)
                                                  <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                  <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                  <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              @break
                                              @case ($review->total_point = 4)
                                                  <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                  <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                  <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                  <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              @break
                                              @case ($review->total_point = 5)
                                                  <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                  <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                  <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                  <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                                  <i class="fas fa-star fa-lg" style="color: #fbca4d;"></i>
                                              @break
                                          @endswitch

                                          <p class="review-point">{{ $review->total_point }}点</p>
                                      </div>
                              </div>

                              <div class="review-item">
                                  <p class="review-text">通い方</p>
                                  <div class="review-star">
                                      <p class="d-inline">{{ $review->learn }}</p>
                                  </div>
                              </div>

                              <div class="review-item">
                                  <p class="review-text">時期</p>
                                  <div class="review-star">
                                      <p class="d-inline">{{ $review->season_begin }} 〜 {{ $review->season_end }}</p>
                                  </div>
                              </div>

                              <div class="review-text-group">
                                  <p><i class="far fa-thumbs-up fa-lg"></i>良かったところ</p>
                                  <p class="review-merit"> {{ $review->merit }} </p>
                              </div>

                              <div class="review-text-group">
                                  <p><i class="far fa-hand-point-down fa-lg"></i>イマイチなところ</p>
                                  <p class="review-merit"> {{ $review->demerit }} </p>
                              </div>

                              <div class="review-up-group">
                                  <p class="review-update"><i class="fas fa-undo fa-lg"></i>更新日時</p>
                                  <p class="review-updated_at">{{ $review->updated_at->format('Y / m / d') }}</p>
                              </div>
                              @if (Auth::guard('user')->check())
                                  @if ($review->user_id == Auth::user()->id)
                                      <div class="revier-btn-group">
                                          <div>
                                              <a href="{{ route('user.review.edit', ['review_id' => $review->id, 'shop_id' => $shop->id]) }}" class="btn btn-success show-btn">編集</a>
                                              <button type="button" class="btn btn-danger show-btn" data-toggle="modal" data-target="#exampleModalCenter{{ $review->id }}">
                                                削除
                                              </button>
                                          </div>
                                      </div>

                                      <!-- Modal -->
                                      <div class="modal fade" id="exampleModalCenter{{ $review->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalCenterTitle">削除確認画面</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                              {{ $review->shop->name }} のレビューを削除しますか？
                                            </div>
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                              <a href="{{ route('user.review.delete',['review_id' => $review->id]) }}" class="btn btn-danger">削除</a>
                                            </div>
                                          </div>
                                        </div>
                                      </div>


                                  @endif
                              @endif

                          </div>
                      </div>

                @endforeach
                {{ $reviews->appends(request()->input())->links() }}
            @else
                <div class="page-title title">
                    <h2>レビュー (0件)</h2>
                </div>
            @endif

            </div>
        </div>
    </div>
@endsection
