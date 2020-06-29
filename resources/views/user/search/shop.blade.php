@extends('layouts.app')
@section('title', $shop->name.'|'.$shop->address_ken.$shop->address_city.' 店舗情報')
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



                        @if (isset($shop->image_path))
                            <div class="image-group">
                                <p class="shop-img"><img src="{{ asset('storage/image/shop_images/'.$shop->image_path) }}"></p>
                            </div>
                        @endif

                        <div class="index-type">
                            <label class="shop-about d-inline"><i class="fas fa-star" style="color: #fbca4d;"></i>入会前の体験：</label>
                                <p class="type-text d-inline">{{ $shop->trial }}</p>
                                @if ($shop->trial == '有料')
                                <p class="type-text d-inline">{{ number_format($shop->trial_price) }}<span class="symbol">円</span></p>
                                @endif
                        </div>

                        <div class="index-type">
                            <table class="table">

                                @if (count($shop->join_prices) >= 1)
                                    <tr>
                                        <td class="table-type">入会金</td>
                                        <td>
                                            @foreach ($shop->join_prices as $join_price)
                                                {{ $join_price->name }}
                                                <span class="table-price-price"><strong>{{ number_format($join_price->price) }}</strong><span class="symbol">円</span></span><br>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif


                                @if (count($shop->prices) >= 1)
                                    <tr>
                                        <td class="table-type">月会費</td>
                                        <td>
                                            @foreach ($shop->prices as $price)
                                                {{ $price->name }}
                                                <span class="table-price-price"><strong>{{ number_format($price->price) }}</strong><span class="symbol">円</span></span><br>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif


                                @if (count($shop->other_prices) >= 1)
                                    <tr>
                                        <td class="table-type">その他の会費</td>
                                        <td>
                                            @foreach ($shop->other_prices as $other_price)
                                                {{ $other_price->name }}
                                                <span class="table-price-price"><strong>{{ number_format($other_price->price) }}</strong><span class="symbol">円</span></span><br>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif


                                @if (count($shop->opens) >= 1)
                                    <tr>
                                        <td class="table-type">営業日</td>
                                        <td>
                                            @foreach ($shop->opens as $open)
                                                {{ $open->day }}
                                                <span class="table-open-time">{{ $open->time }}</span><br>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif


                                @if (isset($shop->close))
                                    <tr>
                                        <td class="table-type">定休日</td>
                                        <td>
                                            {{ $shop->close }}
                                        </td>
                                    </tr>
                                @endif


                                @if (count($shop->personals) >= 1)
                                    <tr>
                                        <td class="table-type">パーソナル</td>
                                        <td>
                                            @foreach ($shop->personals as $personal)
                                                {{ $personal->course }}
                                                <span class="table-personal-time">{{ $personal->time }}<small>分</small></span>
                                                <span class="table-personal-price"><strong>{{ number_format($personal->price) }}</strong><small>円</small></span><br>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif


                                @if (isset($shop->tel))
                                    <tr>
                                        <td class="table-type">電話番号</td>
                                        <td>
                                            <a href="tel:{{ $shop->tel }}">{{ $shop->tel }}</a>
                                        </td>
                                    </tr>
                                @endif

                                <tr>
                                    <td class="table-type">住所</td>
                                    <td>
                                        @if (isset($shop->address_number))
                                        <span class="symbol">〒 </span>
                                        {{ $shop->address_number }}<br>
                                        @endif
                                        {{ $shop->address_ken }}{{ $shop->address_city }}{{ $shop->address_other }}
                                    </td>
                                </tr>
                                

                                @if (isset($shop->web))
                                    <tr>
                                        <td class="table-type">公式HP</td>
                                        <td>
                                            <a href="{{ $shop->web }}">{{ $shop->web }}</a>
                                        </td>
                                    </tr>
                                @endif
                            </table>
                        </div>



                      <div class="text-center my-2">
                          <button type="button" class="btn btn-success show-btn" onclick=history.back()>戻る</button>
                          <!-- Button trigger modal -->
                          <!-- <button type="button" class="btn btn-primary admin-mypage-btn" data-toggle="modal" data-target="#exampleModalLongshop{{ $shop->id }}">詳細</button> -->
                          @if (Auth::guard('admin')->check())

                              @if ($shop->admin_id == Auth::guard('admin')->user()->id)
                                  <a href="{{ route('admin.shop.edit',['id' => $shop->id]) }}" class="btn btn-success admin-mypage-btn">編集</a>

                                  <button type="button" class="btn btn-secondary admin-mypage-btn" data-toggle="modal" data-target="#exampleModalCenterCopy{{ $shop->id }}">複製</button>

                                  <button type="button" class="btn btn-danger admin-mypage-btn" data-toggle="modal" data-target="#exampleModalCenterdelete{{ $shop->id }}">削除</button>

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
                                  <a href="{{ action('User\ReviewController@add', ['id' => $shop->id]) }}" class="btn btn-primary rv-ca-btn"><i class="fas fa-edit fa-lg review"></i>新規レビュー</a>
                              @endif

                          @endif
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
                                  <p class="review-merit"> {!! nl2br(e($review->merit)) !!} </p>
                              </div>

                              <div class="review-text-group">
                                  <p><i class="far fa-hand-point-down fa-lg"></i>イマイチなところ</p>
                                  <p class="review-merit"> {!! nl2br(e($review->demerit)) !!} </p>
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
