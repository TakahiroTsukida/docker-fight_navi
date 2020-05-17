@extends('layouts.app')
@section('title', 'fightなび')
@section('content')
    <div class="app_imgtext">
        <img src="{{ asset('image/fight_top.jpg') }}" alt="fightなび">
        <h1>あなたにあった<br>
          ボクシング、キックボクシング<br>
          総合格闘技ジムをみつけよう。<br>
          @unless(Auth::guard('user')->check() || Auth::guard('admin')->check())
          <a href="{{ url('user/register') }}" class="btn btn-primary login-btn"><i class="fa fa-edit mr-1"></i>レビューしてみる(30秒で完了)</a>
          @endunless
        </h1>

    </div>

    <div>
        <p class="main-text">Fightなびは、あなたの身近な格闘技ジムのレビューや情報共有ができるサービスです。<br>
          ジムの評価やコメントも見れるので、好みのジムを検索してみつけられます。</p>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 mt-3">
                <div class="card text-right border-dark">
                    <div class="card-body">
                        <div class="form-group row justify-content-center">
                            <div class="my-3">
                                <i class="fas fa-search fa-2x icon"></i>
                                <label for="search_gym" class="label">ジム名・キーワードで検索</label>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-8 offset-md-2">
                                <form action="{{ route('user.search') }}" method="get">
                                    <input type="text" name="search_name" class="form-control">
                                    <input type="submit" class="btn btn-primary mt-2" value="検索">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 my-3">
                <div class="card border-dark">
                    <div class="card-body">
                        <div class="form-group row justify-content-center">
                            <div class="mt-2 mb-3 text-center type-group">
                                <i class="fas fa-search fa-2x icon"></i>
                                <label for="search_type" class="label">ジャンルから検索する</label>
                            </div>
                            <div class="row type-group">
                                <div class="col-sm-6 left-group">
                                    <form action="{{ route('user.search') }}" method="get">
                                        <input type="hidden" name="type[]" value="1">
                                        <input type="submit" class="btn btn-outline-dark col-sm-12 mb-3" value="ボクシング">
                                    </form>
                                    <form action="{{ route('user.search') }}" method="get">
                                        <input type="hidden" name="type[]" value="2">
                                        <input type="submit" class="btn btn-outline-dark col-sm-12 mb-3" value="キックボクシング">
                                    </form>
                                </div>
                                <div class="col-sm-6 right-group">
                                    <form action="{{ route('user.search') }}" method="get">
                                        <input type="hidden" name="type[]" value="3">
                                        <input type="submit" class="btn btn-outline-dark col-sm-12 mb-3" value="総合格闘技">
                                    </form>
                                    <form action="{{ route('user.search') }}" method="get">
                                        <input type="hidden" name="type[]" value="4">
                                        <input type="submit" class="btn btn-outline-dark col-sm-12 mb-3" value="パーソナルトレーニング">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card border-dark">
                    <div class="card-body">
                        <div class="form-group row justify-content-center my-3">
                            <div class="text-center">
                                <i class="fas fa-search fa-2x icon"></i>
                                <label class="label">場所から選ぶ</label>
                            </div>
                        </div>

                        <div class="row justify-content-center mb-4">

                            <div class="top-ken">
                              <form action="{{ route('user.search') }}" method="get">
                                  <select name="address_ken" class="form-control">

                                      @include('parts/address_ken');

                                  </select>
                                  <input type="submit" class="btn btn-primary mt-2 ken-submit" value="検索">
                              </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @unless(Auth::guard('user')->check() || Auth::guard('admin')->check())
            <div class="row justify-content-center">
                <div class="col-md-12 sale">
                    <h2>あなたのジムを登録してみませんか？</h2>
                    <a href="{{ url('admin/register') }}" class="btn btn-danger"><i class="fa fa-edit mr-2"></i>登録してみる(30秒で完了)</a>
                    <p>ジムの登録は無料で行えます。</p>
                    <div class="warning">
                        <p>※ジムを登録する際には管理者ユーザーとして登録が必要になります。</p>
                        <p>※管理者ユーザーはレビューやお気に入り登録などは行なえません。</p>
                        <p>※既に掲載されているジムの情報の修正依頼などは、<a href="{{ url('user/description') }}">こちら</a>に記載のメールアドレスからお願い致します。</p>
                    </div>
                </div>
            </div>
        @endunless
    </div>

@endsection
