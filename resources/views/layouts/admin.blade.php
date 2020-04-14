<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        @include('parts/header')
    </head>
    <body>
        <div id="app">
            <nav class="navbar navbar-light navbar-laravel">
                <div class="container">

                    @guest
                        <div class="mx-2">
                            <p class="site-title">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('image/Fightなび.png') }}" alt="Fightなび">
                                </a>
                            </p>
                        </div>
                        <div class="nav justify-content-end mx-2">
                            <a href="{{ route('admin.login') }}" class="btn btn-default rounded-pill mx-2 header-btn">管理ユーザーログイン</a>
                            <a href="{{ route('admin.show.register') }}" class="btn btn-primary rounded-pill header-btn">管理ユーザー新規登録</a>
                        </div>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                            </ul>
                            <ul class="navbar-nav ml-auto">
                            </ul>
                        </div>
                    @else
                        <div id="nav-drawer">
                            <input id="nav-input" type="checkbox" class="nav-unshown">
                            <label id="nav-open" for="nav-input">
                                <span></span>
                            </label>
                            <label class="nav-unshown" id="nav-close" for="nav-input"></label>
                            <div id="nav-content">
                                <div>
                                    <ul class="list-group">
                                        <a href="{{ route('admin.profile.mypage') }}" class="main-menu">
                                            <li class="list-group-item-light py-4 pl-3 border">
                                                <label class="ml-2 menu-label">{{ Auth::user()->name }}</label>
                                            </li>
                                        </a>

                                        <a href="{{ route('admin.profile.edit') }}" class="main-menu">
                                            <li class="list-group-item-light py-3 pl-3 border">
                                                <i class="fas fa-cog fa-2x align-middle"></i>
                                                <label class="ml-2 mt-1 align-middle ">プロフィール編集</label>
                                            </li>
                                        </a>
                                        <a href="#" class="main-menu">
                                            <li class="list-group-item-light py-3 pl-3 border">
                                                <i class="fas fa-envelope fa-2x align-middle"></i>
                                                <label class="ml-2 mt-1 align-middle ">メールアドレス編集</label>
                                            </li>
                                        </a>
                                        <a href="{{ route('admin.store.add') }}" class="main-menu">
                                            <li class="list-group-item-light py-3 pl-3 border">
                                                <i class="fas fa-dumbbell fa-2x align-middle"></i>
                                                <label class="ml-2">ジム・道場新規登録</label>
                                            </li>
                                        </a>
                                        <a href="{{ route('admin.logout') }}" class="main-menu" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            <li class="list-group-item-light py-3 pl-3 border">
                                               <i class="fas fa-sign-out-alt fa-2x align-middle"></i>
                                               <label class="ml-2">ログアウト</label>
                                            </li>
                                        </a>
                                        <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                        @csrf
                                        </form>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <p class="site-title">
                            <a class="mx-auto mt-3" href="{{ url('/admin/profile/mypage') }}">
                                <img src="{{ asset('image/Fightなび.png') }}" alt="Fightなび">
                            </a>
                        </p>
                    @endguest


                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                        </ul>
                        <ul class="navbar-nav ml-auto">
                        </ul>
                    </div>
                </div>
            </nav>

                <main class="py-4">
                    @yield('content')
                </main>
        </div>
    </body>
</html>
