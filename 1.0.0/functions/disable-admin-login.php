<?php
// 禁用 admin 用户名登录
add_filter('wp_authenticate', 'superfastseo_disable__admin_user');
function superfastseo_disable__admin_user($user) {
	if ('admin' == $user) 
		return return__status_414();
}
add_filter('sanitize_user', 'superfastseo_disable__sanitize_user_admin', 10, 3);
function superfastseo_disable__sanitize_user_admin($username, $raw_username, $strict) {
	if ('admin' == $raw_username || 'admin' == $username) 
		return return__status_414();

	return $username;
}
?>