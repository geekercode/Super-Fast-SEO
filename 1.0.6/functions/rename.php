<?php
/*
 *------------------------------------------------------------------------------------------------
 * 上传图片使用日期重命名
 *------------------------------------------------------------------------------------------------
 */
function superfastseo_wp_upload_filter($file){  
	$time=date("YmdHis");  
	$file['name'] = $time."".mt_rand(1,100).".".pathinfo($file['name'] , PATHINFO_EXTENSION);  
	return $file;  
}  
add_filter('wp_handle_upload_prefilter', 'superfastseo_wp_upload_filter'); 
?>