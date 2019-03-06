@extends('layouts.page')

@section('content')
<div class="login">
    <div class="left" style="background-image: url(../img/loginbg.png)">
        <div class="left-inner">
            <h4><i class="material-icons">&#xE3D0;</i>一件可做</h4>
            <p>沒有限制最低量，打造你專屬的紀念</p>
            <h4><i class="material-icons">&#xE3AE;</i>線上即時設計</h4>
            <p>線上客製化平台，馬上設計馬上送印</p>
            <h4><i class="material-icons">&#xE558;</i>下單宅配到府</h4>
            <p>貼心特色禮物，一鍵下訂宅配到府</p>
        </div>
    </div>
    <div class="right">
        <h3 class="block-title">註冊</h3>
        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <input type="text" name="name" autofocus="autofocus" placeholder="姓名" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input type="email" name="email" placeholder="電子信箱" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="密碼，至少8位英文數字組合" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" placeholder="確認密碼" required>
            </div>

            <button type="submit" class="btn btn-lg btn-theme btn-block">註冊</button>
        </form>
        <div class="links-area text-center">
            <span>註冊即表示同意 C2M <a target="_blank" class="link-text" href="{{route('terms')}}">使用條款</a></span>
            <hr>
            <span>已有帳號？</span> <a href="{{route('login')}}" class="link-text">登入</a>
        </div>
    </div>
</div>
@endsection
