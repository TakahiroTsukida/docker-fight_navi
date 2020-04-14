@extends('layouts.admin')
@section('title', '新規ジム・道場登録')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h2 class="text-center my-5 mx-auto">新規ジム・道場登録</h2>
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('admin.store.create') }}" method="post" enctype="multipart/form-data">

                            <div class="form-group mt-4">
                                <label for="name">ジム・道場名</label>
                                <input type="text" name="name" class="form-control" placeholder="例）Example GYM" value="{{ old('name') }}">
                            </div>

                            <div class="form-group mt-4">
                                <label>ジャンル（複数回答可）</label>

                                <div class="checkbox">
                                   <label>
                                       <input type="checkbox" name="type[]" value="boxing">
                                       ボクシング
                                   </label>
                                </div>

                                <div class="checkbox">
                                   <label>
                                       <input type="checkbox" name="type[]" value="kick">
                                       キックボクシング
                                   </label>
                                </div>

                                <div class="checkbox">
                                   <label>
                                       <input type="checkbox" name="type[]" value="mma">
                                       総合格闘技
                                   </label>
                                </div>

                                <div class="checkbox">
                                   <label>
                                       <input type="checkbox" name="type[]" value="personal">
                                       パーソナルトレーニング
                                   </label>
                                </div>
                            </div>

                            <div class="form-group mt-4">
                                <label for="tel">電話番号（ハイフンなし）</label>
                                <input type="text" name="tel" maxlength="11" class="form-control" placeholder="例) 0312345678" value="{{ old('tel') }}">
                            </div>

                            <div class="form-group mt-4">
                                <label class="d-block">住所</label>

                                <label>郵便番号(7桁)</label>
                                <input type="text" name="address_number" maxlength="7" class="form-control" placeholder="1030013" value="{{ old('address_number') }}">

                                <label class="mt-3">都道府県</label>
                                  <select name="address_ken" class="form-control">

                                    @include('parts/address_ken');

                                  </select>

                                <label class="mt-3">市区町村以降</label>
                                <input type="text" name="address_city" class="form-control" placeholder="中央区日本橋人形町" value="{{ old('address_city') }}">
                            </div>

                            <div class="form-group mt-4">
                                <label for="join" class="d-inline mr-1">入会金</label>
                                <input type="text" name="join" class="form-control col-sm-4 d-inline mx-1" placeholder="例）11000" value="{{ old('join') }}">
                                <p class="d-inline ml-1"><small>円（税込）</small></p>
                            </div>

                            <div class="form-group mt-4">
                                <label>月会費</label>
                            </div>

                            <div class="form-group">
                                <label for="man_price" class="d-inline ml-3 mr-1">男性</label>
                                <input type="text" name="man_price" class="form-control col-sm-4 d-inline mx-1" placeholder="例）11000" value="{{ old('man_price') }}">
                                <p class="d-inline ml-1"><small>円/月（税込）</small></p>
                            </div>

                            <div class="form-group">
                                <label for="woman_price" class="d-inline ml-3 mr-1">女性</label>
                                <input type="text" name="woman_price" class="form-control col-sm-4 d-inline mx-1" placeholder="例）8800" value="{{ old('woman_price') }}">
                                <p class="d-inline ml-1"><small>円/月（税込）</small></p>
                            </div>

                            <div class="form-group">
                                <label for="student_price" class="d-inline ml-3 mr-1">学生</label>
                                <input type="text" name="student_price" class="form-control col-sm-4 d-inline mx-1" placeholder="例）8800" value="{{ old('student_price') }}">
                                <p class="d-inline ml-1"><small>円/月（税込）</small></p>
                            </div>

                            <div class="form-group mt-4">
                                <label for="other_price">その他の会費</label>
                                <input type="text" name="other_price" class="form-control" placeholder="ご自由にお書きください" value="{{ old('other_price') }}">
                            </div>


                            <div class="form-group mt-4">
                                <label>パーソナルトレーニング会費（コースがある場合のみ入力）</label>
                            </div>

                            <div class="form-group">
                                <label class="d-inline ml-3 mr-1">①</label>
                                <input type="text" name="personal_course1" class="form-control col-sm-4 d-inline mx-1" placeholder="例）ボクシング" value="{{ old('personal_course1') }}">
                                <input type="text" name="personal_time1" class="form-control col-sm-2 d-inline mx-1" placeholder="50" value="{{ old('personal_time1') }}">
                                <p class="d-inline ml-1"><small>分</small></p>
                                <input type="text" name="personal_price1" class="form-control col-sm-2 d-inline mx-1" placeholder="5500" value="{{ old('personal_price1') }}">
                                <p class="d-inline ml-1"><small>円（税込）</small></p>
                            </div>

                            <div class="form-group">
                                <label class="d-inline ml-3 mr-1">②</label>
                                <input type="text" name="personal_course2" class="form-control col-sm-4 d-inline mx-1" placeholder="例）ボクシング" value="{{ old('personal_course2') }}">
                                <input type="text" name="personal_time2" class="form-control col-sm-2 d-inline mx-1" placeholder="80" value="{{ old('personal_time2') }}">
                                <p class="d-inline ml-1"><small>分</small></p>
                                <input type="text" name="personal_price2" class="form-control col-sm-2 d-inline mx-1" placeholder="7000" value="{{ old('personal_price2') }}">
                                <p class="d-inline ml-1"><small>円（税込）</small></p>
                            </div>

                            <div class="form-group">
                                <label class="d-inline ml-3 mr-1">③</label>
                                <input type="text" name="personal_course3" class="form-control col-sm-4 d-inline mx-1" placeholder="例）ボクシング" value="{{ old('personal_course3') }}">
                                <input type="text" name="personal_time3" class="form-control col-sm-2 d-inline mx-1" placeholder="110" value="{{ old('personal_time3') }}">
                                <p class="d-inline ml-1"><small>分</small></p>
                                <input type="text" name="personal_price3" class="form-control col-sm-2 d-inline mx-1" placeholder="8800" value="{{ old('personal_price3') }}">
                                <p class="d-inline ml-1"><small>円（税込）</small></p>
                            </div>

                            <div class="form-group mt-4">
                                <label for="open">営業日</label>
                                <input type="text" name="open" class="form-control" placeholder="例）平日15:00~21:00　土日祝13:00~17:00" value="{{ old('open') }}">
                            </div>

                            <div class="form-group mt-4">
                                <label for="close">定休日</label>
                                <input type="text" name="close" class="form-control" placeholder="例）毎月第２水曜日" value="{{ old('close') }}">
                            </div>

                            <div class="form-group mt-4">
                                <label for="web">ホームページ</label>
                                <input type="text" name="web" class="form-control" placeholder="例）https://example.com" value="{{ old('web') }}">
                            </div>

                            <div class="form-group mt-4">
                                <label for="description">簡単な説明</label>
                                <textarea name="description" class="form-control" rows="10" placeholder="ご自由にお書きください">{{ old('description') }}</textarea>
                            </div>

                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-success">
                                        画像アップロード<input type="file" name="image" style="display:none">
                                    </span>
                                </label>
                                <input type="text" class="form-control" readonly="">
                            </div>

                            <div class="form-group row justify-content-center">
                                <div>
                                    <a href="#" class="btn btn-success mx-3 mt-5 mb-3 px-5 rounded-pill">戻る</a>
                                    <input type="submit" class="btn btn-primary mx-3 mt-5 mb-3 px-5 rounded-pill" value="登録">
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
