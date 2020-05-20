@extends('layouts.admin')
@section('title', '管理ユーザー　新規登録')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card page-title">
                <div class="card-body">
                    <h1 class="text-center mt-5 mb-3">管理ユーザー　新規登録</h1>
                    <div class="register-warning">
                        <h2 class="badge badge-danger">ご登録前に必ずお読みください</h2>
                        <p>①Fightなびにはユーザー登録フォームが『一般ユーザー』と『管理ユーザー』の２種類があります。<p/>
                        <p>②現在選択中の『管理ユーザー』では、<span class="red">ジムのレビューやお気に入り登録などは一切行えません</span>。ただし閲覧は可能です</p>
                        <p>③管理ユーザー登録に関して、『一般ユーザー』の登録の際に使用したメールアドレスは使用でません。</p>
                        <p>これらの認識についてお間違いのないことをご確認の上でご登録をお願いいたします。</p>
                    </div>

                    <form method="POST" action="{{ route('admin.register') }}">
                        @csrf

                        <div class="form-group row justify-content-center mt-5">
                            <div class="col-md-8 col-lg-6">
                                <label>名前<span class="badge badge-danger">必須</span></label>
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
                                <label for="email">メールアドレス<span class="badge badge-danger">必須</span></label>
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
                                <label for="password">パスワード<span class="badge badge-danger">必須</span></label>
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-4">
                            <div class="col-md-8 col-lg-6">
                                <label for="password-confirm">パスワード（確認用）<span class="badge badge-danger">必須</span></label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="new-password">
                                @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center">
                            <div class="col-md-8 col-lg-6 text-center">
                                <button type="submit" class="btn btn-primary btn-lg col my-5">
                                    新規会員登録
                                </button>
                            </div>
                        </div>
                    </form>

                    <div class="form-group row justify-content-center">
                        <div class="col-md-8 col-lg-6 text-center">
                            <a href="{{ route('admin.login') }}" class="btn btn-outline-primary btn-lg col mt-3 mb-5">
                                ログインはこちら
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
