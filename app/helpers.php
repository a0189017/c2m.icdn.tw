<?php

function convert_meta2arr($meta) {
    $return = [];
    foreach($meta as $k=>$v) {
        $return[$v->meta_key] = $v->meta_value;
    }

    return $return;
}