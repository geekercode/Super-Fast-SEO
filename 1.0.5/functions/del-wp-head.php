<?php
/*
* 
* wp_head精简
* 
*/

// 移除admin Bar
// plugin-setup
$field_name = 'remove_admin_bar';
if (!empty($values) && in_array($field_name, $values)) {
	add_filter('show_admin_bar', '__return_false');
}

// 移除WP版本号
remove_action('wp_head', 'wp_generator'); 
foreach (array('rss2_head', 'commentsrss2_head', 'rss_head', 'rdf_header', 'atom_head', 'comments_atom_head', 'opml_head', 'app_head') as $action) {
	remove_action($action, 'the_generator');
}

// 移除RSD LINK
remove_action('wp_head', 'rsd_link'); 

// 移除Windows Live Writer 的适配器
remove_action('wp_head', 'wlwmanifest_link');

// 移除Feed link
remove_action('wp_head', 'feed_links_extra', 3);

// 移除日志链接
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'parent_post_rel_link', 10);
remove_action('wp_head', 'start_post_rel_link', 10);
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10);

// 移除shortlink
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

// 移除WP RSET API
remove_action('wp_head', 'rest_output_link_wp_head', 10);

// 移除短链接
remove_action('template_redirect', 'wp_shortlink_header', 11);

// 移除Link 标签
remove_action('template_redirect', 'rest_output_link_header', 11);

// 移除 Emoji
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('embed_head', 'print_emoji_detection_script');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
add_filter('tiny_mce_plugins', 'superfastseo_disable__emoji_tiny_mce_plugin');
function superfastseo_disable__emoji_tiny_mce_plugin($plugins) {
	return array_diff($plugins, array('wpemoji'));
}

// 移除s.w.org
add_filter('emoji_svg_url', '__return_false');


// 移除 wp-json 标签和 link
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('template_redirect', 'rest_output_link_header', 11);

// 移除 Auto OEmbed
remove_filter('the_content', array($GLOBALS['wp_embed'], 'autoembed'), 8);

?>