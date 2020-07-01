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
                                @php
                                    $types = [
                                        1 => 'ボクシング',
                                        2 => 'キックボクシング',
                                        3 => '総合格闘技',
                                        4 => 'パーソナルトレーニング',
                                    ];
                                @endphp

                                @foreach ($types as $key => $value)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="type[]" value="{{ $key }}" {{ is_array(old("type")) && in_array($key, old("type")) ? 'checked="checked"' : '' }}>
                                            {{ $value }}
                                        </label>
                                    </div>
                                @endforeach
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


                            {{-- 住所 --}}
                            <div class="form-group mt-4">
                                @include('parts/admin/label/shop/address')
                            </div>

                            <div class="form-address">
                                {{-- 郵便番号 --}}
                                @include('parts/admin/label/shop/address_number')

                                @error('address_number')
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
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
                                  @include('parts/address_ken_old');
                                </select>
                            </div>

                            <div class="form-address">
                                {{-- 市区郡 --}}
                                @include('parts/admin/label/shop/address_city')
                                @error('address_city')
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
                                @enderror
                                <input type="text" name="address_city" class="form-control form-ken" placeholder="例）渋谷区" value="{{ old('address_city') }}" required autocomplete="address_city" autofocus>
                            </div>

                            <div class="form-group">
                                {{-- 町村名以降 --}}
                                @include('parts/admin/label/shop/address_other')
                                @error('address_other')
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
                                @enderror
                                <input type="text" name="address_other" class="form-control" placeholder="例）〇〇1丁目1-1" value="{{ old('address_other') }}">
                            </div>

                            {{-- tax --}}
                            <div class="form-group mt-4">
                                <label class="shop-text">消費税表示</label>

                                @error('tax')
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
                                @enderror
                                
                                <div class="radio-group">
                                    <label class="radio">
                                        <input type="radio" name="tax" value="0" {{ old("tax") == "0" ? 'checked="checked"' : '' }}>
                                        税抜き
                                    </label>
                                    <label>
                                        <input type="radio" name="tax" value="1" {{ old("tax") == "1" || old("tax") == null ? 'checked="checked"' : '' }}>
                                        税込み
                                    </label>
                                </div>
                            </div>


                            {{-- 入会金 --}}
                            <div class="form-group mt-4">
                                @include('parts/admin/label/shop/join_price')
                            </div>

                            @error('join_price.name.*')
                                <div>
                                    <p class="error">{{ $message }}</p>
                                </div>
                            @enderror

                            @error('join_price.price.*')
                                <div>
                                    <p class="error">{{ $message }}</p>
                                </div>
                            @enderror

                            {{-- プライス --}}
                            @php
                                $basics = ['男性', '女性', '学生', '', '', ''];
                            @endphp
                            @foreach ($basics as $key => $basic)
                                <div class="form-group mt-4">
                                    <input type="text" name="join_price[name][]" class="form-control price-item-name @error('join_price.name.{{ $key }}') is-invalid @enderror" placeholder="{{ $basic }}" value="{{ is_array(old("join_price.name")) && old("join_price.name.$key") != '' ? old("join_price.name.$key") : '' }}">

                                    <input type="number" name="join_price[price][]" class="form-control price-item @error('join_price.price.{{ $key }}') is-invalid @enderror" value="{{ is_array(old("join_price.price")) && old("join_price.price.$key") != '' ? old("join_price.price.$key") : '' }}">
                                    <p class="price-en"><small>円</small></p>
                                </div>
                            @endforeach


                            {{-- 月会費 --}}
                            <div class="form-group mt-4">
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
                                $basics = ['男性', '女性', '学生', '', '', '', '', '', ''];
                            @endphp
                            @foreach ($basics as $key => $basic)
                                <div class="form-group mt-4">
                                    <input type="text" name="price[name][]" class="form-control price-item-name @error('price.name.{{ $key }}') is-invalid @enderror" placeholder="{{ $basic }}" value="{{ is_array(old("price.name")) && old("price.name.$key") != '' ? old("price.name.$key") : '' }}">

                                    <input type="number" name="price[price][]" class="form-control price-item @error('price.price.{{ $key }}') is-invalid @enderror" value="{{ is_array(old("price.price")) && old("price.price.$key") != '' ? old("price.price.$key") : '' }}">
                                    <p class="price-en"><small>円</small></p>
                                </div>
                            @endforeach


                            {{-- その他の会費 --}}
                            <div class="form-group mt-4">
                                @include('parts/admin/label/shop/other_price')
                            </div>

                            @error('other_price.name.*')
                                <div>
                                    <p class="error">{{ $message }}</p>
                                </div>
                            @enderror

                            @error('other_price.price.*')
                                <div>
                                    <p class="error">{{ $message }}</p>
                                </div>
                            @enderror

                            {{-- プライス --}}
                            @php
                                $basics = ['ビジター', '', '', '', ''];
                            @endphp
                            @foreach ($basics as $key => $basic)
                                <div class="form-group mt-4">
                                    <input type="text" name="other_price[name][]" class="form-control price-item-name @error('other_price.name.{{ $key }}') is-invalid @enderror" placeholder="{{ $basic }}" value="{{ is_array(old("other_price.name")) && old("other_price.name.$key") != '' ? old("other_price.name.$key") : '' }}">

                                    <input type="number" name="other_price[price][]" class="form-control price-item @error('other_price.price.{{ $key }}') is-invalid @enderror" value="{{ is_array(old("other_price.price")) && old("other_price.price.$key") != '' ? old("other_price.price.$key") : '' }}">
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

                            @for ($i = 0; $i < 6; $i++)
                                <div class="form-group personal-group">
                                  {{-- コース名 --}}
                                  <input type="text" name="personal[course][]" class="form-control shop-text form-personal-c @error('personal.course.{{ $i }}') is-invalid @enderror" placeholder="コース名" value="{{ is_array(old("personal.course")) && old("personal.course.$i") != '' ? old("personal.course.$i") : '' }}">
                                  {{-- 時間 --}}
                                  <input type="number" name="personal[time][]" class="form-control shop-text form-personal-t @error('personal.time.{{ $i }}') is-invalid @enderror" placeholder="例)50" value="{{ is_array(old("personal.time")) && old("personal.time.$i") != '' ? old("personal.time.$i") : '' }}">
                                  <p class="price-en">分</p>
                                  {{-- 金額 --}}
                                  <input type="number" name="personal[price][]" class="form-control shop-text form-personal-p @error('personal.price.{{ $i }}') is-invalid @enderror" placeholder="例)5500" value="{{ is_array(old("personal.price")) && old("personal.price.$i") != '' ? old("personal.price.$i") : '' }}">
                                  <p class="price-en">円</p>
                                </div>
                            @endfor


                            {{-- shop --}}
                            <div class="form-group mt-4">
                                {{-- 営業日 --}}
                                @include('parts/admin/label/shop/open')

                                {{-- バリデーションエラー --}}
                                @error('open.day.*')
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('open.time.*')
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
                                @enderror

                                {{-- opens --}}
                                @php
                                    $week = ['月曜日', '火曜日', '水曜日', '木曜日', '金曜日', '土曜日', '日曜日', '祝日', ''];
                                @endphp
                                @foreach($week as $key => $day)
                                    <div class="open-group">
                                        {{-- 曜日 --}}
                                        <input type="text" name="open[day][]" class="form-control open-day" placeholder="{{ $day }}" value="{{ is_array(old("open.day")) && old("open.day.$key") != '' ? old("open.day.$key") : '' }}">
                                        {{-- 営業時間 --}}
                                        <input type="text" name="open[time][]" class="form-control open-time" placeholder="営業時間をお書きください" value="{{ is_array(old("open.time")) && old("open.time.$key") != '' ? old("open.time.$key") : '' }}">
                                    </div>
                                @endforeach
                            </div>

                            <div class="form-group mt-4">
                                {{-- 定休日 --}}
                                @include('parts/admin/label/shop/close')
                                @error('close')
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
                                @enderror
                                <input type="text" name="close" class="form-control @error('close') is-invalid @enderror" placeholder="例）毎月第２水曜日" value="{{ old('close') }}">
                            </div>

                            <div class="form-group mt-4">
                                {{-- ホームページ --}}
                                @include('parts/admin/label/shop/web')
                                @error('web')
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
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
                                        @php
                                            $trials = ['無料', '有料', 'なし', '不明'];
                                        @endphp

                                            <option value="">選択してください</option>
                                        @foreach ($trials as $trial)
                                            <option value="{{ $trial }}" {{ old('trial') == $trial ? 'selected="selected"' : '' }}>{{ $trial }}</option>
                                        @endforeach
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
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
                                @enderror
                                <textarea name="description" class="form-control @error('description') is-invalid @enderror" rows="10" placeholder="ご自由にお書きください">{{ old('description') }}</textarea>
                            </div>

                            <div class="input-group mt-4">
                                @error('image')
                                    <div>
                                        <p class="error">{{ $message }}</p>
                                    </div>
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
