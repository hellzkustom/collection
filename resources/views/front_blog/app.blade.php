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

    @yield('head')
</head>

<body>
    <div class="container">
        <div class="row" name="main">
            <div class="col-md-10 col-md-offset-1">
                <h2><a href="{{ route('front_index') }}">私のブログ</a></h2>
             {{--何らかのエラー表示用--}}
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>

            {{--メインカラム--}}
            @yield('main')
        
    
            {{--右サブカラム--}}
            {{--@include ディレクティブで他のテンプレートを読み込むこともできる--}}
          @include('front_blog.right_column')
    
        </div>
    </div>    
    

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <!-- BootstrapのJS読み込み -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>