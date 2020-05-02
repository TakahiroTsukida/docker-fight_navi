<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('parts/header')
    </head>
    <body>
        <div id="app">
            <nav>
                <div>
                    @if (Auth::guard('user')->check())

                        <nav class="navbar navbar-light">
                            <div class="header">
                                <a class="navbar-brand header-img" href="{{ url('/') }}">
                                    <img src="{{ asset('storage/image/app_images/Fightなび.png') }}" alt="Fightなび">
                                </a>
                                <button class="navbar-toggler menu-icon" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav clear_box">
                                      <a class="nav-item-login active" href="{{ route('user.profile.mypage') }}"><i class="fas fa-user fa-lg default"></i><span class="login-label">マイページ</span><span class="sr-only">(current)</span></a>

                                      <a class="nav-item-login" href="{{ route('user.profile.favorite') }}"><i class="fas fa-bookmark fa-lg"></i><span class="login-label">お気に入り</span><span class="sr-only">(current)</span></a>

                                      <a class="nav-item-login" href="{{ route('user.profile.edit') }}"><i class="fas fa-user-cog fa-lg"></i><span class="login-label">プロフィール編集</span><span class="sr-only">(current)</span></a>

                                      <a class="nav-item-login" href="{{ route('user.search') }}"><i class="fas fa-search fa-lg default"></i><span class="login-label">ジム検索</span><span class="sr-only">(current)</span></a>

                                      <a class="nav-item-login" href="{{ route('user.search') }}"><i class="fas fa-edit fa-lg default"></i><span class="login-label">新規レビュー</span></a>

                                      <a class="nav-item-login" href="{{ route('user.resets.email') }}"><i class="fas fa-envelope fa-lg default"></i><span class="login-label">メールアドレス変更</span></a>

                                      <a class="nav-item-login disabled" href="{{ route('user.logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                             <i class="fas fa-sign-out-alt fa-lg default"></i><span class="login-label">ログアウト</span></a>
                                      <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                      @csrf
                                      </form>
                                </div>
                            </div>
                        </nav>

                    @elseif (Auth::guard('admin')->check())

                        <nav class="navbar navbar-light">
                            <div class="header">
                                <a class="navbar-brand header-img" href="{{ url('/') }}">
                                    <img src="{{ asset('storage/image/app_images/Fightなび.png') }}" alt="Fightなび">
                                </a>
                                <button class="navbar-toggler menu-icon" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav clear_box">
                                      <a class="nav-item-login active" href="{{ route('admin.profile.mypage') }}"><i class="fas fa-user fa-lg default"></i><span class="login-label">管理ユーザーマイページ</span><span class="sr-only">(current)</span></a>

                                      <a class="nav-item-login" href="{{ route('admin.profile.edit') }}"><i class="fas fa-user-cog fa-lg"></i><span class="login-label">プロフィール編集</span><span class="sr-only">(current)</span></a>

                                      <!-- <a class="nav-item-login" href="#"><i class="fas fa-envelope fa-lg default"></i><span class="login-label">メールアドレス変更</span></a> -->

                                      <a class="nav-item-login" href="{{ route('user.search') }}"><i class="fas fa-search fa-lg default"></i><span class="login-label">ジム検索</span><span class="sr-only">(current)</span></a>

                                      <a class="nav-item-login" href="{{ route('admin.shop.add') }}"><i class="fas fa-edit fa-lg default"></i><span class="login-label">新規ジム・道場登録</span></a>

                                      <a class="nav-item-login disabled" href="{{ route('admin.logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                             <i class="fas fa-sign-out-alt fa-lg default"></i><span class="login-label">ログアウト</span></a>
                                     <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                     @csrf
                                     </form>
                                </div>
                            </div>
                        </nav>

                    @else

                        <nav class="navbar navbar-expand-lg navbar-light">
                            <div class="header">
                                <a class="navbar-brand header-img" href="{{ url('/') }}">
                                    <img src="{{ asset('storage/image/app_images/Fightなび.png') }}" alt="Fightなび">
                                </a>
                                <button class="navbar-toggler menu-icon" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>
                            </div>
                            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                                <div class="navbar-nav clear_box">
                                      <a class="nav-item active" href="{{ route('user.search') }}"><i class="fas fa-search fa-lg"></i><span class="menu-label">ジム検索<span><span class="sr-only">(current)</span></a>
                                      <a class="nav-item" href="{{ route('user.search') }}"><i class="fas fa-edit fa-lg"></i><span class="menu-label">新規レビュー</span></a>
                                      <a class="nav-item" href="{{ route('user.login') }}"><i class="fas fa-sign-in-alt fa-lg small"></i><span class="menu-label">ログイン</span></a>
                                      <a class="nav-item disabled" href="{{ route('user.register') }}"><i class="fas fa-user-plus fa-lg"></i><span class="menu-label">新規登録</span></a>
                                </div>
                            </div>
                        </nav>

                    @endif


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        </ul>
                        <ul class="navbar-nav ml-auto">
                        </ul>
                    </div>
                </div>
            </nav>

                <main>
                    @yield('content')
                </main>
        </div>
        <footer>
            <div class="">

                <!-- <div class="footer_imgtext">
                    <img src="{{ asset('storage/image/app_images/publicdomainq-0008765xetjvc.jpg') }}" class="header-img">
                    <p>みんなのオススメジムがみつかる</p>
                </div> -->

            </div>

        </footer>

    </body>
</html>
