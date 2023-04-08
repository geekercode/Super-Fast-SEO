<?php
//修改搜索结果的链接
	function superfastseo_redirect_search() {
		if (is_search() && !empty($_GET['s'])) {
			wp_redirect(home_url("/search/").urlencode(get_query_var('s')));
			exit();
		}
	}
	add_action('template_redirect', 'superfastseo_redirect_search' );
	
//搜索结果排除所有页面
function superfastseo_search_filter_page($query) {
    if ($query->is_search && !$query->is_admin) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts', 'superfastseo_search_filter_page');
//搜索关键词为空 跳转到首页
add_filter( 'request', function ( $superfastseo_query_variables ) {
	if (isset($_GET['s']) && !is_admin()) {
		if (empty($_GET['s']) || ctype_space($_GET['s'])) {
			wp_redirect( home_url() );
			exit;
		}
	}
	return $superfastseo_query_variables;
} );
?>