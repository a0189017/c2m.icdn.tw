@extends('layouts.page')

@section('content')
<div class="member-top">Hi, {{$user->name}}！</div>
<div class="member">
    
    @include('account.partials.menu')

    <div class="right">
        <div class="setting box">
            <h3 class="box-title">修改密碼</h3>
            <section class="contact-info">
                @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="form-label" for="oldpass">舊密碼</label>
                        <input id="oldpass" type="password" class="form-control" name="current-password" required>
                        @if ($errors->has('current-password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('current-password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="newpass">新密碼</label>
                        <input id="newpass" type="password" class="form-control" name="new-password" required>
                        @if ($errors->has('new-password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('new-password') }}</strong>
                        </span>
                        @endif
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="confirmpass">確認新密碼</label>
                        <input id="confirmpass" type="password" class="form-control" name="new-password_confirmation" required>
                    </div>
                    <button class="btn btn-lg btn-theme">確認修改</button>
                </form>
            </section>
        </div>
    </div>
</div>
@endsection