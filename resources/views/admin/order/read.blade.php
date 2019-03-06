{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Order#{{$order->order_id}}</h1>
@stop

@section('content')
@php
// echo '<pre>';print_r($order);echo '</pre>';
@endphp
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">訂單資訊</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                @php
                $meta = convert_meta2arr($order->metas);
                // dd($meta);
                @endphp
                訂單狀態: {{__('site.'.$meta['order_status'])}}<br>
                訂單金額: {{$meta['order_amount']}}<br>
                運費金額: {{$meta['shipping_fee']}}<br>
                總額: {{ $meta['order_amount'] + $meta['shipping_fee'] }}
                <hr>
                <form class="form-inline" method="POST" action="{{route('admin.orderUpdateStatus', $order->order_id)}}">
                    {{ csrf_field() }}
                    <label for="order_status">修改訂單狀態: </label>
                    <select id="order_status" name="order_status" class="form-control">
                        <option value="order-pending" {{($meta['order_status']=='order-pending')?'selected="selected"':''}}>等待付款中</option>
                        <option value="order-processing" {{($meta['order_status']=='order-processing')?'selected="selected"':''}}>處理中</option>
                        <option value="order-on-hold" {{($meta['order_status']=='order-on-hold')?'selected="selected"':''}}>保留</option>
                        <option value="order-completed" {{($meta['order_status']=='order-completed')?'selected="selected"':''}}>完成</option>
                        <option value="order-cancelled" {{($meta['order_status']=='order-cancelled')?'selected="selected"':''}}>取消</option>
                        <option value="order-refunded" {{($meta['order_status']=='order-refunded')?'selected="selected"':''}}>已退費</option>
                        <option value="order-failed" {{($meta['order_status']=='order-failed')?'selected="selected"':''}}>失敗</option>
                    </select>
                    <button class="btn btn-primary">送出</button>
                </form>
                <hr>
                @foreach($order->metas as $k=>$v)
                @if($v['meta_key']=='admin_order_status')
                {{__('site.'.$v['meta_value'])}} {{$v['created_at']}} <br>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">商品資訊</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                {{$order->items[0]->order_item_name}}
                <hr>
                @php
                $meta = convert_meta2arr($design->metas);
                // dd($meta);
                @endphp
                
                @foreach($meta as $k=>$v)
                @if(substr($k,0,3)=='pos')
                <img src="{{$v}}" alt="">
                @else
                <p>
                    {{__('site.design_'.$k)}}: {{$v}}
                </p>
                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">聯絡資訊</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                @php
                $meta = convert_meta2arr($order->metas);
                // dd($meta);
                @endphp
                聯絡人姓名: {{$meta['contact_name']}}<br>
                聯絡人電話: {{$meta['contact_phone']}}<br>
                聯絡人電子郵件: {{$meta['contact_email']}}<br>
                聯絡人地址: {{$meta['contact_address']}}<br>
                <hr>
                收件人姓名: {{$meta['recipient_name']}}<br>
                收件人電話: {{$meta['recipient_phone']}}<br>
                收件人地址: {{$meta['recipient_address']}}<br>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">付款資訊</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                付款方式: {{__('site.payment_method_'.$order->payment->payment_method)}}<br>
                發票方式: {{__('site.invoice_'.$order->payment->payment_invoice)}}<br>
            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script>
        $(function(){

        })
    </script>
@stop