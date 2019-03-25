@extends('layouts.page')

@section('content')
<div class="index">
    @php
        $theme_list = array(
            array(
                'theme_name' => 'Running',
                'theme_name_ch' => '跑步',
                'img_name' => 'theme1.jpg',
                'pd_num' => '3'
            )
        );
    @endphp
    <ul class="theme-list">
        <li class="welcome-block">
            <div class="welcome-inner">
                <div class="welcome-info">
                    <h2>立即挑選你想製作的商品吧！</h2>
                </div>
            </div>

        </li>
        <li class="pr-block">
            <a href="" title="" style="background-image: url(../img/banner.jpg);"></a>
        </li>
        @foreach ($theme_list as $k => $v)
        <li>
            <a href="{{route('products')}}" title="{{$v['theme_name']}}" style="background-image: url(../img/{{$v['img_name']}});">
                <div class="theme-info">
                    <h3 class="theme-name">{{$v['theme_name']}}</h3>
                    <div class="theme-detail"><b>{{$v['theme_name_ch']}}</b>{{$v['pd_num']}}件商品</div>
                </div>
            </a>
        </li>
        @endforeach
    </ul>
</div>
@endsection
