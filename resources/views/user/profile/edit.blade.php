@extends('layouts.app')
@section('title', 'プロフィール編集')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 mx-auto">
                <div class="text-center">
                    <h5>プロフィール編集</h5>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                            <div>
                                <p class="col-sm-2 offset-sm-5"><img src="{{ asset('image/macOS-Guest-user-logo-icon.jpg') }}" alt="name" width="70"></p>
                            </div>

                            <div>
                                <input type="file" class="form-control-file" name="image">
                                <div class="form-text text-info">
                                    設定中:
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="remove" value="true">
                                        画像を削除
                                    </label
                                </div>
                            </div>


                            {{-- <div>
                                <input type="file" class="btn btn-success">編集</button>
                                <button type="submit" class="btn btn-danger">削除</button>
                            </div> --}}



                            @if(count($errors) > 0)
                                <ul>
                                    @foreach($errors->all() as $e)
                                        <li>{{ $e }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            <div>
                                <div class="form-group">
                                    <label>名前</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                </div>

                                <div class="form-group">
                                    <label>メールアドレス</label>
                                    <div>
                                        <label>{{ $user->email }}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    @if (isset($user->gender))
                                        <label>性別</label>
                                        <div>
                                            <label class="ml-sm-1 mr-5">
                                                @if ($user->gender === 0)
                                                    女
                                                @else
                                                    男
                                                @endif
                                            </label>
                                        </div>
                                    @else
                                        <label>性別　※性別は一度設定すると変更できません</label>
                                        <div>
                                            <label class="radio-inline ml-sm-1 mr-5">
                                                <input type="radio" name="gender" value="0">
                                                男性
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="gender" value="1">
                                                女性
                                            </label>
                                        </div>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="birthday">生年月日</label>
                                    <input type="date" name="birthday" class="form-control" value="{{ $user->birthday }}">
                                </div>

                                <div class="form-group">
                                    <label for="introduction">自己紹介</label>
                                    <textarea class="form-control" name="introduction" rows="5" maxlength="100">{{ $user->introduction }}</textarea>
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
