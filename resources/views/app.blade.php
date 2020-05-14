<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta  name="viewport" content="width=device-width">
    <title>@yield('title')</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('/css/blog.css') }}">
        {{--app.js を読み込めば jQuery や bootstrap.js が読み込まれる--}}
    <script src="{{ asset('js/app.js') }}"></script>
    {{--API を叩くための準備として CSRF 用トークンを設定しておく--}}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{--各ページで <head> タグ内に追加できるようにしておく--}}
    @yield('head')

</head>

<body>
    
     <div class="col-md-10 text-right">
             @if(Auth::check())
                <a href="/login">info</a>
             @else
                <a href="/login">login</a>
            @endif
                
</div>
    
                @yield('body')
                

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- BootstrapのJS読み込み -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>