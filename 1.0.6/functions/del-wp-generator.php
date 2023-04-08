<?php
// 移除WP版本号
remove_action('wp_head', 'wp_generator'); 
foreach (array('rss2_head', 'commentsrss2_head', 'rss_head', 'rdf_header', 'atom_head', 'comments_atom_head', 'opml_head', 'app_head') as $action) {
	remove_action($action, 'the_generator');
}
// 自定义底部-左边
add_filter('admin_footer_text', 'superfastseo_reset_footer_left_text');
function superfastseo_reset_footer_left_text($text) {
	return false;
}
// 自定义底部-左边
add_filter('update_footer', 'superfastseo_reset_footer_right_text', 11);
function superfastseo_reset_footer_right_text($text) {
	return false;
}
?>