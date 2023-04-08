<?php
//移除禁用s.w.org的加载
function superfastseo_remove_dns_prefetch( $hints, $relation_type ) {
if ( 'dns-prefetch' === $relation_type ) {
return array_diff( wp_dependencies_unique_hosts(), $hints );
}
return $hints;
}
add_filter( 'wp_resource_hints', 'superfastseo_remove_dns_prefetch', 10, 2 );
?>