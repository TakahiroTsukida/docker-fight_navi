@extends('layouts.app')
@section('title', 'プロフィール編集')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 mx-auto">
                <div class="text-center">
                    <h5　class="page-title">プロフィール編集</h5>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action="{{ action('User\ProfileController@update') }}" method="post" enctype="multipart/form-data">
                            <div>
                                @if (isset($user->image_path))
                                    <p class="col-sm-2 offset-sm-5"><img src="{{ asset('storage/image/profile_images/'.$user->image_path) }}" alt="name"></p>
                                @else
                                    <p class="col-sm-2 offset-sm-5"><img src="{{ asset('image/macOS-Guest-user-logo-icon.jpg') }}" alt="name"></p>
                                @endif
                            </div>

                            <div>
                                @error('image')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                <input type="file" class="form-control-file" name="image">
                                <div class="form-text text-info">
                                    設定中:  {{ isset($user->image_path) ? $user->image_path : '' }}
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="remove" value="true">
                                        画像を削除
                                    </label>
                                </div>
                            </div>


                            {{-- <div>
                                <input type="file" class="btn btn-success">編集</button>
                                <a href="#" class="btn btn-danger">削除</a>
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
                                        @error('name')
                                            <div>
                                                <p class="error price-en">{{ $message }}</p>
                                            </div>
                                        @enderror
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                                </div>

                                <div class="form-group">
                                    <label>メールアドレス</label>
                                    <div>
                                        <label>{{ $user->email }}</label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>性別</label>
                                    <div>
                                        @error('gender')
                                            <div>
                                                <p class="error price-en">{{ $message }}</p>
                                            </div>
                                        @enderror
                                        <label class="radio-inline ml-sm-1 mr-5">
                                            @if (isset($user->gender))
                                            <input type="radio" name="gender" value="男性" {{ $user->gender == '男性' ? 'checked="checked"' : '' }}>
                                            @else
                                            <input type="radio" name="gender" value="男性">
                                            @endif
                                            男性
                                        </label>
                                        <label class="radio-inline">
                                            @if (isset($profile->gender))
                                            <input type="radio" name="gender" value="女性" {{ $user->gender == '女性' ? 'checked="checked"' : '' }}>
                                            @else
                                            <input type="radio" name="gender" value="女性">
                                            @endif
                                            女性
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="birthday">生年月日</label>
                                    <input type="date" name="birthday" class="form-control" value="{{ $user->birthday }}">
                                </div>

                                <div class="form-group">
                                    <label for="introduction">自己紹介</label>
                                    @error('introduction')
                                        <div>
                                            <p class="error price-en">{{ $message }}</p>
                                        </div>
                                    @enderror
                                    <textarea class="form-control" name="introduction" rows="5" maxlength="100">{{ $user->introduction }}</textarea>
                                </div>
                            </div>

                            <input type="hidden" name="user_id" value="{{ $user->id }}">

                            <div class="form-group row justify-content-center">
                                <div>
                                    <a href="#" class="btn btn-success mx-3 mt-5 mb-3 px-5 rounded-pill">戻る</a>
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
