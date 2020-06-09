<div class="footer-menu">
   <ul class="footer-list">
      <li class="footer-item"><a href="{{ url('/') }}">fightなびトップページ</a></li>
      <!-- <li class="footer-item"><a href="{{ action('User\UserController@privacy') }}" class="footer-link">プライバシーポリシー</a></li>
      <li class="footer-item"><a href="{{ action('User\UserController@description') }}">ジム・道場運営者の方々へ</a></li> -->
      @if (Auth::guard('user')->check())
          <!-- <li class="footer-item"><a href="{{ route('user.delete') }}">退会はこちらから</a></li> -->
      @elseif(Auth::guard('admin')->check())
          <!-- <li class="footer-item"><a href="{{ route('admin.delete') }}">退会はこちらから</a></li> -->
      @else
          <li class="footer-item"><a href="{{ route('admin.login') }}" class="footer-link">管理ユーザーログイン</a></li>
      @endif
   </ul>
</div>
