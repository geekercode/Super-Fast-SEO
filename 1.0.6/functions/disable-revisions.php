<?php
//禁用所有文章类型的修订版本，报错未定义WP_POST_REVISIONS
/*add_filter( 'wp_revisions_to_keep', 'specs_wp_revisions_to_keep', 10, 2 );
function specs_wp_revisions_to_keep( $num, $post ) {
return 0;
}
*/
define('WP_POST_REVISIONS', false);
?>