@extends('layouts.page')

@section('content')
@php
    $default_color = '1red';
    $default_style = 'b';
@endphp
<div class="design">
    <div class="preview-area">
        <div id="preview_img" class="preview-img" data-style="{{$default_style}}" data-color="{{$default_color}}" data-size="xs" data-font="white">
            <div id="runfor_preview" class="runfor-preview font-white">
                <div id="pos_1" class="preview-pos front is-acted">
                    <div class="pd-img" style="background-image: url(../img/pd/runfor/{{$default_style}}1_{{$default_color}}.png);"></div>
                    <div class="text">
                        <div class="front-static">RUN FOR</div>
                        <div id="text_front" class="text-front">FAITH</div>
                    </div>
                </div>
                <div id="pos_2" class="preview-pos left">
                    <div class="pd-img" style="background-image: url(../img/pd/runfor/{{$default_style}}2_{{$default_color}}.png);"></div>
                    <div class="text" id="text_left_wrap">
                        <div id="text_left" class="text-left">HOWARD</div>
                    </div>
                    <div id="icon_left" class="icon is-hidden">
                        <img src="../img/pd/runfor/flag_tw.png">
                    </div>
                </div>
                <div id="pos_3" class="preview-pos back">
                    <div class="pd-img" style="background-image: url(../img/pd/runfor/{{$default_style}}3_{{$default_color}}.png);"></div>
                    <div class="text">
                        <div id="text_back" class="text-back">隊友情深</div>
                        <div class="back-static">WHAT DO YOU RUN FOR?</div>
                    </div>
                </div>
                <div id="pos_4" class="preview-pos right">
                    <div class="pd-img" style="background-image: url(../img/pd/runfor/{{$default_style}}4_{{$default_color}}.png);"></div>
                    <div class="text" id="text_right_wrap">
                        <div id="text_right" class="text-right">HOWARD</div>
                    </div>
                    <div id="icon_right" class="icon is-hidden">
                        <img src="../img/pd/runfor/flag_tw.png">
                    </div>
                </div>
    
            </div>
        </div>
        <ul id="view_tool" class="view-tool-list" data-pos="1">
            <li class="material-icons rotate_view" data-view="next">&#xE41A;</li>
            <li class="material-icons rotate_view" data-view="prev">&#xE419;</li>
        </ul>
    </div>
    <div class="work-area">
        <div class="tool-list">
            <div class="tool-item is-acted" data-tool="color"><i class="material-icons">&#xE3B7;</i></div>
            <div class="tool-item" data-tool="style"><i class="material-icons">&#xE41C;</i></div>
            <div class="tool-item" data-tool="text"><i class="material-icons">&#xE262;</i></div>
        </div>
        <div class="tool-box-wrap">
            <div class="tool-box" data-tool="color">
                <h2 class="tool-name">顏色</h2>
                <ul class="style-list style-color" id="color_toggle">
                    <li class="style-item" data-color="1red" data-font="white" style="background-image: url(../img/pd/runfor/color/1red.jpg);"><i class="material-icons">&#xE5CA;</i></li>
                    <li class="style-item" data-color="1orange" data-font="white" style="background-image: url(../img/pd/runfor/color/1orange.jpg);"></li>
                    <li class="style-item" data-color="1yellow" data-font="black" style="background-image: url(../img/pd/runfor/color/1yellow.jpg);"></li>
                    <li class="style-item" data-color="1green" data-font="white" style="background-image: url(../img/pd/runfor/color/1green.jpg);"></li>
                    <li class="style-item" data-color="1lightskyblue" data-font="white" style="background-image: url(../img/pd/runfor/color/1lightskyblue.jpg);"></li>
                    <li class="style-item" data-color="1blue" data-font="white" style="background-image: url(../img/pd/runfor/color/1blue.jpg);"></li>
                    <li class="style-item" data-color="1purple" data-font="white" style="background-image: url(../img/pd/runfor/color/1purple.jpg);"></li>
                    <li class="style-item" data-color="1LightTurquoise" data-font="white" style="background-image: url(../img/pd/runfor/color/1LightTurquoise.jpg);"></li>
                    <li class="style-item" data-color="1black" data-font="white" style="background-image: url(../img/pd/runfor/color/1black.jpg);"></li>
                    <li class="style-item" data-color="1pink" data-font="white" style="background-image: url(../img/pd/runfor/color/1pink.jpg);"></li>
                    <li class="style-item" data-color="1MediumTurquoise" data-font="white" style="background-image: url(../img/pd/runfor/color/1MediumTurquoise.jpg);"></li>
                    <li class="style-item" data-color="1Darkgreen" data-font="white" style="background-image: url(../img/pd/runfor/color/1Darkgreen.jpg);"></li>
                    <li class="style-item" data-color="1Brown" data-font="white" style="background-image: url(../img/pd/runfor/color/1Brown.jpg);"></li>
                    <li class="style-item" data-color="1Deepskyblue" data-font="white" style="background-image: url(../img/pd/runfor/color/1Deepskyblue.jpg);"></li>
                    <li class="style-item" data-color="1skyblue" data-font="white" style="background-image: url(../img/pd/runfor/color/1skyblue.jpg);"></li>
                    <li class="style-item" data-color="1Gray" data-font="white" style="background-image: url(../img/pd/runfor/color/1Gray.jpg);"></li>
                    <li class="style-item" data-color="1Gummired" data-font="white" style="background-image: url(../img/pd/runfor/color/1Gummired.jpg);"></li>
                    <li class="style-item" data-color="1Navy" data-font="white" style="background-image: url(../img/pd/runfor/color/1Navy.jpg);"></li>
                    <li class="style-item" data-color="1GradientYellow" data-font="white" style="background-image: url(../img/pd/runfor/color/1GradientYellow.jpg);"></li>
                    <li class="style-item" data-color="1GradientDarkblue" data-font="white" style="background-image: url(../img/pd/runfor/color/1GradientDarkblue.jpg);"></li>
                    <li class="style-item" data-color="1GradientPurple" data-font="white" style="background-image: url(../img/pd/runfor/color/1GradientPurple.jpg);"></li>
                    <li class="style-item" data-color="1GradientOrange" data-font="white" style="background-image: url(../img/pd/runfor/color/1GradientOrange.jpg);"></li>
                    <li class="style-item" data-color="1GradientLightblue" data-font="white" style="background-image: url(../img/pd/runfor/color/1GradientLightblue.jpg);"></li>
                    <li class="style-item" data-color="1GradientRed" data-font="white" style="background-image: url(../img/pd/runfor/color/1GradientRed.jpg);"></li>
                    <li class="style-item" data-color="1carbon" data-font="white" style="background-image: url(../img/pd/runfor/color/1carbon.jpg);"></li>
                    <li class="style-item" data-color="1Signblue" data-font="white" style="background-image: url(../img/pd/runfor/color/1Signblue.jpg);"></li>
                    <li class="style-item" data-color="1White" data-font="black" style="background-image: url(../img/pd/runfor/color/1White.jpg);"></li>
                    <li class="style-item" data-color="1CamGreen" data-font="white" style="background-image: url(../img/pd/runfor/color/1CamGreen.jpg);"></li>
                    <li class="style-item" data-color="1CamBlue" data-font="white" style="background-image: url(../img/pd/runfor/color/1CamBlue.jpg);"></li>
                    <li class="style-item" data-color="1CamGray" data-font="white" style="background-image: url(../img/pd/runfor/color/1CamGray.jpg);"></li>
                    <li class="style-item" data-color="1CamPink" data-font="white" style="background-image: url(../img/pd/runfor/color/1CamPink.jpg);"></li>
                    <li class="style-item" data-color="1CamCMYK" data-font="white" style="background-image: url(../img/pd/runfor/color/1CamCMYK.jpg);"></li>
                    <li class="style-item" data-color="1CamYellowStrip" data-font="white" style="background-image: url(../img/pd/runfor/color/1CamYellowStrip.jpg);"></li>
                </ul>
            </div>
            <div class="tool-box is-hidden" data-tool="style">
                <h2 class="tool-name">樣式</h2>
                <ul class="style-list style-selector" id="style_toggle">
                    <li class="style-item is-acted" data-value="b">M</li>
                    <li class="style-item" data-value="g">F</li>
                </ul>
                <h2 class="tool-name">尺寸</h2>
                <ul class="style-list style-selector" id="size_toggle">
                    <li class="style-item is-acted" data-value="xs">XS</li>
                    <li class="style-item" data-value="s">S</li>
                    <li class="style-item" data-value="m">M</li>
                    <li class="style-item" data-value="l">L</li>
                    <li class="style-item" data-value="xl">XL</li>
                    <li class="style-item" data-value="2xl">2XL</li>
                </ul>
            </div>
            <div class="tool-box tool-text is-hidden" data-tool="text">
                <div class="tip-text">文字字數為中文 5 字，或英文 9 個大寫字母</div>

                <h2 class="tool-name">胸前</h2>
                <div class="form-row">
                    <input type="text" id="font_front" value="FAITH" data-view="front">
                </div>

                <h2 class="tool-name">左手臂</h2>
                <div class="form-row">
                    <select id="toggle_left_font">
                        <option value="text" selected>文字</option>
                        <option value="icon">國旗</option>
                        <option value="none">無樣式</option>
                    </select>
                    <div id="font_left_wrap">
                        <input type="text" id="font_left" value="HOWARD" data-view="left">
                    </div>
                </div>

                <h2 class="tool-name">背後</h2>
                <div class="form-row">
                    <input type="text" id="font_back" value="隊友情深" data-view="back">
                </div>

                <h2 class="tool-name">右手臂</h2>
                <div class="form-row">
                    <select id="toggle_right_font">
                        <option value="text" selected>文字</option>
                        <option value="icon">國旗</option>
                        <option value="none">無樣式</option>
                    </select>
                    <div id="font_right_wrap">
                        <input type="text" id="font_right" value="HOWARD" data-view="right">
                    </div>
                </div>
            </div>
        </div>
        <a href="javascript:;" id="submit" class="btn-pay">結帳 NT$ {{$item->price}} <span class="price">{{$item->amount}}</span> <i class="material-icons">&#xE5C8;</i></a>
    </div>
</div>

<form id="checkout" action="{{route('checkout', $id)}}" method="post">
    {{ csrf_field() }}
    <input type="hidden" id="checkout_size" name="size" value="">
    <input type="hidden" id="checkout_color" name="color" value="">

    <input type="hidden" id="checkout_style" name="style" value="">
    <input type="hidden" id="checkout_left_style" name="left_style" value="">
    <input type="hidden" id="checkout_right_style" name="right_style" value="">

    <input type="hidden" id="checkout_text_back" name="text_back" value="">
    <input type="hidden" id="checkout_text_front" name="text_front" value="">
    <input type="hidden" id="checkout_text_right" name="text_right" value="">
    <input type="hidden" id="checkout_text_left" name="text_left" value="">
    {{--  <input type="hidden" id="checkout_icon_flag" name="icon_flag" value="">  --}}
    
    <input type="hidden" id="checkout_pos1" name="pos1" value="">
    <input type="hidden" id="checkout_pos2" name="pos2" value="">
    <input type="hidden" id="checkout_pos3" name="pos3" value="">
    <input type="hidden" id="checkout_pos4" name="pos4" value="">
</form>

{{--  <div id="test_img"></div>  --}}

@endsection

@section('js')
<script src="http://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
<script type="text/javascript" src="http://canvg.github.io/canvg/rgbcolor.js"></script> 
<script type="text/javascript" src="http://canvg.github.io/canvg/StackBlur.js"></script>
<script type="text/javascript" src="http://canvg.github.io/canvg/canvg.js"></script> 
<script src="{{asset('/js/design.js')}}"></script>
@endsection