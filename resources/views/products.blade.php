@extends('layouts.page')

@section('content')
<ul class="pd-list">
    @php
        $pd_list = array(
            array(
                'pd_name' => 'RUN FOR 系列 Tee',
                'pd_price' => '399 起',
                'pd_img' => 'pd1.jpg'
            ),
            array(
                'pd_name' => '跑者背包',
                'pd_price' => '899 起',
                'pd_img' => 'pd2.jpg'
            ),
            array(
                'pd_name' => '愛國系列 TEE',
                'pd_price' => '499 起',
                'pd_img' => 'pd3.jpg'
            ),
            array(
                'pd_name' => 'RUN FOR 系列 Tee',
                'pd_price' => '399 起',
                'pd_img' => 'pd1.jpg'
            ),
            array(
                'pd_name' => '跑者背包',
                'pd_price' => '899 起',
                'pd_img' => 'pd2.jpg'
            ),
            array(
                'pd_name' => '愛國系列 TEE',
                'pd_price' => '499 起',
                'pd_img' => 'pd3.jpg'
            ),
            array(
                'pd_name' => 'RUN FOR 系列 Tee',
                'pd_price' => '399 起',
                'pd_img' => 'pd1.jpg'
            ),
            array(
                'pd_name' => '跑者背包',
                'pd_price' => '899 起',
                'pd_img' => 'pd2.jpg'
            ),
            array(
                'pd_name' => '愛國系列 TEE',
                'pd_price' => '499 起',
                'pd_img' => 'pd3.jpg'
            ),
        );
    @endphp
    @foreach ($pd_list as $k => $v)
    <li>
        <a href="/product/1" title="<?php echo $v['pd_name']?>">
            <div class="pd-img" style="background-image: url(../img/<?php echo $v['pd_img']?>)"></div>
            <div class="pd-info">
                <h3 class="pd-name"><?php echo $v['pd_name']?></h3>
                <div class="pd-price">NT$ <?php echo $v['pd_price']?></div>
                <i class="material-icons design-arrow">&#xE409;</i>
            </div>
            <?php if($k==0):?>
            <div class="promo-badage">NEW</div>
            <?php endif ?>
        </a>
    </li>
    @endforeach
</ul>
@endsection