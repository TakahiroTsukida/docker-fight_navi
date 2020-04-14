@extends('layouts.app')
@section('title', '新規会員登録')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="text-center mt-5 mb-3">新規会員登録</h5>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row justify-content-center mt-5">
                            <div class="col-md-8 col-lg-6">
                                <label>名前</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-4">
                            <div class="col-md-8 col-lg-6">
                                <label for="email">メールアドレス</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row  justify-content-center mt-4">
                            <div class="col-md-8 col-lg-6">
                                <label for="password">パスワード</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-4">
                            <div class="col-md-8 col-lg-6">
                                <label for="password-confirm">パスワード（確認用）</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-8 col-lg-6 text-center">
                                <button type="submit" class="btn btn-primary btn-lg col my-5 ">
                                    新規会員登録
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
