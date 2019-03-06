@php
    $pages = array();
    $pages[route('account')] = "帳戶資訊";
    $pages[route('orders')] = "我的訂單";
    $pages[route('showChangePassword')] = "修改密碼";
    $pages[route('logout')] = "登出";
    $activePage = substr($_SERVER["SCRIPT_NAME"],strrpos($_SERVER["SCRIPT_NAME"],"/")+1);
@endphp
<div class="left">
    <ul class="member-list">
        <?php foreach($pages as $url=>$title):?>
        <li>
            <a <?php if($url === $activePage):?>class="is-acted"<?php endif;?> href="<?php echo $url;?>">
                <?php echo $title;?>
            </a>
        </li>
        <?php endforeach;?>
    </ul>
</div>