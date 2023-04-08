<?php
/*
* 
* api 优化
* 
*/

// 禁用 XML-RPC 接口
add_filter('xmlrpc_enabled', '__return_false');
remove_action('xmlrpc_rsd_apis', 'rest_output_rsd');


// 关闭 pingback
add_filter('xmlrpc_methods', 'superfastseo_disable__pingback_api');
function superfastseo_disable__pingback_api($methods) {
	$methods['pingback.ping'] = '__return_false';
	$methods['pingback.extensions.getPingbacks'] = '__return_false';
	return $methods;
}

//禁用 pingbacks, enclosures, trackbacks
remove_action('do_pings', 'do_all_pings', 10);

//去掉 _encloseme 和 do_ping 操作。
remove_action('publish_post', '_publish_post_hook', 5);


// 禁用 REST API
$field_name = 'disable_rest_api';
if (!empty($values) && in_array($field_name, $values)) {
	remove_action('init', 'rest_api_init');
	remove_action('rest_api_init', 'rest_api_default_filters', 10);
	remove_action('parse_request', 'rest_api_loaded');
}

//禁用 REST API
add_filter('rest_enabled', '__return_false');
add_filter('rest_jsonp_enabled', '__return_false');
add_filter('rest_authentication_errors', '__return_false');

//验证 REST API 
add_filter('rest_authentication_errors', 'superfastseo_reset__rest_api_captcha');
function superfastseo_reset__rest_api_captcha($access) {
	$referer = $_SERVER['HTTP_REFERER'];
	if(!empty($referer))
		$referer = parse_url($referer)['host'];
	if($referer != parse_url(home_url())['host'])
		return new WP_Error(
			'error',
			'error',
			array('status' => 403)
		);
	return true;
}
?>