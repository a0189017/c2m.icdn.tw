
@extends('layouts.page')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.0/css/swiper.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.1.0/js/swiper.min.js"></script>
<script src="../js/pd.js"></script>
<div class="pd">
    <div class="pd-preview-slider">
        <div class="swiper-container">
            <div class="swiper-wrapper">
                <?php 
                $img=unserialize($item->img);
                foreach($img as $k =>$i ){ ?>
                <div class="swiper-slide" data-imgurl="{{$i}}" style="background-image: url({{$i}});"></div>
                <?php } ?>
            </div>
            <div class="swiper-button-next swiper-button-white"></div>
            <div class="swiper-button-prev swiper-button-white"></div>
            <div class="swiper-pagination"></div>
        </div>
    </div>
    <div class="pd-intro">
        <h1 class="pd-name">{{$item->item_name}}</h1>
        <div class="pd-price">NT$ {{$item->price}}</div>
        <a href="{{route('design', $item->item_id)}}" class="btn btn-block btn-theme design-btn-top">開始設計</a>
        <div class="pd-desc">
            {{$item->content}}
        </div>
        <a href="{{route('design', $item->item_id)}}" class="btn btn-theme design-btn-bottom">開始設計</a>
    </div>
</div>
@endsection