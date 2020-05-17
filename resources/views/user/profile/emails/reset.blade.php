@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 page-title">
            <!-- フラッシュメッセージ -->
            @if (session('flash_message'))
            <div class="flash_message alert-success text-center py-3 my-2">
                {{ session('flash_message') }}
            </div>
            @endif
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h1>メールアドレス変更</h1>
                </div>

                <div class="card-body text-center mt-4">
                    <label>新しいメールアドレスを入力してください</label>
                    <form action={{ action('User\ChangeEmailController@sendChangeEmailLink') }} method="POST">
                        {{ csrf_field() }}
                        <input type="email" name="new_email" class="form-control mt-4">
                        <input type="submit" class="btn btn-primary ken-submit mt-2">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
