<?php
//去掉后台标题
add_filter('admin_title', 'superfastseo_custom_admin_title', 10, 2);
function superfastseo_custom_admin_title($admin_title, $title){
    return $title.' &lsaquo; '.get_bloginfo('name');
}
?>