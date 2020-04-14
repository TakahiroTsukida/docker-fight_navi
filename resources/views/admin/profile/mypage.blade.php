@extends('layouts.admin')
@section('title', 'マイページ')
@section('content')
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-sm-12 mx-auto">
              <div class="card">
                  <div class="card-body">
                      <div class="body">

                          <div class="ml-2 my-2">
                              <h2>登録情報</h2>
                              <h3 class="my-2">個人情報</h3>
                          </div>

                          <div class="ml-2 my-2">
                              <label>名前</label>
                              <p class="ml-2">{{ $admin->name }}</p>
                          </div>
                          <div class="ml-2 my-2">
                              <label>性別</label>
                              <p class="ml-2">{{ $admin->gender }}</p>
                          </div>
                          <div class="ml-2 my-2">
                              <label>誕生日</label>
                              <p class="ml-2">{{ $admin->birthday }}</p>
                          </div>
                          <div class="ml-2 my-2">
                              <label>メールアドレス</label>
                              <p class="ml-2">{{ $admin->email }}</p>
                          </div>


                          <div class="ml-2 mt-4">
                              <h3>会社情報</h3>
                          </div>

                          <div class="ml-2 my-2">
                              <label>会社名</label>
                              <p class="ml-2">{{ $admin->company_name }}</p>
                          </div>

                          @if (isset($admin->tel))
                              <div class="ml-2 my-2">
                                  <label>電話番号</label>
                                  <p class="ml-2">{{ $admin->tel }}</p>
                              </div>
                          @endif

                          <div class="ml-2 my-2">
                              <label>住所</label>
                              <p class="ml-2">〒{{ $admin->address_number }}</p>
                              <p class="ml-2">{{ $admin->address_ken }}{{ $admin->address_city }}</p>
                          </div>

                          @if (isset($admin->tel))
                              <div class="ml-2 my-2">
                                  <label>ホームページ</label>
                                  <a class="ml-2 d-block" href="{{ $admin->web }}">{{ $admin->web }}</p>
                              </div>
                          @endif
                      </div>
                  </div>
              </div>
          </div>
      </div>

  </div>
@endsection
