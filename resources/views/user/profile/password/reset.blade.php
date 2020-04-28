<h3>
    <a href="{{ config('app.url') }}">fightなび</a>
</h3>
<p>
    {{ __('下記のURLをクリックして新しいパスワードを入力してください。') }}<br>
    {{ __('このメールに心当たりがない場合はこのまま削除してください。') }}
</p>
<p>
    {{ $actionText }}: <a href="{{ $actionUrl }}">{{ $actionUrl }}</a>
</p>
