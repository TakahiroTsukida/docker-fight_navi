@extends('layouts.app')
@section('title', 'ジムを検索する')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12 mt-3">
                <div class="card page-title border-dark">
                    <div class="card-body">

                        <form action="{{ route('user.search') }}" method="get">
                            <div class="form-group row mt-5">
                                <div class="col-sm-8 offset-md-2 my-3 text-left">
                                    <label><i class="fas fa-search fa-lg"></i> ジム名・キーワードで検索</label>
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
                                <div class="category-group col-sm-6 col-md-4 offset-md-2">
                                        <input type="checkbox" id="category1" value="1">
                                        <label for="category1">ボクシング</label>

                                        <input type="checkbox" id="category2" value="2">
                                        <label for="category2">キックボクシング</label>
                                </div>
                                <div class="category-group col-sm-6 col-md-4">
                                        <input type="checkbox" id="category3" value="3">
                                        <label for="category3">総合格闘技</label>

                                        <input type="checkbox" id="category4" value="4">
                                        <label for="category4" class="personal_categoty">パーソナルトレーニング</label>
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
                        </form>
                    </div>
                </div>

                <div class="card border-dark">
                    <div class="card-body">


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
