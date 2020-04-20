@extends('layouts.app')
@section('title', '店舗情報')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">
                        <div class="offset-lg-2">
                            <div class="form-group row">
                                <p> GYM_name / adress / city </p>
                                <p>ジャンル： type </p>
                            </div>
                            <div class="form-group row">
                                <label class="col">レッスン　<i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star-half" style="color: #fbca4d;"></i>
                                    <strong class="pl-2">4.5</strong>
                                </label>
                            </div>

                            <div class="form-group row">
                                <label class="col">値段　　　<i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <strong class="pl-2">4.0</strong>
                                </label>
                            </div>

                            <div class="form-group row">
                                <label class="col">清潔さ　　<i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <strong class="pl-2">4.0</strong>
                                </label>
                            </div>

                            <div class="form-group row">
                                <label class="col">接客　　　<i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <strong class="pl-2">4.0</strong>
                                </label>
                            </div>

                            <div class="form-group row">
                                <label class="col">雰囲気　　<i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <i class="fas fa-star" style="color: #fbca4d;"></i>
                                    <strong class="pl-2">4.0</strong>
                                </label>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4">簡単な説明</label>
                            </div>

                            <div class="form-group row mt-4">
                                <i class="far fa-handshake fa-2x ml-3"></i>
                                <label class="col ml-1">入会金　　<strong>11000円</strong><small>（税込）</small></label>
                            </div>

                            <div class="form-group row mt-4">
                                <i class="fas fa-yen-sign fa-2x ml-4"></i>
                                <label class="col ml-2">月会費</label>
                            </div>

                            <div class="form-group">
                                <label for="man_price" class="d-inline ml-5">男性　<strong>11000円</strong><small>（税込）</small></label>
                            </div>

                            <div class="form-group">
                                <label for="woman_price" class="d-inline ml-5">女性　<strong> 8800円</strong><small>（税込）</small></label>
                            </div>

                            <div class="form-group">
                                <label for="student_price" class="d-inline ml-5">学生　<strong> 8800円</strong><small>（税込）</small></label>
                            </div>

                            <div class="form-group mt-4">
                                <i class="fas fa-funnel-dollar fa-2x ml-2"></i>
                                <label for="other_price" class="ml-2">その他の会費</label>
                            </div>

                            <div class="form-group mt-4">
                                <i class="fas fa-user-friends fa-2x ml-2"></i>
                                <label class="ml-2">パーソナルトレーニング会費</label>
                            </div>

                            <div class="form-group">
                                <label class="d-inline ml-3 mr-1 ml-5">①　　ボクシング　　　60分　 <strong>5500円</strong>
                                    <small>（税込）</small>
                                </label>
                            </div>

                            <div class="form-group">
                                <label class="d-inline ml-3 mr-1 ml-5">②　　ボクシング　　　80分　 <strong>7000円</strong>
                                    <small>（税込）</small>
                                </label>
                            </div>

                            <div class="form-group">
                                <label class="d-inline ml-3 mr-1 ml-5">③　　ボクシング　 　110分　 <strong>8800円</strong>
                                    <small>（税込）</small>
                                </label>
                            </div>

                            <div class="form-group mt-4">
                                <i class="fas fa-calendar-alt fa-2x ml-2"></i>
                                <label class="ml-2">営業日</label>
                            </div>

                            <div class="form-group mt-4">
                                <i class="fas fa-calendar-alt fa-2x ml-2" style="color: #7d7d7d;"></i>
                                <label class="ml-2">定休日</label>
                            </div>

                            <div class="form-group mt-4">
                                <i class="fas fa-phone fa-2x ml-2"></i>
                                <label class="ml-2">電話番号</label>
                            </div>

                            <div class="form-group mt-4">
                                <i class="fas fa-home fa-2x ml-2"></i>
                                <label class="ml-2">ホームページ</label>
                            </div>

                            <div class="form-group mt-4">
                                <i class="fas fa-map-marker-alt fa-2x ml-2"></i>
                                <label class="ml-2">住所</label>
                            </div>

                            <div class="form-group mt-4">
                                <i class="fas fa-image fa-2x ml-2"></i>
                                <label class="ml-2">写真</label>
                            </div>
                            <div class="form-group row">
                                <img src="{{ asset('image/写真のフリーアイコン7.png') }}" width="100">
                                <a href="#">もっと見る</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center mt-4">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-body">

                        <div class="form-group row">
                            <div class="col-md-12 ml-5 my-3">
                                <div>
                                    <img src="{{ asset('image/macOS-Guest-user-logo-icon.jpg') }}" alt="name" width="60">
                                    <p> name </p>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="ml-3">
                                <h6>レビュー</h6>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="ml-3">
                                <p> GYM_name / adress / city </p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="ml-3">
                                <p>ジャンル： type </p>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="resson" class="col-sm-3 col-form-label">レッスン</label>
                            <select name="resson" class="col-sm-9 form-control">

                                @include('parts/review/resson');

                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="price" class="col-sm-3 col-form-label">値段</label>
                            <select name="price" class="col-sm-9 form-control">

                                @include('parts/review/price');

                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="clean" class="col-sm-3 col-form-label">清潔さ</label>
                            <select name="clean" class="col-sm-9 form-control">

                                @include('parts/review/clean');

                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="service" class="col-sm-3 col-form-label">接客</label>
                            <select name="service" class="col-sm-9 form-control">

                                @include('parts/review/service');

                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="atmosphere" class="col-sm-3 col-form-label">雰囲気</label>
                            <select name="price" class="col-sm-9 form-control">

                                @include('parts/review/atmosphere');

                            </select>
                        </div>

                        <div class="form-group row">
                            <label for="impression" class="col-sm-3 col-form-label">感想</label>
                            <div class="col-sm-12">
                                <textarea rows="10" cols="200" name="impression" class="form-control" placeholder="ご自由にお書きください"></textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-4">
                                <p>更新日時</p>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div>
                                <input type="submit" class="btn btn-success mx-3 mt-5 mb-3 px-5 rounded-pill" value="編集">
                                <input type="submit" class="btn btn-danger mx-3 mt-5 mb-3 px-5 rounded-pill" value="削除">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
