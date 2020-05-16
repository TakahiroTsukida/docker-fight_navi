<div class="footer-menu">
   <ul class="footer-list">
      <li class="footer-item"><a href="{{ url('/') }}">fightなびトップページ</a></li>
      <li class="footer-item"><a href="{{ action('User\UserController@privacy') }}" class="footer-link">プライバシーポリシー</a></li>
      <li class="footer-item"><a href="{{ action('User\UserController@description') }}">ジム・道場運営者の方々へ</a></li>
      @if (Auth::guard('user')->check())
      @elseif(Auth::guard('admin')->check())
      @else
      <li class="footer-item"><a href="{{ route('admin.login') }}" class="footer-link">管理ユーザーログイン</a></li>
      @endif
   </ul>
</div>
