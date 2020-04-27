@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 page-title">
            @if (session('resent'))
                <div class="alert alert-success" role="alert">
                    認証メールを再送信いたしました
                </div>
            @endif

            <div class="card">

                <div class="card-body">
                    <h2>メールアドレス認証をお願いいたします</h2>

                    <p>登録メールアドレスに認証メールを送信しました。<br>
                    登録を完了するには認証メールに記載のURLをクリックしてください。<br>
                    認証メールが届かない場合は下記のボタンから再送信をしてください。
                    </p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-primary">再送信</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
