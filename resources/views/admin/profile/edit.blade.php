@extends('layouts.admin')
@section('title', '管理ユーザープロフィール編集')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 mx-auto">
                <div class="text-center">
                    <h5>管理ユーザープロフィール編集</h5>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('admin.profile.update') }}" method="post" enctype="multipart/form-data">

                            @if(count($errors) > 0)
                                <div>
                                    <div class="form-group">
                                        <ul>
                                            @foreach($errors->all() as $e)
                                                <li>{{ $e }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @endif

                            <div>
                                <div class="form-group">
                                    <label>名前</label>
                                    <input type="text" name="name" class="form-control" value="{{ $admin->name }}">
                                </div>

                                <div class="form-group">
                                    <label>メールアドレス</label>
                                    <div>
                                        <label>{{ $admin->email }}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>性別</label>
                                    <div>
                                        <label class="ml-sm-1 mr-5">
                                            {{ $admin->gender }}
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>生年月日</label>
                                    <input type="date" name="birthday" class="form-control" value="{{ $admin->birthday }}">
                                </div>

                                <div class="form-group">
                                    <label>会社名</label>
                                    <input type="text" name="company_name" class="form-control" value="{{ $admin->company_name }}">
                                </div>

                                <div class="form-group">
                                    <label>電話番号</label>
                                    <input type="tel" name="tel" class="form-control" value="{{ $admin->tel }}">
                                </div>

                                <div class="form-group">
                                    <label>郵便番号</label>
                                    <input type="text" name="address_number" class="form-control" value="{{ $admin->address_number }}">
                                </div>

                                <div class="form-group">
                                    <label>都道府県</label>
                                    <input type="text" name="address_ken" class="form-control" value="{{ $admin->address_ken }}">
                                </div>

                                <div class="form-group">
                                    <label>市町村以降</label>
                                    <input type="text" name="address_city" class="form-control" value="{{ $admin->address_city }}">
                                </div>

                                <div class="form-group">
                                    <label>ホームページ</label>
                                    <input type="text" name="web" class="form-control" value="{{ $admin->web }}">
                                </div>
                            </div>

                            <div class="form-group row justify-content-center">
                                <div>
                                    <a href="{{ route('user.profile.mypage') }}" class="btn btn-success mx-3 mt-5 mb-3 px-5 rounded-pill">戻る</a>
                                    <input type="submit" class="btn btn-primary mx-3 mt-5 mb-3 px-5 rounded-pill" value="更新">
                                </div>
                            </div>
                        {{ csrf_field() }}
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
