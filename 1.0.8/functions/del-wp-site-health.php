<?php
//移除站点健康小工具
function superfastseo_remove_dashboard_widget() {
    remove_meta_box( 'dashboard_site_health', 'dashboard', 'normal' );
}
add_action('wp_dashboard_setup', 'superfastseo_remove_dashboard_widget' );
?>