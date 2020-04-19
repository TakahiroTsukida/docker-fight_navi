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

                                @error('shop_name')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                <input type="text" name="shop_name" class="form-control" placeholder="例）Example GYM" value="{{ old('shop_name') }}">
                            </div>


                            {{-- type --}}
                            <div class="form-group mt-4">
                                @include('parts/admin/label/shop/type')

                                @error('type')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
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
                                @include('parts/admin/label/shop/tel')

                                @error('tel')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                <input type="text" name="tel" maxlength="11" class="form-control" placeholder="例) 0312345678" value="{{ old('tel') }}">
                            </div>


                            {{-- address --}}
                            <div class="form-group mt-4">
                                {{-- 住所 --}}
                                @include('parts/admin/label/shop/address')
                            </div>

                            <div class="form-address">
                                @include('parts/admin/label/shop/address_number')

                                @error('address_number')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    <div>
                                @enderror
                                <input type="tel" name="address_number" maxlength="7" class="form-control form-number" placeholder="例）1030013" value="{{ old('address_number') }}">
                            </div>

                            <div class="form-address">
                                {{-- 都道府県 --}}
                                @include('parts/admin/label/shop/address_ken')

                                @error('address_ken')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                <select name="address_ken" class="form-control form-ken">
                                  @include('parts/address_ken');
                                </select>
                            </div>

                            <div class="form-group">
                                {{-- 市区町村以降 --}}
                                @include('parts/admin/label/shop/address_city')
                                @error('address_city')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                <input type="text" name="address_city" class="form-control" value="{{ old('address_city') }}">
                            </div>



                            {{-- price --}}
                            <div class="form-group mt-4">
                                @error('price.price.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                <label class="shop-text">
                                    <input type="hidden" name="price[name][]" value="入会金">
                                    入会金
                                </label>
                                <input type="number" name="price[price][]" class="form-control price-item form-join" placeholder="半角数字" value="{{ old('price[price][]') }}">
                                <p class="price-en">円（税込）</p>
                            </div>

                            <div class="form-group mt-4">
                                {{-- 月会費 --}}
                                @include('parts/admin/label/shop/price')
                            </div>

                            <div class="form-group mt-4">
                                @error('price.price.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                <label class="d-inline shop-text">
                                    <input type="hidden" name="price[name][]" value="男性">
                                    　男性
                                </label>
                                <input type="number" name="price[price][]" class="form-control price-item form-join" placeholder="半角数字" value="{{ old('price[price][]') }}">
                                <p class="price-en">円（税込）</p>
                            </div>

                            <div class="form-group">
                                @error('price.price.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                <label class="d-inline shop-text">
                                    <input type="hidden" name="price[name][]" value="女性">
                                    　女性
                                </label>
                                <input type="number" name="price[price][]" class="form-control price-item form-join" placeholder="半角数字" value="{{ old('price[price][]') }}">
                                <p class="price-en">円（税込）</p>
                            </div>

                            {{-- prices --}}
                            <div class="form-group mt-4">
                                @error('price.name.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('price.price.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                <input type="text" name="price[name][]" class="form-control price-item-name" value="{{ old('price[name][]') }}">
                                <input type="number" name="price[price][]" class="form-control price-item" value="{{ old('price[price][]') }}">
                                <p class="price-en"><small>円（税込）</small></p>
                            </div>

                            {{-- prices --}}
                            <div class="form-group mt-4">
                                @error('price.name.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('price.price.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                <input type="text" name="price[name][]" class="form-control price-item-name" value="{{ old('price[name][]') }}">
                                <input type="number" name="price[price][]" class="form-control price-item" value="{{ old('price[price][]') }}">
                                <p class="price-en"><small>円（税込）</small></p>
                            </div>

                            {{-- prices --}}
                            <div class="form-group mt-4">
                                @error('price.name.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('price.price.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                <input type="text" name="price[name][]" class="form-control price-item-name" value="{{ old('price[name][]') }}">
                                <input type="number" name="price[price][]" class="form-control price-item" value="{{ old('price[price][]') }}">
                                <p class="price-en"><small>円（税込）</small></p>
                            </div>

                            {{-- prices --}}
                            <div class="form-group mt-4">
                                @error('price.name.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('price.price.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                <input type="text" name="price[name][]" class="form-control price-item-name" value="{{ old('price[name][]') }}">
                                <input type="number" name="price[price][]" class="form-control price-item" value="{{ old('price[price][]') }}">
                                <p class="price-en"><small>円（税込）</small></p>
                            </div>





                            {{-- パーソナル --}}
                            <div class="form-group mt-5">
                                @include('parts/admin/label/shop/personal')
                            </div>

                            <div class="form-group personal-group">
                               {{-- バリデーションエラー --}}
                                @error('personal.course.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('personal.time.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('personal.price.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                {{-- コース名 --}}
                                <input type="text" name="personal[course][]" class="form-control shop-text form-personal-c" placeholder="コース名" value="{{ old('personal[course][]') }}">
                                {{-- 時間 --}}
                                <input type="number" name="personal[time][]" class="form-control shop-text form-personal-t" placeholder="例)50" value="{{ old('personal[time][]') }}">
                                <p class="price-en">分</p>
                                {{-- 金額 --}}
                                <input type="number" name="personal[price][]" class="form-control shop-text form-personal-p" placeholder="例)5500" value="{{ old('personal[price][]') }}">
                                <p class="price-en">円（税込）</p>
                            </div>

                            <div class="form-group personal-group">
                               {{-- バリデーションエラー --}}
                                @error('personal.course.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('personal.time.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('personal.price.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                {{-- コース名 --}}
                                <input type="text" name="personal[course][]" class="form-control shop-text form-personal-c" placeholder="コース名" value="{{ old('personal[course][]') }}">
                                {{-- 時間 --}}
                                <input type="number" name="personal[time][]" class="form-control shop-text form-personal-t" placeholder="例)50" value="{{ old('personal[time][]') }}">
                                <p class="price-en">分</p>
                                {{-- 金額 --}}
                                <input type="number" name="personal[price][]" class="form-control shop-text form-personal-p" placeholder="例)5500" value="{{ old('personal[price][]') }}">
                                <p class="price-en">円（税込）</p>
                            </div>

                            <div class="form-group personal-group">
                               {{-- バリデーションエラー --}}
                                @error('personal.course.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('personal.time.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('personal.price.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                {{-- コース名 --}}
                                <input type="text" name="personal[course][]" class="form-control shop-text form-personal-c" placeholder="コース名" value="{{ old('personal[course][]') }}">
                                {{-- 時間 --}}
                                <input type="number" name="personal[time][]" class="form-control shop-text form-personal-t" placeholder="例)50" value="{{ old('personal[time][]') }}">
                                <p class="price-en">分</p>
                                {{-- 金額 --}}
                                <input type="number" name="personal[price][]" class="form-control shop-text form-personal-p" placeholder="例)5500" value="{{ old('personal[price][]') }}">
                                <p class="price-en">円（税込）</p>
                            </div>

                            <div class="form-group personal-group">
                               {{-- バリデーションエラー --}}
                                @error('personal.course.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('personal.time.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('personal.price.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                {{-- コース名 --}}
                                <input type="text" name="personal[course][]" class="form-control shop-text form-personal-c" placeholder="コース名" value="{{ old('personal[course][]') }}">
                                {{-- 時間 --}}
                                <input type="number" name="personal[time][]" class="form-control shop-text form-personal-t" placeholder="例)50" value="{{ old('personal[time][]') }}">
                                <p class="price-en">分</p>
                                {{-- 金額 --}}
                                <input type="number" name="personal[price][]" class="form-control shop-text form-personal-p" placeholder="例)5500" value="{{ old('personal[price][]') }}">
                                <p class="price-en">円（税込）</p>
                            </div>

                            <div class="form-group personal-group">
                               {{-- バリデーションエラー --}}
                                @error('personal.course.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('personal.time.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                @error('personal.price.*')
                                    <div>
                                        <p class="error price-en">{{ $message }}</p>
                                    </div>
                                @enderror
                                {{-- コース名 --}}
                                <input type="text" name="personal[course][]" class="form-control shop-text form-personal-c" placeholder="コース名" value="{{ old('personal[course][]') }}">
                                {{-- 時間 --}}
                                <input type="number" name="personal[time][]" class="form-control shop-text form-personal-t" placeholder="例)50" value="{{ old('personal[time][]') }}">
                                <p class="price-en">分</p>
                                {{-- 金額 --}}
                                <input type="number" name="personal[price][]" class="form-control shop-text form-personal-p" placeholder="例)5500" value="{{ old('personal[price][]') }}">
                                <p class="price-en">円（税込）</p>
                            </div>




                            {{-- shop --}}
                            <div class="form-group mt-4">
                                {{-- 営業日 --}}
                                @include('parts/admin/label/shop/open')
                                <input type="text" name="open" class="form-control" placeholder="例）平日15:00~21:00　土日祝13:00~17:00" value="{{ old('open') }}">
                            </div>

                            <div class="form-group mt-4">
                                {{-- 定休日 --}}
                                @include('parts/admin/label/shop/close')
                                <input type="text" name="close" class="form-control" placeholder="例）毎月第２水曜日" value="{{ old('close') }}">
                            </div>

                            <div class="form-group mt-4">
                                {{-- ホームページ --}}
                                @include('parts/admin/label/shop/web')
                                <input type="text" name="web" class="form-control" placeholder="例）https://example.com" value="{{ old('web') }}">
                            </div>

                            <div class="form-group mt-4">
                                {{-- 簡単な説明 --}}
                                @include('parts/admin/label/shop/description')
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
                                <div class="btn-group">
                                    <a href="#" class="btn btn-success shop-btn-lg">戻る</a>
                                </div>
                                <div class="btn-group">
                                    <input type="submit" class="btn btn-primary shop-btn-lg" value="登録">
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
