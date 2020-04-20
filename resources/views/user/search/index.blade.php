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
                                <label for="search_gym"><i class="fas fa-search fa-lg"></i>ジム名・キーワードで検索</label>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <div class="col-md-8 offset-md-2">
                                <input type="text" name="search_gym" class="form-control">
                            </div>
                        </div>

                        <div class="form-group row mt-5">
                            <div class="col-sm-8 offset-md-2 mt-2 mb-3 text-left">
                                <label class="mb-2 d-block">詳細条件</label>

                                <img src="{{ asset('image/ボクシングなど格闘競技のヘッドギア.png') }}" alt="検索" class="i-con">
                                <label class="d-inline">カテゴリー</label>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-sm-6 col-md-4 offset-md-2">
                                <label><input type="checkbox" class="btn btn-outline-dark col-sm-12 mb-3" value="1">ボクシング</label>

                                <label><input type="checkbox" class="btn btn-outline-dark col-sm-12 mb-3" value="3">総合格闘技</label>
                            </div>
                            <div class="col-sm-6 col-md-4">
                                <label><input type="checkbox" class="btn btn-outline-dark col-sm-12 mb-3" value="2">キックボクシング</label>
                                <label><input type="checkbox" class="btn btn-outline-dark col-sm-12 mb-3 text-nowrap"><small>パーソナルトレーニング</small></label>
                            </div>
                        </div>

                        <div class="form-group row mt-4">
                            <div class="col-sm-8 offset-md-2 my-3 text-left">
                                <img src="{{ asset('image/地図マーカーのアイコン素材4.png') }}" alt="検索" class="i-con">
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
