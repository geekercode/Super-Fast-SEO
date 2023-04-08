<?php
add_action('save_post', 'auto_add_tags');
function auto_add_tags(){
	$tags = get_tags( array('hide_empty' => false) );
	$post_id = get_the_ID();
	$post_content = get_post($post_id)->post_content;
	if ($tags) {
		foreach ( $tags as $tag ) {
			// 如果文章内容出现了已使用过的标签，自动添加这些标签
			if ( strpos($post_content, $tag->name) !== false)
			 	wp_set_post_tags( $post_id, $tag->name, true );				
                            
		}
	}
}
?>