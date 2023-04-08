<?php
/*
 *-----------------------------------------------------------------------------------------------------------------------
 * 删除菜单多余css class
 *-----------------------------------------------------------------------------------------------------------------------
 */
function superfastseo_css_attributes_filter($classes) {
	return is_array($classes) ? array_intersect($classes, array(
	    'current-menu-item',
	    'current-post-ancestor',
	    'current-menu-ancestor',
	    'current-menu-parent',
	    'menu-item-has-children',
	    'menu-item'
	    )) : '';
}
add_filter('nav_menu_css_class',	'superfastseo_css_attributes_filter', 100, 1);
add_filter('nav_menu_item_id',		'superfastseo_css_attributes_filter', 100, 1);
add_filter('page_css_class', 		'superfastseo_css_attributes_filter', 100, 1);
?>