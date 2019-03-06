{{-- resources/views/admin/dashboard.blade.php --}}

@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Orders</h1>
@stop

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">列表</h3>
                <div class="box-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        
                    </div>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
                <table id="sys-users-table" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>orderId</th>
                            <th>商品</th>
                            <th>收件人</th>
                            <th>收件人地址</th>
                            <th>金額</th>
                            <th>狀態</th>
                            <th>建立時間</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                        @php
                            $meta = [];
                            {{-- dd($order->metas); --}}
                            foreach($order->metas as $_meta) {
                                $meta[$_meta->meta_key] = $_meta->meta_value;
                            }
                        @endphp
                        <tr>
                            <td>{{$order->order_id}}</td>
                            <td>
                                {{$order->items[0]->order_item_name}}
                            </td>
                            <td>
                                {{$meta['recipient_name']}}
                            </td>
                            <td>
                                {{$meta['recipient_address']}}
                            </td>
                            <td>
                                {{($meta['order_amount'] + $meta['shipping_fee'])}}
                            </td>
                            <td>
                                {{__('site.'.$meta['order_status'])}}
                            </td>
                            <td>
                                {{$order->created_at}}
                            </td>
                            <td>
                                <a href="{{route('admin.orderShow', ['order_id'=>$order->order_id])}}"  alt="edit" title="edit"><i class="fa fa-edit"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $orders->links() }}
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
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