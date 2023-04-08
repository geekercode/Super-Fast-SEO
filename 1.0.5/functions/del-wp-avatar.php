<?php
/*
 *------------------------------------------------------------------------------------------------
 * 禁用avatar头像.
 *------------------------------------------------------------------------------------------------
 */
define('SUPERFASTSEO_AVATAR_URL', plugins_url('',__FILE__) . '/static/images/avatar.jpg'); //默认头像
function superfastseo_no_gravatars( $avatar ) {
    return preg_replace( "/http.*?gravatar\.com[^\']*/", SUPERFASTSEO_AVATAR_URL, $avatar );
}
add_filter( 'get_avatar', 'superfastseo_no_gravatars' ); 
?>