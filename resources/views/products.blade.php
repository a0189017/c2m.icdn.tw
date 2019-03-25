@extends('layouts.page')

@section('content')
<ul class="pd-list">
    @foreach ($pd_list as $k => $v)
    <li>
        <a href="/product/<?php echo $v['item_id'] ?>" title="<?php echo $v['pd_name']?>">
            <div class="pd-img" style="background-image: url(<?php echo $v['pd_img']?>)"></div>
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