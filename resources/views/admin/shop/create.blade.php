@extends('layouts.admin')
@section('title', '新規ジム・道場登録')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h2 class="text-center my-5 mx-auto">新規ジム・道場登録</h2>
                <div class="card">
                    <div class="card-body">

                        <form action="{{ route('admin.shop.create') }}" method="post" enctype="multipart/form-data">

                            @if (count($errors) > 0)
                                <ul>
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif

                            {{-- name --}}
                            <div class="form-group mt-4">
                                <label for="name">ジム・道場名</label>
                                <input type="text" name="name" class="form-control" placeholder="例）Example GYM" value="{{ old('name') }}">
                            </div>


                            {{-- type --}}
                            <div class="form-group mt-4">
                                <label>ジャンル（複数回答可）</label>

                                <div class="checkbox">
                                   <label>
                                       <input type="checkbox" name="type[]" value="1">
                                       ボクシング
                                   </label>
                                </div>
                                <div class="checkbox">
                                   <label>
                                       <input type="checkbox" name="type[]" value="2">
                                       キックボクシング
                                   </label>
                                </div>
                                <div class="checkbox">
                                   <label>
                                       <input type="checkbox" name="type[]" value="3">
                                       総合格闘技
                                   </label>
                                </div>
                                <div class="checkbox">
                                   <label>
                                       <input type="checkbox" name="type[]" value="4">
                                       パーソナルトレーニング
                                   </label>
                                </div>
                            </div>


                            {{-- tel --}}
                            <div class="form-group mt-4">
                                <label for="tel">電話番号（ハイフンなし）</label>
                                <input type="text" name="tel" maxlength="11" class="form-control" placeholder="例) 0312345678" value="{{ old('tel') }}">
                            </div>


                            {{-- address --}}
                            <div class="form-group mt-4">
                                <label class="d-block">住所</label>

                                <label>郵便番号(ハイフンなし)</label>
                                <input type="tel" name="address_number" maxlength="7" class="form-control" placeholder="例）1030013" value="{{ old('address_number') }}">

                                <label class="mt-3">都道府県</label>
                                  <select name="address_ken" class="form-control">
                                    @include('parts/address_ken');
                                  </select>

                                <label class="mt-3">市区町村以降</label>
                                <input type="text" name="address_city" class="form-control" value="{{ old('address_city') }}">
                            </div>



                            {{-- price --}}
                            <div class="form-group mt-4">
                                <label class="d-inline mr-1">
                                    <input type="hidden" name="price[name][]" value="入会金">
                                    入会金
                                  </label>
                                <input type="number" name="price[price][]" class="form-control col-sm-4 d-inline mx-1" placeholder="半角数字" value="{{ old('price[price][]') }}">
                                <p class="d-inline ml-1"><small>円（税込）</small></p>
                            </div>

                            <div class="form-group mt-4">
                                <label>月会費</label>
                            </div>

                            <div class="form-group">
                                <label class="d-inline ml-3 mr-1">
                                    <input type="hidden" name="price[name][]" value="男性">
                                    男性
                                </label>
                                <input type="number" name="price[price][]" class="form-control col-sm-4 d-inline mx-1" placeholder="半角数字" value="{{ old('price[price][]') }}">
                                <p class="d-inline ml-1"><small>円/月（税込）</small></p>
                            </div>

                            <div class="form-group">
                                <label class="d-inline ml-3 mr-1">
                                    <input type="hidden" name="price[name][]" value="女性">
                                    女性
                                </label>
                                <input type="number" name="price[price][]" class="form-control col-sm-4 d-inline mx-1" placeholder="半角数字" value="{{ old('price[price][]') }}">
                                <p class="d-inline ml-1"><small>円/月（税込）</small></p>
                            </div>



                            <div class="form-group">
                                <input type="text" name="price[name][]" class="form-control d-inline ml-3 mr-1 col-sm-1" value="{{ old('price[name][]') }}">
                                <input type="number" name="price[price][]" class="form-control col-sm-4 d-inline mx-1" placeholder="半角数字" value="{{ old('price[price][]') }}">
                                <p class="d-inline ml-1"><small>円/月（税込）</small></p>
                            </div>

                            <div class="form-group">
                                <input type="text" name="price[name][]" class="form-control d-inline ml-3 mr-1 col-sm-1" value="{{ old('price[name][]') }}">
                                <input type="number" name="price[price][]" class="form-control col-sm-4 d-inline mx-1" value="{{ old('price[price][]') }}">
                                <p class="d-inline ml-1"><small>円/月（税込）</small></p>
                            </div>

                            <div class="form-group">
                                <input type="text" name="price[name][]" class="form-control d-inline ml-3 mr-1 col-sm-1" value="{{ old('price[name][]') }}">
                                <input type="number" name="price[price][]" class="form-control col-sm-4 d-inline mx-1" value="{{ old('price[price][]') }}">
                                <p class="d-inline ml-1"><small>円/月（税込）</small></p>
                            </div>


                            <div class="form-group mt-4">
                                <label>パーソナルトレーニング会費（コースがある場合のみ入力）</label>
                            </div>

                            <div class="form-group">
                                <label class="d-inline ml-3 mr-1">①</label>

                                {{-- コース名 --}}
                                <input type="text" name="personal[course][]" class="form-control col-sm-4 d-inline mx-1" placeholder="コース名" value="{{ old('personal[course][]') }}">

                                {{-- 時間 --}}
                                <input type="number" name="personal[time][]" class="form-control col-sm-2 d-inline mx-1" placeholder="例)50" value="{{ old('personal[time][]') }}">
                                <p class="d-inline ml-1"><small>分</small></p>

                                {{-- 金額 --}}
                                <input type="number" name="personal[price][]" class="form-control col-sm-2 d-inline mx-1" placeholder="例)5500" value="{{ old('personal[price][]') }}">
                                <p class="d-inline ml-1"><small>円（税込）</small></p>
                            </div>

                            <div class="form-group">
                                <label class="d-inline ml-3 mr-1">②</label>

                                {{-- コース名 --}}
                                <input type="text" name="personal[course][]" class="form-control col-sm-4 d-inline mx-1" value="{{ old('personal[course][]') }}">

                                {{-- 時間 --}}
                                <input type="number" name="personal[time][]" class="form-control col-sm-2 d-inline mx-1" value="{{ old('personal[time][]') }}">
                                <p class="d-inline ml-1"><small>分</small></p>

                                {{-- 金額 --}}
                                <input type="number" name="personal[price][]" class="form-control col-sm-2 d-inline mx-1" value="{{ old('personal[price][]') }}">
                                <p class="d-inline ml-1"><small>円（税込）</small></p>
                            </div>

                            <div class="form-group">
                                <label class="d-inline ml-3 mr-1">③</label>

                                {{-- コース名 --}}
                                <input type="text" name="personal[course][]" class="form-control col-sm-4 d-inline mx-1" value="{{ old('personal[course][]') }}">

                                {{-- 時間 --}}
                                <input type="number" name="personal[time][]" class="form-control col-sm-2 d-inline mx-1" value="{{ old('personal[time][]') }}">
                                <p class="d-inline ml-1"><small>分</small></p>

                                {{-- 金額 --}}
                                <input type="number" name="personal[price][]" class="form-control col-sm-2 d-inline mx-1" value="{{ old('personal[price][]') }}">
                                <p class="d-inline ml-1"><small>円（税込）</small></p>
                            </div>

                            <div class="form-group">
                                <label class="d-inline ml-3 mr-1">④</label>

                                {{-- コース名 --}}
                                <input type="text" name="personal[course][]" class="form-control col-sm-4 d-inline mx-1" value="{{ old('personal[course][]') }}">

                                {{-- 時間 --}}
                                <input type="number" name="personal[time][]" class="form-control col-sm-2 d-inline mx-1" value="{{ old('personal[time][]') }}">
                                <p class="d-inline ml-1"><small>分</small></p>

                                {{-- 金額 --}}
                                <input type="number" name="personal[price][]" class="form-control col-sm-2 d-inline mx-1" value="{{ old('personal[price][]') }}">
                                <p class="d-inline ml-1"><small>円（税込）</small></p>
                            </div>

                            <div class="form-group">
                                <label class="d-inline ml-3 mr-1">⑤</label>

                                {{-- コース名 --}}
                                <input type="text" name="personal[course][]" class="form-control col-sm-4 d-inline mx-1" value="{{ old('personal[course][]') }}">

                                {{-- 時間 --}}
                                <input type="number" name="personal[time][]" class="form-control col-sm-2 d-inline mx-1" value="{{ old('personal[time][]') }}">
                                <p class="d-inline ml-1"><small>分</small></p>

                                {{-- 金額 --}}
                                <input type="number" name="personal[price][]" class="form-control col-sm-2 d-inline mx-1" value="{{ old('personal[price][]') }}">
                                <p class="d-inline ml-1"><small>円（税込）</small></p>
                            </div>

                            <div class="form-group mt-4">
                                <label>営業日</label>
                                <input type="text" name="open" class="form-control" placeholder="例）平日15:00~21:00　土日祝13:00~17:00" value="{{ old('open') }}">
                            </div>

                            <div class="form-group mt-4">
                                <label>定休日</label>
                                <input type="text" name="close" class="form-control" placeholder="例）毎月第２水曜日" value="{{ old('close') }}">
                            </div>

                            <div class="form-group mt-4">
                                <label>ホームページ</label>
                                <input type="text" name="web" class="form-control" placeholder="例）https://example.com" value="{{ old('web') }}">
                            </div>

                            <div class="form-group mt-4">
                                <label>簡単な説明</label>
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
