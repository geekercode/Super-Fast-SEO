<?php
// 移除wp logo
//精简WordPress前后台顶部工具栏
function superfastseo_edit_toolbar($wp_toolbar) {
    $wp_toolbar->remove_node('wp-logo'); //去掉Wordpress LOGO
    $wp_toolbar->remove_node('comments'); //去掉评论提醒
    $wp_toolbar->remove_node('updates'); //去掉更新提醒
}
?>