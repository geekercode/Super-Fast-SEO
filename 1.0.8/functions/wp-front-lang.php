<?php
/*
* 
* 其他优化
* 
*/


// 移除 front
add_action('init', function() {
    global $wp_rewrite;
	$wp_rewrite->front = null;
});


// 不加载语言包
add_filter('language_attributes', 'superfastseo_disable__language_attributes');
function superfastseo_disable__language_attributes($language_attributes) {
	$locale = get_locale();
	if (function_exists('is_rtl') && is_rtl()) {
		$attributes[] = 'dir="rtl"';
	}
	if ($locale) {
		if (get_option('html_type') == 'text/html') {
			$attributes[] = "lang=\"$locale\"";
		}

		if (get_option('html_type') != 'text/html') {
			$attributes[] = "xml:lang=\"$locale\"";
		}
	}
	$output = implode(' ', $attributes);
	return $output;
}    

add_filter('locale', 'disable__locale');
function disable__locale($locale) {
    $locale = (is_admin()) ? $locale : 'zh_CN';
    return $locale;
}


// 移除中文包无用代码
add_action('init', 'superfastseo_remove__zh_ch_functions');
function superfastseo_remove__zh_ch_functions() {
    remove_action('admin_init', 'zh_cn_l10n_legacy_option_cleanup');
    remove_action('admin_init', 'zh_cn_l10n_settings_init');
    wp_embed_unregister_handler('tudou');
    wp_embed_unregister_handler('youku');
    wp_embed_unregister_handler('56com');
}

?>