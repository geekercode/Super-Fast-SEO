<?php
// 自定义标题分隔符

function superfastseo_title_separator_to_line(){
    return '-';//自定义标题分隔符
}
add_filter( 'document_title_separator', 'superfastseo_title_separator_to_line' );
add_filter( 'run_wptexturize', '__return_false' );//禁止转义-为“&#8211”
?>