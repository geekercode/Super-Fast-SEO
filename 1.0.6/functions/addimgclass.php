<?php
//WordPress增加上传svg、ico、webp文件权限
add_filter('upload_mimes', 'superfastseo_upload_mimes');
function superfastseo_upload_mimes($mimes = array()) {
    $mimes['svg'] = 'image/svg+xml';
    $mimes['ico'] = 'image/x-icon';
    $mimes['webp'] = 'image/webp';
    return $mimes;
}
?>