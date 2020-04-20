@extends('layouts.admin')
@section('title', '管理ユーザー　新規登録')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col">
            <div class="card page-title">
                <div class="card-body">
                    <h5 class="text-center mt-5 mb-3">管理ユーザー　新規登録</h5>
                    <form method="POST" action="{{ route('admin.register') }}">
                        @csrf

                        <div class="form-group row justify-content-center mt-5">
                            <div class="col-md-8 col-lg-6">
                                @if (count($errors) > 0)
                                    <ul>
                                        @foreach($errors->all() as $e)
                                            <li><span>{{ $e }}</span></li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>
                        </div>


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
                                <label>性別</label>
                                <div>
                                    <label class="radio-inline ml-sm-1 mr-5">
                                        <input type="radio" name="gender" value="男性" {{ old('gender') == '男性' ? 'checked' : '' }}>
                                        男性
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="gender" value="女性" {{ old('gender') == '女性' ? 'checked' : '' }}>
                                        女性
                                    </label>
                                </div>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-4">
                            <div class="col-md-8 col-lg-6">
                                <label>生年月日</label>
                                <input id="birthday" type="date" class="form-control @error('name') is-invalid @enderror" name="birthday" value="{{ old('birthday') }}" required autocomplete="name" autofocus>

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
                                <label for="password-confirm">パスワード（確認用）</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}" required autocomplete="new-password">
                            </div>
                        </div>


                        <div class="form-group row justify-content-center mt-5">
                            <div class="col-md-8 col-lg-6">
                                <label>会社情報</label>
                            </div>
                        </div>


                        <div class="form-group row justify-content-center mt-2">
                            <div class="col-md-8 col-lg-6">
                                <label>会社名</label>
                                <input id="company_name" type="text" class="form-control @error('name') is-invalid @enderror" name="company_name" value="{{ old('company_name') }}" required autocomplete="company_name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-4">
                            <div class="col-md-8 col-lg-6">
                                <label>電話番号</label>
                                <input id="tel" type="tel" class="form-control @error('name') is-invalid @enderror" name="tel" value="{{ old('tel') }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-4">
                            <div class="col-md-8 col-lg-6">
                                <label>郵便番号</label>
                                <input id="address_number" type="text" maxlength="7" class="form-control @error('name') is-invalid @enderror" name="address_number" value="{{ old('address_number') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-4">
                            <div class="col-md-8 col-lg-6">
                                <label>都道府県</label>
                                <select name="address_ken" class="form-control">

                                  @include('parts/address_ken')

                                </select>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-4">
                            <div class="col-md-8 col-lg-6">
                                <label>市町村以降</label>
                                <input id="address_city" type="text" class="form-control @error('name') is-invalid @enderror" name="address_city" value="{{ old('address_city') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row justify-content-center mt-4">
                            <div class="col-md-8 col-lg-6">
                                <label>ホームページ</label>
                                <input id="web" type="text" class="form-control @error('name') is-invalid @enderror" name="web" value="{{ old('web') }}">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
