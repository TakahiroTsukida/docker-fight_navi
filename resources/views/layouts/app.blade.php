<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('parts/header')
    </head>
    <body>
        <div id="app">
            <nav>
                <div>
                    @guest
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
                                      <a class="nav-item active" href="#"><i class="fas fa-search fa-lg"></i><span class="menu-label">ジム検索<span><span class="sr-only">(current)</span></a>
                                      <a class="nav-item" href="#"><i class="fas fa-edit fa-lg"></i><span class="menu-label">新規レビュー</span></a>
                                      <a class="nav-item" href="{{ route('login') }}"><i class="fas fa-sign-in-alt fa-lg small"></i><span class="menu-label">ログイン</span></a>
                                      <a class="nav-item disabled" href="{{ route('register') }}"><i class="fas fa-user-plus fa-lg"></i><span class="menu-label">新規登録</span></a>
                                </div>
                            </div>
                        </nav>
                    @else
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
                                      <a class="nav-item-login active" href="{{ route('user.profile.mypage', ['id' => Auth::user()->id]) }}"><i class="fas fa-user fa-lg default"></i><span class="login-label">マイページ</span><span class="sr-only">(current)</span></a>

                                      @if(Auth::user()->profiles)
                                          <a class="nav-item-login" href="{{ route('user.profile.edit',['id' => Auth::user()->id]) }}"><i class="fas fa-user-cog fa-lg"></i><span class="login-label">プロフィール編集</span><span class="sr-only">(current)</span></a>
                                      @else
                                          <a class="nav-item-login" href="{{ route('user.profile.add',['id' => Auth::user()->id]) }}"><i class="fas fa-user-cog fa-lg"></i><span class="login-label">プロフィール作成</span><span class="sr-only">(current)</span></a>
                                      @endif

                                      <a class="nav-item-login" href="{{ route('user.search') }}"><i class="fas fa-search fa-lg default"></i><span class="login-label">ジム検索</span><span class="sr-only">(current)</span></a>

                                      <a class="nav-item-login" href="{{ route('user.search') }}"><i class="fas fa-edit fa-lg default"></i><span class="login-label">新規レビュー</span></a>
                                      <a class="nav-item-login" href="#"><i class="fas fa-envelope fa-lg default"></i><span class="login-label">メールアドレス変更</span></a>
                                      <a class="nav-item-login disabled" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                             <i class="fas fa-sign-out-alt fa-lg default"></i><span class="login-label">ログアウト</span></a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                      </form>
                                </div>
                            </div>
                        </nav>




                        <!-- <div id="nav-drawer">
                            <input id="nav-input" type="checkbox" class="nav-unshown">
                            <label id="nav-open" for="nav-input">
                                <span></span>
                            </label>
                            <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                            <div id="nav-content">
                                <div>
                                    <ul class="list-group">
                                        <a href="{{ route('user.profile.mypage', ['id' => Auth::user()->id]) }}" class="main-menu">
                                            <li class="list-group-item-light py-5 pl-3 border">
                                                <p class="menu-logo"><img src="{{ asset('image/macOS-Guest-user-logo-icon.jpg') }}" alt="アイコン" width="60" class="rounded-circle"></p>
                                                <label class="ml-2 menu-label">{{ Auth::user()->name }}</label>
                                            </li>
                                        </a>

                                        @if(Auth::user()->profiles)
                                        <a href="{{ route('user.profile.edit',['id' => Auth::user()->id]) }}" class="main-menu">
                                            <li class="list-group-item-light py-3 pl-3 border">
                                                <i class="fas fa-cog fa-2x align-middle"></i>
                                                <label class="ml-2 mt-1 align-middle ">プロフィール編集</label>
                                            </li>
                                        </a>
                                        @else
                                        <a href="{{ route('user.profile.add',['id' => Auth::user()->id]) }}" class="main-menu">
                                            <li class="list-group-item-light py-3 pl-3 border">
                                                <i class="fas fa-cog fa-2x align-middle"></i>
                                                <label class="ml-2 mt-1 align-middle ">プロフィール作成</label>
                                            </li>
                                        </a>
                                        @endif

                                        <a href="#" class="main-menu">
                                            <li class="list-group-item-light py-3 pl-3 border">
                                                <i class="fas fa-envelope fa-2x align-middle"></i>
                                                <label class="ml-2 mt-1 align-middle ">メールアドレス編集</label>
                                            </li>
                                        </a>
                                        <a href="{{ route('user.search') }}" class="main-menu">
                                            <li class="list-group-item-light py-3 pl-3 border">
                                                <i class="fas fa-dumbbell fa-2x align-middle"></i>
                                                <label class="ml-2">ジムを検索する</label>
                                            </li>
                                        </a>
                                        <a href="{{ route('logout') }}" class="main-menu" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <li class="list-group-item-light py-3 pl-3 border">
                                               <i class="fas fa-sign-out-alt fa-2x align-middle"></i>
                                               <label class="ml-2">ログアウト</label>
                                            </li>
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <p class="site-title">
                            <a class="mx-auto mt-3" href="{{ url('/') }}">
                                <img src="{{ asset('image/Fightなび.png') }}" alt="Fightなび">
                            </a>
                        </p> -->
                    @endguest


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
    </body>
</html>
