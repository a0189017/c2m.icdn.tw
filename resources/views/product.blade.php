@extends('layouts.page')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.0/css/swiper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.0/js/swiper.min.js"></script>
<script src="../js/pd.js"></script>
<div class="pd">
    <div class="pd-preview-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                @foreach($item_image as $k=>$v)
                <div class="swiper-slide" data-imgurl="{{$v->meta_value}}" style="background-image: url({{$v->meta_value}});"></div>
                @endforeach
            </div>
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="pd-intro">
        <h1 class="pd-name">{{$item->item_name}}</h1>
        <div class="pd-price">NT$ {{$item->amount}}</div>
        <a href="/design/1" class="btn btn-block btn-theme design-btn-top">開始設計</a>
        <div class="pd-desc">
            {{$item_desc->meta_value}}<br>
            <hr>
            {{$item_desc_2->meta_value}}
        </div>
        <a href="{{route('design', $item->item_id)}}" class="btn btn-theme design-btn-bottom">開始設計</a>
    </div>
</div>
@endsection