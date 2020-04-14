@extends('layouts.app')
@section('title', 'レビューの編集')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h5 class="text-center">レビューの編集</h5>
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
                            <select name="atmosphere" class="col-sm-9 form-control">
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
                                <input type="submit" class="btn btn-success mx-3 mt-5 mb-3 px-5 rounded-pill" value="戻る">
                                <input type="submit" class="btn btn-primary mx-3 mt-5 mb-3 px-5 rounded-pill" value="投稿">
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
