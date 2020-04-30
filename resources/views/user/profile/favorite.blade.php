@extends('layouts.app')
@section('title', 'お気に入り一覧')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <h2 class="page-title">お気に入り一覧</h2>
            <div class="col-md-12 mt-3">
                @if (count($favorites) >= 1)
                    @foreach ($favorites as $favorite)
                          <div class="card card-group">
                              <div class="card-body">
                                  <div class="shop-body">

                                      <a href="{{ action('User\UserController@shop', ['id' => $favorite->shop_id]) }}">
                                      <div class="profile">
                                          <h2 class="shop-name">{{ $favorite->name }}</h2>
                                      </div>
                                      </a>

                                      <div>
                                          <button type="button" data-toggle="modal" data-target="#exampleModalCenter{{ $favorite->id }}">
                                            <i class="fas fa-bookmark fa-lg" style="color: #FF3366;"></i>
                                          </button>
                                      </div>


                                      <div class="profile">
                                          <p class="address">{{ $favorite->address_ken }}{{ $favorite->address_city }}</p>
                                      </div>
                                  </div>
                              </div>
                          </div>

                          <!-- Modal -->
                          <div class="modal fade" id="exampleModalCenter{{ $favorite->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="exampleModalCenterTitle">確認画面</h5>
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button>
                                </div>
                                <div class="modal-body">
                                  {{ $favorite->name }}をお気に入りから削除しますか？
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                  <a href="{{ action('User\FavoriteController@mypage_delete', ['shop_id' => $favorite->shop_id]) }}" class="btn btn-danger">削除</a>
                                </div>
                              </div>
                            </div>
                          </div>
                    @endforeach
                @else
                    <div class="page-title title">
                        <label>お気に入りがありません</label>
                    </div>
                @endif
            </div>
        </div>
    </div>


@endsection
