<?php
if ( ! function_exists( 'superfastseo_set_no_found_rows' ) ) {
    /**
     * 设置WP_Query的 'no_found_rows' 属性为true，禁用SQL_CALC_FOUND_ROWS
     *
     * @param  WP_Query $wp_query WP_Query实例
     * @return void
     */
    function superfastseo_set_no_found_rows(\WP_Query $wp_query)
    {
        $wp_query->set('no_found_rows', true);
    }
}
add_filter( 'pre_get_posts', 'superfastseo_set_no_found_rows', 10, 1 );


if ( ! function_exists( 'superfastseo_set_found_posts' ) ) {
    /**
     * 使用 EXPLAIN 方式重构
     */
    function superfastseo_set_found_posts($clauses, \WP_Query $wp_query)
    {

        if ($wp_query->is_singular()) {
            return $clauses;
        }

        global $wpdb;

        $where = isset($clauses['where']) ? $clauses['where'] : '';
        $join = isset($clauses['join']) ? $clauses['join'] : '';
        $distinct = isset($clauses['distinct']) ? $clauses['distinct'] : '';

        $wp_query->found_posts = (int)$wpdb->get_row("EXPLAIN SELECT $distinct * FROM {$wpdb->posts} $join WHERE 1=1 $where")->rows;

        $posts_per_page = (!empty($wp_query->query_vars['posts_per_page']) ? absint($wp_query->query_vars['posts_per_page']) : absint(get_option('posts_per_page')));

        $wp_query->max_num_pages = ceil($wp_query->found_posts / $posts_per_page);

        return $clauses;
    }
}
add_filter( 'posts_clauses', 'superfastseo_set_found_posts', 10, 2 );
?>