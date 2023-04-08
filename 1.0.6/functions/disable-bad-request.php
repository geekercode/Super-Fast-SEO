<?php
// 阻止非法访问
add_action('init', 'superfastseo_disable__bad_queries');
function superfastseo_disable__bad_queries() {
    if (is_admin())
        return false;

    if (
        strpos($_SERVER['REQUEST_URI'], 'eval(') ||
        strpos($_SERVER['REQUEST_URI'], 'base64') ||
        strpos($_SERVER['REQUEST_URI'], '/**/')   ) {
        return return__status_414();
    }
}
?>