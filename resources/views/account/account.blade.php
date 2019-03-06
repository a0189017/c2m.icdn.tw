@extends('layouts.page')

@section('content')
<div class="member-top">Hi, {{$user->name}}！</div>
<div class="member">
    
    @include('account.partials.menu')

    <div class="right">
        <div class="myaccount box">
            <h3 class="box-title">帳戶資訊</h3>
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
                <form class="form-horizontal" method="POST" action="{{ route('updateAccount') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="form-label" for="name">姓名*</label>
                        <input type="text" id="name" name="name" value="{{$user->name}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="mail">電子信箱*</label>
                        <input type="mail" id="mail" name="email" value="{{$user->email}}" disabled>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="phone">手機</label>
                        <input type="text" id="phone" name="phone" value="{{$user->phone}}">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="address">地址</label>
                        <input class="twaddress" type="text"  id="address" name="address" value="{{$user->address}}">
                    </div>

                    <button class="btn btn-lg btn-theme">儲存修改</button>
                </form>
            </section>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('/js/twaddress.js')}}"></script>
<script>
    $(function() {

        // TODO 若已經有地址帶入
        $(".twaddress").twaddress();
    });
</script>
@endsection