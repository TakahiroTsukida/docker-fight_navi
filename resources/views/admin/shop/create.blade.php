@extends('layouts.admin')
@section('title', '新規ジム・道場登録')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h2 class="text-center my-5 mx-auto">新規ジム・道場登録</h2>
                <div class="card">
                    <div class="body">

                        <form action="{{ route('admin.shop.create') }}" method="post" enctype="multipart/form-data">

                            {{-- name --}}
                            <div class="form-group mt-4">
                                @include('parts/admin/label/shop/name')

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="例）Example GYM" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            </div>


                            {{-- type --}}
                            <div class="form-group mt-4">
                                @include('parts/admin/label/shop/type')

                                @error('type')
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
                                @enderror
                                <div class="checkbox">
                                   <label>
                                       <input type="checkbox" name="type[]" value="1" {{ old('type.*') == "1" ? 'checked="checked"' : '' }}>
                                       ボクシング
                                   </label>
                                </div>
                                <div class="checkbox">
                                   <label>
                                       <input type="checkbox" name="type[]" value="2" {{ old('type.*') == "1" ? 'checked="checked"' : '' }}>
                                       キックボクシング
                                   </label>
                                </div>
                                <div class="checkbox">
                                   <label>
                                       <input type="checkbox" name="type[]" value="3" {{ old('type.*') == "1" ? 'checked="checked"' : '' }}>
                                       総合格闘技
                                   </label>
                                </div>
                                <div class="checkbox">
                                   <label>
                                       <input type="checkbox" name="type[]" value="4" {{ old('type.*') == "1" ? 'checked="checked"' : '' }}>
                                       パーソナルトレーニング
                                   </label>
                                </div>
                            </div>


                            {{-- tel --}}
                            <div class="form-group mt-4">
                                @include('parts/admin/label/shop/tel')

                                @error('tel')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="text" name="tel" maxlength="13" class="form-control @error('tel') is-invalid @enderror" placeholder="例) 03-1234-5678" value="{{ old('tel') }}">
                            </div>


                            {{-- address --}}
                            <div class="form-group mt-4">
                                {{-- 住所 --}}
                                @include('parts/admin/label/shop/address')
                            </div>

                            <div class="form-address">
                                @include('parts/admin/label/shop/address_number')

                                @error('address_number')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="tel" name="address_number" maxlength="8" class="form-control form-number" placeholder="例）103-0013" value="{{ old('address_number') }}">
                            </div>

                            <div class="form-address">
                                {{-- 都道府県 --}}
                                @include('parts/admin/label/shop/address_ken')

                                @error('address_ken')
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
                                @enderror
                                <select name="address_ken" class="form-control form-ken">
                                  @include('parts/address_ken');
                                </select>
                            </div>

                            <div class="form-address">
                                {{-- 市区郡 --}}
                                @include('parts/admin/label/shop/address_city')
                                @error('address_city')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="text" name="address_city" class="form-control form-ken" placeholder="例）渋谷区" value="{{ old('address_city') }}" required autocomplete="address_city" autofocus>
                            </div>

                            <div class="form-group">
                                {{-- 町村名以降 --}}
                                @include('parts/admin/label/shop/address_other')
                                @error('address_other')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                <input type="text" name="address_other" class="form-control" placeholder="例）〇〇1丁目1-1" value="{{ old('address_other') }}">
                            </div>

                            <div class="form-group mt-4">
                                {{-- 会費 --}}
                                @include('parts/admin/label/shop/price')
                            </div>
                            @error('price.name.*')
                                <div>
                                    <p class="error">{{ $message }}</p>
                                </div>
                            @enderror

                            @error('price.price.*')
                                <div>
                                    <p class="error">{{ $message }}</p>
                                </div>
                            @enderror

                            {{-- プライス --}}
                            @php
                                $basics = ['入会金', '男性', '女性', '', '', '', '', ''];
                                $n = 0;
                            @endphp
                            @foreach ($basics as $basic)
                                <div class="form-group mt-4">
                                    <input type="text" name="price[name][]" class="form-control price-item-name @error('price.name.*') is-invalid @enderror" value="{{ old('price.name.$n++') == null ? $basic : old('price.name.$n++') }}">

                                    <input type="number" name="price[price][]" class="form-control price-item @error('price.price.$n++') is-invalid @enderror" value="{{ old('price.price.$n++') }}">
                                    <p class="price-en"><small>円</small></p>
                                </div>
                            @endforeach


                            {{-- パーソナル --}}
                            <div class="form-group mt-5">
                                @include('parts/admin/label/shop/personal')

                               {{-- バリデーションエラー --}}

                                @error('personal.course.*')
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('personal.time.*')
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('personal.price.*')
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
                                @enderror
                            </div>

                            @for ($i = 0; $i < 5; $i++)
                                <div class="form-group personal-group">
                                  {{-- コース名 --}}
                                  <input type="text" name="personal[course][]" class="form-control shop-text form-personal-c @error('personal.course.$i') is-invalid @enderror" placeholder="コース名" value="{{ old('personal.course.$i') }}">
                                  {{-- 時間 --}}
                                  <input type="number" name="personal[time][]" class="form-control shop-text form-personal-t @error('personal.time.$i') is-invalid @enderror" placeholder="例)50" value="{{ old('personal.time.$i') }}">
                                  <p class="price-en">分</p>
                                  {{-- 金額 --}}
                                  <input type="number" name="personal[price][]" class="form-control shop-text form-personal-p @error('personal.price.$i') is-invalid @enderror" placeholder="例)5500" value="{{ old('personal.price.$i') }}">
                                  <p class="price-en">円</p>
                                </div>
                            @endfor


                            {{-- shop --}}
                            <div class="form-group mt-4">
                                {{-- 営業日 --}}
                                @include('parts/admin/label/shop/open')
                                @error('open')
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
                                @enderror

                                {{-- バリデーションエラー --}}
                                @error('open.day')
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('open.time')
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
                                @enderror

                                {{-- opens --}}
                                @php
                                    $week = ['月曜', '火曜', '水曜', '木曜', '金曜', '土曜', '日曜', '祝日', ''];
                                @endphp
                                @foreach($week as $day)
                                    <div class="open-group">
                                        {{-- 曜日 --}}
                                        <input type="text" name="open[day][]" class="form-control open-day @error('open.day.*') is-invalid @enderror" value="{{ old('open.day.*') == null ? $day : old('open.day.*') }}">
                                        {{-- 営業時間 --}}
                                        <input type="text" name="open[time][]" class="form-control open-time @error('open.time.*') is-invalid @enderror" placeholder="営業時間をお書きください" value="{{ old('open.time.*') }}">
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group mt-4">
                                {{-- 定休日 --}}
                                @include('parts/admin/label/shop/close')
                                @error('close')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                @enderror
                                <input type="text" name="close" class="form-control @error('close') is-invalid @enderror" placeholder="例）毎月第２水曜日" value="{{ old('close') }}">
                            </div>

                            <div class="form-group mt-4">
                                {{-- ホームページ --}}
                                @include('parts/admin/label/shop/web')
                                @error('web')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                @enderror
                                <input type="text" name="web" class="form-control @error('web') is-invalid @enderror" placeholder="例）https://example.com" value="{{ old('web') }}">
                            </div>

                            <div class="trial-group">
                                <div class="trial-list">
                                    {{-- 無料体験 --}}
                                    @include('parts/admin/label/shop/trial')

                                    @error('trial')
                                        <div>
                                            <p class="error">{{ $message }}</p>
                                        </div>
                                    @enderror
                                    <select name="trial" class="form-control form-ken">
                                        <option value="">選択してください</option>
                                        <option value="無料">無料</option>
                                        <option value="有料">有料</option>
                                        <option value="なし">なし</option>
                                    </select>
                                </div>
                                <div class="trial-list">
                                    <label class="mt-3 shop-text">有料の場合のみ金額を記入</lebel>
                                    <div class="trial-block">
                                        <input type="number" name="trial_price" class="form-control trial-price" placeholder="例)500" value="{{ old('address_city') }}">
                                        <p class="price-en">円</p>
                                  </div>
                                </div>
                            </div>



                            <div class="form-group mt-4">
                                {{-- 簡単な説明 --}}
                                @include('parts/admin/label/shop/description')
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                @enderror
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="10" placeholder="ご自由にお書きください">{{ old('description') }}</textarea>
                            </div>

                            <div class="input-group mt-4">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                   </span>
                                @enderror
                                <p class="badge badge-danger">画像は1MB以下のものにしてください</p>
                                <input type="file" name="image" class="file-upload @error('image') is-invalid @enderror" value="画像アップロード">
                            </div>

                            <div class="form-group row justify-content-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-success show-btn" onclick=history.back()>戻る</button>
                                </div>
                                <div class="btn-group">
                                    <input type="submit" class="btn btn-primary show-btn" value="登録">
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
