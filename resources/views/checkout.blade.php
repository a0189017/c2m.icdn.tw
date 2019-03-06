@extends('layouts.page')

@section('content')
<div class="checkout">
    <div class="box">
        <h1 class="box-title">結帳 - 訂單商品</h1>
        <div class="ordered-list">
            <div class="img">
                <img src="{{$design['pos1']}}" alt="{{$item->item_name}}">
                <img src="{{$design['pos2']}}" alt="{{$item->item_name}}">
            </div>
            <form class="form-horizontal" method="POST" action="{{ route('placeOrder') }}">
                {{ csrf_field() }}
                <section class="info">
                    <h2 class="block-title">訂單明細</h2>
                    <div class="ordered-pd">
                        <div class="pd-detail">
                            <h2 class="pd-title">{{$item->item_name}}</h2>
                        </div>
                        <div class="price">
                            $ {{$item->amount}}
                        </div>
                    </div>
                    <div class="ordered-price">
                        <div class="price">
                            <div>小計</div>
                            <div>$ {{$item->amount*$quantity}}</div>
                        </div>
                        <div class="price">
                            <div>運費 - 宅配</div>
                            <div>$ {{$shipping['fee']}}</div>
                        </div>
                    </div>
                    <div class="ordered-price">
                        <div class="price">
                            <div>總計</div>
                            <div>$ {{ $item->amount*$quantity + $shipping['fee'] }}</div>
                        </div>
                    </div>
                </section>
                <section class="contact-info">
                    <h2 class="block-title">聯絡人資訊</h2>
                    <div class="form-group">
                        <label class="form-label" for="contact_name">姓名</label>
                        <input type="text" id="contact_name" name="contact_name">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="contact_mobile">手機</label>
                        <input type="text" id="contact_mobile" name="contact_phone">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="contact_email">電子信箱</label>
                        <input type="text" id="contact_email" name="contact_email">
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="contact_add">地址</label>
                        <input class="twaddress" type="text" id="contact_add" name="contact_address">
                    </div>
                </section>
                <section class="recipient-info">
                    <h2 class="block-title">收貨人資訊</h2>
                    <div class="form-group">
                        <label class="label-checkbox">
                            <input type="checkbox" class="checkbox" id="receiver_ease" name="receiver_ease" value="1">
                            同聯絡人資料
                        </label>
                    </div>
                    <div id="receiver_data">
                        <div class="form-group">
                            <label class="form-label" for="recipient_name">姓名</label>
                            <input type="text" id="receiver_name" name="recipient_name">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="receiver_mobile">手機</label>
                            <input type="text" id="receiver_mobile" name="recipient_phone">
                        </div>
                        <div class="form-group">
                            <label class="form-label" for="receiver_add">地址</label>
                            <input class="twaddress" type="text" id="receiver_add" name="recipient_address">
                        </div>
                    </div>
                </section>
                <section class="pay-info">
                    <h2 class="block-title">付款方式</h2>
                    <div class="form-group">
                        <label class="label-radio">
                            <input type="radio" class="radio" name="payway" value="creditcard">
                            信用卡
                            <img src="../img/payway/mastercard.png" alt="MasterCard">
                            <img src="../img/payway/visa.png" alt="VISA">
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="label-radio">
                            <input type="radio" class="radio" name="payway" value="atm">
                            ATM轉帳
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="label-radio">
                            <input type="radio" class="radio" name="payway" value="cvpay">
                            超商繳費
                            <img src="../img/paystore/seven.jpg" alt="7-11">
                            <img src="../img/paystore/family.jpg" alt="全家">
                            <img src="../img/paystore/hilife.jpg" alt="萊爾富">
                            <img src="../img/paystore/ok.jpg" alt="OK便利商店">
                        </label>
                    </div>
                </section>
                <section class="receipt-info">
                    <h2 class="block-title">發票方式</h2>
                    <div class="form-group">
                        <label class="label-radio">
                            <input type="radio" class="radio" name="invoice" value="donate">
                            捐贈發票
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="label-radio">
                            <input type="radio" class="radio" name="invoice" value="invoice3">
                            公司戶索取電子發票證明聯
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="label-radio">
                            <input type="radio" class="radio" name="invoice" value="invoice2">
                            索取電子發票紙本
                        </label>
                    </div>
                    <div class="form-group">
                        <label class="label-radio">
                            <input type="radio" class="radio" name="invoice" value="einvoice">
                            電子發票
                        </label>
                    </div>
                </section>
                <section class="accept-info">
                    <h2 class="block-title">購買須知</h2>
                    <div class="agreement">
                        字數限制: 中文5字，或英文9個「大寫」字母。
                        衣服背後「WHAT DO YOU RUN FOR? 」為衣服本身原有字樣，非客製內容。
                        完成結帳後，不得修改其客製內容，廠商也不另行確認客製內容。
                        由於客製版工序繁雜，完成結帳後，需要10個工作日。
                        由於每台電腦/手機螢幕顯色各異，與實際印製出來的成品或有些差異，我們會盡力確保顏色的一致性。但如果一定要跟您的電腦/手機螢幕完全同色，請勿下單。
                        客製訂製款, 無質量問題一概不退不換，因為我們是根據您的要求，單一打造的唯一產品，台灣消保法也有明定，故不得退回，介意者請慎購！
                    </div>
                </section>
                <button class="btn btn-lg btn-theme btn-block">付款</button>
            </form>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="{{asset('/js/twaddress.js')}}"></script>
<script src="{{asset('/js/checkout.js')}}"></script>
@endsection