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

                                          <form action="{{ action('User\FavoriteController@mypage_delete') }}">
                                              <input type="hidden" name="shop_id" value="{{ $favorite->shop_id }}">
                                              <button type="submit"><i class="fas fa-bookmark fa-lg" style="color: #FF3366;"></i></button>
                                          </form>

                                      </div>
                                      </a>

                                      <div class="profile">
                                          <p class="address">{{ $favorite->address_ken }}{{ $favorite->address_city }}</p>
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
