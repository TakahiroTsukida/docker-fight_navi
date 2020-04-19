@extends('layouts.admin')
@section('title', '登録済みジム・道場編集')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12">
                <h2 class="page-title">登録済みジム・道場編集</h2>
                <div class="card">
                    <div class="body">

                        <form action="{{ route('admin.shop.update') }}" method="post" enctype="multipart/form-data">


                            {{-- name --}}
                            <div class="form-group mt-4">
                                @include('parts/admin/label/shop/name')

                                @error('shop_name')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                                <input type="text" name="shop_name" class="form-control" placeholder="例）Example GYM" value="{{ $shop->name }}">
                            </div>


                            {{-- type --}}
                            <div class="form-group mt-4">
                                @include('parts/admin/label/shop/type')
                                @error('type')
                                    <p class="error">{{ $message }}</p>
                                @enderror

                                <div class="checkbox">
                                   <label>
                                       <input type="checkbox" name="type[]" value="1" {{ in_array(1, $types) ? 'checked="checked"' : '' }}>
                                       ボクシング
                                   </label>
                                </div>
                                <div class="checkbox">
                                   <label>
                                       <input type="checkbox" name="type[]" value="2" {{ in_array(2, $types) ? 'checked="checked"' : '' }}>
                                       キックボクシング
                                   </label>
                                </div>
                                <div class="checkbox">
                                   <label>
                                       <input type="checkbox" name="type[]" value="3" {{ in_array(3, $types) ? 'checked="checked"' : '' }}>
                                       総合格闘技
                                   </label>
                                </div>
                                <div class="checkbox">
                                   <label>
                                       <input type="checkbox" name="type[]" value="4" {{ in_array(1, $types) ? 'checked="checked"' : '' }}>
                                       パーソナルトレーニング
                                   </label>
                                </div>
                            </div>


                            {{-- tel --}}
                            <div class="form-group mt-4">
                                @include('parts/admin/label/shop/tel')
                                @error('tel')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                                <input type="text" name="tel" maxlength="11" class="form-control form-tel" placeholder="例) 0312345678" value="{{ $shop->tel }}">
                            </div>


                            {{-- address --}}
                            <div class="form-group mt-4">
                                @include('parts/admin/label/shop/address')
                            </div>

                            <div class="form-address">
                                @include('parts/admin/label/shop/address_number')
                                @error('address_number')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                                <input type="tel" name="address_number" maxlength="7" class="form-control form-number" placeholder="例）1030013" value="{{ $shop->address_number }}">
                            </div>

                            <div class="form-address">
                                @include('parts/admin/label/shop/address_ken')
                                @error('address_ken')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                                  <select name="address_ken" class="form-control form-ken">
                                    <option value="{{ $shop->address_ken }}" selected>{{ $shop->address_ken }}</option>
                                    @include('parts/address_ken')
                                  </select>
                            </div>

                            <div class="form-group">
                                @include('parts/admin/label/shop/address_city')
                                @error('address_city')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                                <input type="text" name="address_city" class="form-control" value="{{ $shop->address_city }}">
                            </div>



                            {{-- price --}}
                            @foreach ($shop->prices as $price)
                                @if ($price->name == "入会金")
                                    <div class="form-group mt-4">
                                        <label class="shop-text">
                                            <input type="hidden" name="price[name][]" value="入会金">
                                            入会金
                                        </label>
                                        <input type="number" name="price[price][]" class="form-control price-item form-join" placeholder="半角数字" value="{{ $price->price }}">
                                        <p class="price-en">円（税込）</p>
                                        @error('price[price].*')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach

                            <div class="form-group mt-4">
                                @include('parts/admin/label/shop/price')
                            </div>

                            @foreach ($shop->prices as $price)
                                @if ($price->name != "入会金")
                                    <div class="form-group mt-4">
                                        <input type="text" name="price[name][]" class="form-control center price-item-name" value="{{ $price->name }}">
                                        <input type="number" name="price[price][]" class="form-control price-item" placeholder="半角数字" value="{{ $price->price }}">
                                        <p class="price-en">円（税込）</p>
                                        @error('price[price][]')
                                            <p class="error">{{ $message }}</p>
                                        @enderror
                                    </div>
                                @endif
                            @endforeach

                            <div class="form-group mt-4">
                                <input type="text" name="price[name][]" class="form-control price-item-name" value="{{ old('price[name][]') }}">
                                <input type="number" name="price[price][]" class="form-control price-item" value="{{ old('price[price][]') }}">
                                <p class="price-en"><small>円（税込）</small></p>
                                @error('price[price][]')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mt-4">
                                <input type="text" name="price[name][]" class="form-control price-item-name" value="{{ old('price[name][]') }}">
                                <input type="number" name="price[price][]" class="form-control price-item" value="{{ old('price[price][]') }}">
                                <p class="price-en"><small>円（税込）</small></p>
                                @error('price[price][]')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="form-group mt-4">
                                <input type="text" name="price[name][]" class="form-control price-item-name" value="{{ old('price[name][]') }}">
                                <input type="number" name="price[price][]" class="form-control price-item" value="{{ old('price[price][]') }}">
                                <p class="price-en"><small>円（税込）</small></p>
                                @error('price[price][]')
                                    <p class="error">{{ $message }}</p>
                                @enderror
                            </div>


                            <div class="form-group mt-4">
                                @include('parts/admin/label/shop/personal')
                            </div>

                            @foreach ($shop->personals as $personal)
                                <div class="form-group personal-group">
                                    {{-- コース名 --}}
                                    <input type="text" name="personal[course][]" class="form-control shop-text form-personal-c" placeholder="コース名" value="{{ $personal->course }}">
                                    {{-- 時間 --}}
                                    <input type="number" name="personal[time][]" class="form-control shop-text form-personal-t" placeholder="例)50" value="{{ $personal->time }}">
                                    <p class="price-en">分</p>
                                    {{-- 金額 --}}
                                    <input type="number" name="personal[price][]" class="form-control shop-text form-personal-p" placeholder="例)5500" value="{{ $personal->price }}">
                                    <p class="price-en">円（税込）</p>
                                </div>
                            @endforeach

                            <div class="form-group personal-group">
                                {{-- コース名 --}}
                                <input type="text" name="personal[course][]" class="form-control shop-text form-personal-c" value="{{ old('personal[course][]') }}">
                                {{-- 時間 --}}
                                <input type="number" name="personal[time][]" class="form-control shop-text form-personal-t" value="{{ old('personal[time][]') }}">
                                <p class="price-en">分</p>
                                {{-- 金額 --}}
                                <input type="number" name="personal[price][]" class="form-control shop-text form-personal-p" value="{{ old('personal[price][]') }}">
                                <p class="price-en">円（税込）</p>
                            </div>

                            <div class="form-group personal-group">
                                {{-- コース名 --}}
                                <input type="text" name="personal[course][]" class="form-control shop-text form-personal-c" value="{{ old('personal[course][]') }}">
                                {{-- 時間 --}}
                                <input type="number" name="personal[time][]" class="form-control shop-text form-personal-t" value="{{ old('personal[time][]') }}">
                                <p class="price-en">分</p>
                                {{-- 金額 --}}
                                <input type="number" name="personal[price][]" class="form-control shop-text form-personal-p" value="{{ old('personal[price][]') }}">
                                <p class="price-en">円（税込）</p>
                            </div>



                            <div class="form-group mt-4">
                                @include('parts/admin/label/shop/open')
                                <input type="text" name="open" class="form-control" placeholder="例）平日15:00~21:00　土日祝13:00~17:00" value="{{ $shop->open }}">
                            </div>

                            <div class="form-group mt-4">
                                @include('parts/admin/label/shop/close')
                                <input type="text" name="close" class="form-control shop-text" placeholder="例）毎月第２水曜日" value="{{ $shop->close }}">
                            </div>

                            <div class="form-group mt-4">
                                @include('parts/admin/label/shop/web')
                                <input type="text" name="web" class="form-control" placeholder="例）https://example.com" value="{{ $shop->web }}">
                            </div>

                            <div class="form-group mt-4">
                                @include('parts/admin/label/shop/description')
                                <textarea name="description" class="form-control shop-text" rows="10" placeholder="ご自由にお書きください">{{ $shop->description }}</textarea>
                            </div>

                            <div class="input-group">
                                <label class="input-group-btn">
                                    <span class="btn btn-success">
                                        画像アップロード<input type="file" name="image" style="display:none">
                                    </span>
                                </label>
                                <input type="text" class="form-control" readonly="">
                            </div>

                            <input type="hidden" name="id" value="{{ $shop->id }}">

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
