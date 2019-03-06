<!DOCTYPE html>
<html lang="zh-tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, user-scalable=1, minimum-scale=1, maximum-scale=1">
    <title>C2M｜客製化平台，線上即時設計訂作</title>
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <!-- <link rel="icon" href="/img/favicon.ico" type="image/x-icon"> -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
</head>
<body>
    <header class="header">
        <h1 class="logo">
            <img src="{{asset('img/c2m_logo.svg')}}" alt="C2M" title="C2M">C2M
        </h1>
        <a href="/" class="index-btn"><i class="material-icons">&#xE88A;</i></a>
        <div class="logged">
            <a href="/account" class="account-btn"><i class="material-icons">&#xE7FD;</i></a>
        </div>
        <!-- <div class="login-in">
            <a href="{{route('login')}}" class="login-btn">登入</a>
            <a href="{{route('register')}}" class="signup-btn">註冊</a>
        </div> -->

    </header>
    <div class="wrap">
        @yield('content')
    </div>

    @if (!Request::is('design/*'))
    @include('partials.footer');
    @yield('footer')
    @endif

    @yield('js')
    <script>
        @if (session('error'))
            alert('{{ session('error') }}');
        @endif
        @if (session('success'))
            alert('{{ session('success') }}')
        @endif
    </script>
</body>
</html>