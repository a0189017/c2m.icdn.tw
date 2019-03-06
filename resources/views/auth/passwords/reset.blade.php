@extends('layouts.page')

@section('content')
<div class="setting box">
    <h3 class="box-title">修改密碼</h3>
    <section class="contact-info">
        <form class="form-horizontal" method="POST" action="{{ route('password.request') }}">
            {{ csrf_field() }}

            <input type="hidden" name="token" value="{{ $token }}">
            <div class="form-group">
                <input id="email" placeholder="電子信箱" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label" for="newpass">新密碼</label>
                <input type="password" id="newpass" name="password" required>
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group">
                <label class="form-label" for="confirmpass">確認新密碼</label>
                <input type="password" id="confirmpass" name="password_confirmation" required>
                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>
            <button class="btn btn-lg btn-theme">確認修改</button>
        </form>
    </section>
</div>

@endsection
