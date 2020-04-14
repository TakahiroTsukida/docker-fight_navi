@extends('layouts.app')
@section('title', 'ジムを検索する')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                <div class="card border-dark">
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-sm-8 offset-md-2 my-3 text-left">
                                <img src="{{ asset('image/検索用の虫眼鏡アイコン 7.png') }}" alt="検索" width="30">
                                <label for="search_gym">ジム名・キーワードで検索</label>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-md-8 offset-md-2">
                                <input type="text" name="search_gym" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mt-5">
                            <div class="col-sm-8 offset-md-2 mt-2 mb-3 text-left">
                                <label class="mb-2">詳細条件</label>
                                <br>
                                <img src="{{ asset('image/ボクシングなど格闘競技のヘッドギア.png') }}" alt="検索" width="30">
                                <label for="search_type">カテゴリー</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 col-md-4 offset-md-2">
                                <button type="submit" class="btn btn-outline-dark col-sm-12 mb-3">ボクシング</button>
                                <button type="submit" class="btn btn-outline-dark col-sm-12 mb-3">総合格闘技</button>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <button type="submit" class="btn btn-outline-dark col-sm-12 mb-3">キックボクシング</button>
                                <button type="submit" class="btn btn-outline-dark col-sm-12 mb-3 text-nowrap"><small>パーソナルトレーニング</small></button>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-sm-8 offset-md-2 my-3 text-left">
                                <img src="{{ asset('image/地図マーカーのアイコン素材4.png') }}" alt="検索" width="30">
                                <label for="search_gym">場所から選ぶ</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col mb-3">
                                <select name="address_ken" class="form-control col-sm-12 col-md-8 offset-md-2">

                                    @include('parts/address_ken');

                                </select>
                            </div>
                        </div>

                        <div class="row justify-content-center my-5">
                            <button type="submit" class="btn btn-primary rounded-pill px-5">検索</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
