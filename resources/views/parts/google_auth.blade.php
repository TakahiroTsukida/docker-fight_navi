<div class="sns-login">
    <label>SNSでログイン</label>
</div>
<div class="form-group row justify-content-center">
    <div class="col-md-8 col-lg-6 text-center">
        <a href="{{ action('User\Auth\LoginController@redirectToGoogle') }}" class="btn btn-danger btn-lg col g-login" role="button">
            <i class="fab fa-google fa-lg"></i> ログイン
        </a>
    </div>
</div>
