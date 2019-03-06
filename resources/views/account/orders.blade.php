@extends('layouts.page')

@section('content')
<div class="member-top">Hi, {{$user->name}}！</div>
<div class="member">
    
    @include('account.partials.menu')

    <div class="right">
        <div class="myorder">
            {{--  <ul class="tab">
                <li class="is-acted">進行中</li>
                <li>已完成</li>
            </ul>  --}}
            <div class="box">
                <h3 class="box-title">我的訂單</h3>
                <ul class="order-list">
                    @if(!empty($orders))
                    @foreach($orders as $order)
                        
                        @php
                        // $design = App\Design::with('metas')->where('design_id', $order->design->design_id)->get();
                        foreach($order->design_metas as $_meta) {
                            $design_meta[$_meta->meta_key] = $_meta->meta_value;
                        }
                        foreach($order->metas as $_meta) {
                            $order_meta[$_meta->meta_key] = $_meta->meta_value;
                        }
                        
                        @endphp
                    <li>
                        <a href="{{route('order', $order->order_id)}}" class="order-link">
                            <div class="img">
                                <img src="{{$design_meta['pos1']}}" alt="{{$order->item->order_item_name}}">
                            </div>
                            <div class="info">
                                <div class="info-detail">
                                    <h4 class="title">{{$order->item->order_item_name}}</h4>
                                    <div class="date">訂購日期：{{$order->created_at}}</div>
                                </div>
                                <div class="price">${{($order_meta['order_amount']+$order_meta['shipping_fee'])}}</div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection