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
            ),
            array(
                'theme_name' => 'Hiking',
                'theme_name_ch' => '健行',
                'img_name' => 'theme2.jpg',
                'pd_num' => '5'
            ),
            array(
                'theme_name' => 'Fitness',
                'theme_name_ch' => '健身',
                'img_name' => 'theme3.jpg',
                'pd_num' => '2'
            ),
            array(
                'theme_name' => 'Marathon',
                'theme_name_ch' => '馬拉松',
                'img_name' => 'theme4.jpg',
                'pd_num' => '6'
            ),
            array(
                'theme_name' => 'Cycling',
                'theme_name_ch' => '自行車',
                'img_name' => 'theme5.jpg',
                'pd_num' => '2'
            ),
            // array(
            //     'theme_name' => 'Life',
            //     'theme_name_ch' => '質感生活',
            //     'img_name' => 'theme6.jpg',
            //     'pd_num' => '8'
            // ),
            array(
                'theme_name' => 'Outdoor',
                'theme_name_ch' => '戶外生活',
                'img_name' => 'theme7.jpg',
                'pd_num' => '2'
            ),
            array(
                'theme_name' => 'Basketball',
                'theme_name_ch' => '籃球',
                'img_name' => 'theme8.jpg',
                'pd_num' => '1'
            ),
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
