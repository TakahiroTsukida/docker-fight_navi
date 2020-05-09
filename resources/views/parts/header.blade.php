<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">
<!--twitterカード-->
<meta name="twitter:card" content="summary" /> <!--①-->
<meta name="twitter:site" content="@TakahiroTsukida" /> <!--②-->
<meta property="og:url" content="https://fightgymnavi.com/" /> <!--③-->
<meta property="og:title" content="fightなび" /> <!--④-->
<meta property="og:description" content="全国の格闘技ジムをレビューで評価をしあって、あなたにあったジムを見つけよう！" /> <!--⑤-->
<meta property="og:image" content="" /> <!--⑥-->
<title>@yield('title')</title>
<script src="{{ asset('js/app.js') }}" defer></script>
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
