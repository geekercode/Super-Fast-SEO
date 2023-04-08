<?php
/*
 *-----------------------------------------------------------------------------------------------------------------------
 * 去掉JS/CSS后面带的版本号
 *-----------------------------------------------------------------------------------------------------------------------
 */
 function superfastseo_remove_wp_ver_css_js( $src ) {
 if ( strpos( $src, 'ver=' . get_bloginfo( 'version' ) ) )
 $src = remove_query_arg( 'ver', $src );
 return $src;
 }
 add_filter( 'style_loader_src', 'superfastseo_remove_wp_ver_css_js', 9999 );
 add_filter( 'script_loader_src', 'superfastseo_remove_wp_ver_css_js', 9999 );
 
?>