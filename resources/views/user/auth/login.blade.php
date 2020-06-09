@extends('layouts.app')
@section('title', 'ログイン')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col admin-login">
            @if (session('flash_message_user_logout'))
            <div class="flash_message alert-danger text-center rounded py-3 my-2">
                {{ session('flash_message_user_logout') }}
            </div>
            @endif
            @if (session('flash_message_user_email_unique'))
            <div class="flash_message alert-danger text-center rounded py-3 my-2">
                {{ session('flash_message_user_email_unique') }}
            </div>
            @endif
            <div class="card page-title">
                <div class="card-body">
                    <h5 class="text-center mt-5 mb-3">ログイン</h5>
                    <form method="POST" action="{{ route('user.login') }}">
                        @csrf

                        <div class="form-group row justify-content-center mt-5">
                            <div class="col-md-8 col-lg-6">
                                <label for="email">メールアドレス</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-5">
                            <div class="col-md-8 col-lg-6">
                                <label for="password">パスワード</label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-2 col-lg-6 offset-lg-3 mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        パスワードを保存する
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-8 col-lg-6 text-center">
                                <button type="submit" class="btn btn-primary btn-lg col mt-5">
                                    ログイン
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link d-block my-3" href="{{ route('password.request') }}">
                                        パスワードをお忘れの方
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('user.login') }}">
                        @csrf
                        <div class="form-group row justify-content-center">
                            <div class="col-md-8 col-lg-6 text-center">
                                <input type="hidden" name="email" value="test@test.test">
                                <input type="hidden" name="password" value="1234">
                                <button type="submit" class="btn btn-success btn-lg col mt-5">一般ユーザー簡単ログイン</button>
                            </div>
                        </div>
                    </form>

                    <div class="form-group row justify-content-center">
                        <div class="col-md-8 col-lg-6 text-center">
                            <a href="{{ route('user.register') }}" class="btn btn-outline-primary btn-lg col mt-5 mb-3">
                                新規登録はこちら
                            </a>
                        </div>
                    </div>

                    <div class="sns-login">
                        <label>SNSでログイン</label>
                    </div>
                    <div class="form-group row justify-content-center">
                        <div class="col-md-8 col-lg-6 text-center">
                            <a href="{{ action('User\Auth\LoginController@redirectToGoogle') }}" class="btn btn-danger btn-lg col g-login" role="button">
                                <i class="fab fa-google fa-lg"></i> ログイン
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
