@extends('layouts.page')

@section('content')
<div class="member-top">Hi, {{$user->name}}！</div>
<div class="member">
    
    @include('account.partials.menu')

    <div class="right">
        <div class="checkout myodetail box">
            <h3 class="box-title">訂單編號 {{$order->order_id}}</h3>
            @php
            foreach($order->design_metas as $_meta) {
                $design_meta[$_meta->meta_key] = $_meta->meta_value;
            }
            foreach($order->metas as $_meta) {
                $order_meta[$_meta->meta_key] = $_meta->meta_value;
            }
            @endphp
            <div class="ordered-list">
                <div class="img">
                    <img src="{{$design_meta['pos1']}}" alt="{{$order->item->order_item_name}}">
                    <img src="{{$design_meta['pos2']}}" alt="{{$order->item->order_item_name}}">
                </div>
                <section class="info">
                    <h2 class="block-title">訂單明細</h2>
                    <div class="ordered-pd">
                        <div class="pd-detail">
                            <h2 class="pd-title">{{$order->item->order_item_name}}</h2>
                        </div>
                        <div class="price">
                            $ {{$order_meta['order_amount']}}
                        </div>
                    </div>
                    <div class="ordered-price">
                        <div class="price">
                            <div>小計</div>
                            <div>$ {{$order_meta['order_amount']}}</div>
                        </div>
                        <div class="price">
                            <div>運費 - 宅配</div>
                            <div>$ {{$order_meta['shipping_fee']}}</div>
                        </div>
                    </div>
                    <div class="ordered-price">
                        <div class="price">
                            <div>總計</div>
                            <div>$ {{($order_meta['order_amount']+$order_meta['shipping_fee'])}}</div>
                        </div>
                    </div>
                </section>
                <section class="contact-info">
                    <h2 class="block-title">聯絡人資訊</h2>
                    <p class="paragraph">
                        姓名：{{$order_meta['contact_name']}}<br>
                        手機：{{$order_meta['contact_phone']}}<br>
                        電子信箱：{{$order_meta['contact_email']}}<br>
                        地址：{{$order_meta['contact_address']}}
                    </p>
                </section>
                <section class="recipient-info">
                    <h2 class="block-title">收貨人資訊</h2>
                    <p class="paragraph">
                        姓名：{{$order_meta['recipient_name']}}<br>
                        手機：{{$order_meta['recipient_phone']}}<br>
                        地址：{{$order_meta['recipient_address']}}
                    </p>
                </section>
                <section class="pay-info">
                    <h2 class="block-title">付款方式</h2>
                    <p class="paragraph label-radio">
                        {{__('site.payment_method_'.$order->payment->payment_method)}}
                    </p>
                </section>
                <section class="receipt-info">
                    <h2 class="block-title">發票方式</h2>
                    <p class="paragraph">
                        {{__('site.invoice_'.$order->payment->payment_invoice)}}
                    </p>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection