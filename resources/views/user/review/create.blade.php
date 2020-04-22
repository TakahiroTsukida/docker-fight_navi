@extends('layouts.app')
@section('title', '新規レビュー')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h5 class="text-center">レビューの投稿</h5>
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('review.add') }}" method="post">

                            <div class="form-group row">
                                <div class="col-md-12 ml-3 my-3">
                                    <p class="i-con"><img src="{{ asset('image/macOS-Guest-user-logo-icon.jpg') }}" alt="name" width="60"></p>
                                    <p>{{ Auth::user()->name }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="ml-3">
                                    <h6>レビュー</h6>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="ml-3">
                                    <p>{{ $shop->name }}</p>
                                    <p>{{ $shop->address_ken }} / {{ $shop->address_city }}</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="ml-3">
                                    <p>ジャンル： </p>
                                    @foreach ($shop->types as $type)
                                        <p>{{ $type->name }}</p>
                                    @endforeach
                                </div>
                            </div>




                            <form action="{{ route('review.create') }}" method="post" enctype="multipart/form-data">

                                @if (count($errors) > 0)
                                    <ul>
                                        @foreach($errors->all() as $e)
                                            <li>{{ $e }}</li>
                                        @endforeach
                                    </ul>
                                @endif

                                <div class="form-group row">
                                    <label for="resson" class="col-sm-3 col-lg-2 col-form-label">レッスン</label>
                                    <select name="resson" class="col-sm-9 col-lg-10 form-control">
                                        @include('parts/review/resson');
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label for="price" class="col-sm-3 col-lg-2 col-form-label">値段</label>
                                    <select name="price" class="col-sm-9 col-lg-10 form-control">
                                        @include('parts/review/price');
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label for="clean" class="col-sm-3 col-lg-2 col-form-label">清潔さ</label>
                                    <select name="clean" class="col-sm-9 col-lg-10 form-control">
                                        @include('parts/review/clean');
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label for="service" class="col-sm-3 col-lg-2 col-form-label">接客</label>
                                    <select name="service" class="col-sm-9 col-lg-10 form-control">
                                        @include('parts/review/service');
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label for="atmosphere" class="col-sm-3 col-lg-2 col-form-label">雰囲気</label>
                                    <select name="atmosphere" class="col-sm-9 col-lg-10 form-control">
                                        @include('parts/review/atmosphere');
                                    </select>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">良いと思うところ</label>
                                </div>
                                <div class="form-group row">
                                    <textarea rows="10" cols="200" name="merit" class="form-control" placeholder="ご自由にお書きください"></textarea>
                                </div>

                                <div class="form-group row">
                                    <label class="col-form-label">直した方が良いと思うところ</label>
                                </div>
                                <div class="form-group row">
                                    <textarea rows="10" cols="200" name="demerit" class="form-control" placeholder="ご自由にお書きください"></textarea>
                                </div>

                                <div class="form-group row justify-content-center">
                                    <div>
                                        <a href="#" class="btn btn-success mx-3 mt-5 mb-3 px-5 rounded-pill">戻る</a>

                                        {{ csrf_field() }}
                                        <input type="submit" class="btn btn-primary mx-3 mt-5 mb-3 px-5 rounded-pill" value="投稿">
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
