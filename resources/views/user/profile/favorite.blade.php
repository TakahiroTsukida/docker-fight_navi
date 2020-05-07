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
                              <div class="search-body">
                                  <div class="search-list">
                                      <a href="{{ action('User\UserController@shop', ['id' => $favorite->shop_id]) }}">
                                      <h2 class="search-name">{{ $favorite->shop->name }}</h2>
                                      </a>
                                      <button type="button" data-toggle="modal" data-target="#exampleModalCenter{{ $favorite->id }}" class="favorite-icon">
                                        <i class="fas fa-bookmark fa-lg" style="color: #FF3366;"></i>
                                      </button>
                                  </div>


                                  <div class="search-list mb-2">
                                      <p class="search-name"><i class="fas fa-map-marker-alt fa-lg mr-1"></i>{{ $favorite->shop->address_ken }}{{ $favorite->shop->address_city }}</p>
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
                                  {{ $favorite->shop->name }}をお気に入りから削除しますか？
                                </div>
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                  <a href="{{ action('User\FavoriteController@delete', ['shop_id' => $favorite->shop_id]) }}" class="btn btn-danger">削除</a>
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

                {{ $favorites->links() }}
            </div>
        </div>
    </div>


@endsection
