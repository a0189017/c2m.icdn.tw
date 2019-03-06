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
        <h3 class="block-title">忘記密碼</h3>
        <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <input id="email" placeholder="電子信箱" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <button type="submit" class="btn btn-lg btn-theme btn-block">發送密碼重置信</button>
        </form>
        <div class="links-area text-center">
            <hr>
            <span>已有帳號？</span> <a href="{{route('login')}}" class="link-text">登入</a><br>
            <span>還沒有帳號？</span> <a href="{{route('register')}}" class="link-text">註冊</a>
        </div>
    </div>
</div>
@endsection
