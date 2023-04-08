<?php

//add meta menu page

//add meta boxes
add_action('add_meta_boxes','superfast_post_meta_box');
function superfast_post_meta_box(){
	add_meta_box('superfast_post_meta_box','自定义SEO设置','superfastMeta_postmeta_form','post','normal','low');
	add_meta_box('superfast_post_meta_box','自定义SEO设置','superfastMeta_postmeta_form','page','normal','low');
}


//add meta form
function superfastMeta_postmeta_form(){
	include_once('singular-form.php');
}


//save meta
add_action('save_post','superfastMeta_save_post_meta');
function superfastMeta_save_post_meta($id){
	if(isset($_POST['meta_save']) && $_POST['meta_save']=='on'){
		$title='title';
		$keywords='keywords';
		$description='description';
		$metas='code';
		
		$jztTitle       = sanitize_text_field( $_POST[$title] );
		$jztKeywords    = sanitize_text_field( $_POST[$keywords] );
		$jztDescription = sanitize_text_field( $_POST[$description] );
		$jztMetsa       = sanitize_text_field( $_POST[$metas] );
		
		$val=array(
			$title=>$jztTitle,
			$keywords=>$jztKeywords,
			$description=>$jztDescription,
			$metas=>$jztMetsa,
		);
		update_post_meta($id,'_superfast_singular_meta',$val);
	}
}


//datas
function superfastMeta_datas(){
	$datas=array(
		'singular'=>array(
			'_superfastseo_title',
			'_superfastseo_keywords',
			'_superfastseo_description',
			'_superfast_head_code'
		),
	);
	return $datas;
}


//add cat metabox
//add_action('edit_category_form','superfast_cat_meta_box');
add_action('category_edit_form_fields','superfast_cat_meta_box');
function superfast_cat_meta_box(){
	if( isset($_GET['tag_ID']) && $_GET['tag_ID']!=0 && $_GET['taxonomy']=='category' ) include_once('cat-form.php');
}
add_action('edit_category','superfast_save_cat_meta');
function superfast_save_cat_meta(){	
	if( isset($_POST['action']) && isset($_POST['taxonomy']) && $_POST['action']=='editedtag' && $_POST['taxonomy']=='category' ){
	    update_option('cat_meta_key_'.sanitize_text_field($_POST['tag_ID']),array('page_title'=>sanitize_text_field($_POST['cat_page_title']),'description'=>sanitize_text_field($_POST['cat_description']),'metakey'=>sanitize_text_field($_POST['cat_keywords']),'metas'=>sanitize_text_field($_POST['cat_metas'])));
		//update_option('cat_meta_key_'.$_POST['tag_ID'],array('page_title'=>$_POST['cat_page_title'],'description'=>$_POST['cat_description'],'metakey'=>$_POST['cat_keywords'],'metas'=>$_POST['cat_metas']));
	}
}

//add tag metabox
//add_action('edit_tag_form','superfast_tag_meta_box');
add_action('post_tag_edit_form_fields','superfast_tag_meta_box');
function superfast_tag_meta_box(){
	if( $_GET['taxonomy']=='post_tag' && $_GET['tag_ID']!=0 ) include_once('tag-form.php');
}
add_action('admin_init','superfast_save_tag_meta');
function superfast_save_tag_meta(){	
	if( isset($_POST['action']) && isset($_POST['taxonomy']) && $_POST['action']=='editedtag' && $_POST['taxonomy']=='post_tag' ){
	    update_option('tag_meta_key_'.sanitize_text_field($_POST['tag_ID']),array('page_title'=>sanitize_text_field($_POST['tag_page_title']),'description'=>sanitize_text_field($_POST['tag_description']),'metakey'=>sanitize_text_field($_POST['tag_keywords']),'metas'=>sanitize_text_field($_POST['tag_metas'])));
		//update_option('tag_meta_key_'.$_POST['tag_ID'],array('page_title'=>$_POST['tag_page_title'],'description'=>$_POST['tag_description'],'metakey'=>$_POST['tag_keywords'],'metas'=>$_POST['tag_metas']));
	}
}


//add meta action
add_action('wp_head','superfast_meta_action');
function superfast_meta_action(){
	$data=superfastMeta_datas();
	
	$pages=get_query_var('page');
	if( (is_single() || is_page()) && $pages<2 ){
		$id=get_the_ID();
		$switch=get_option('superfastseo_options');
		$tag = '';
		$tags=get_the_tags();
		if( $tags ){
			foreach($tags as $val){
				$tag.=','.$val->name;
			}
		}
		$tag=ltrim($tag,',');
		$meta=get_post_meta($id,'_superfast_singular_meta',true);
		$key_meta= isset($meta['keywords']) ? $meta['keywords'] : '';
		$des_meta=isset($meta['description']) ? $meta['description'] : '';
		$pts=get_post($id);
		$pt=preg_replace('/\s+/','',strip_tags($pts->post_content));
		$num = isset( $switch['superfast_auto_description_num'] ) ? (int) $switch['superfast_auto_description_num'] : 0;
		$excerpt=mb_strimwidth($pt,0,$num, '', get_bloginfo( 'charset' ) );
		
		if( empty($key_meta) && $switch['superfast_auto_keywords']=='on' && isset($tag) ) $keywords=$tag;
		else $keywords=$key_meta;
		if( empty($des_meta) && $switch['superfast_auto_description']=='on') $description=$excerpt;
		else $description=$des_meta;
		if($keywords){	
			echo '<meta name="keywords" content="'.esc_attr($keywords).'" />';
			echo "\n";
		}
		if($description){	
			echo '<meta name="description" content="'.esc_attr($description).'" />';
			echo "\n";
		}
	}
	
	if( (is_home() || is_front_page()) && !is_paged() ){
		$val=get_option('superfastseo_options');
		$keywords=$val['superfastseo_home_keywords'];
		$description=$val['superfastseo_home_description'];
		$metas=$val['superfastseo_home_metas'];
		if($keywords){	
			echo '<meta name="keywords" content="'.esc_attr($keywords).'" />';
			echo "\n";
		}
		if($description){
			echo '<meta name="description" content="'.esc_attr(stripslashes($description)).'" />';
			echo "\n";
		}	
	}
	
	if(is_category() && !is_paged()){
		$cat_id=get_query_var('cat');
		$val=get_option('cat_meta_key_'.$cat_id);
		$keywords=$val['metakey'];
		$description=$val['description'];
		$metas=$val['metas'];
		if($keywords){
			echo '<meta name="keywords" content="'.esc_attr($keywords).'" />';
			echo "\n";
		}
		if($description){
			echo '<meta name="description" content="'.esc_attr(stripslashes($description)).'" />';
			echo "\n";
		}
	}
	
	if(is_tag() && !is_paged()){
		$tag_id=get_query_var('tag_id');
		$val=get_option('tag_meta_key_'.$tag_id);
		$keywords=$val['metakey'];
		$description=$val['description'];
		$metas=$val['metas'];
		if($keywords){
			echo '<meta name="keywords" content="'.esc_attr($keywords).'" />';
			echo "\n";
		}
		if($description){
			echo '<meta name="description" content="'.esc_attr(stripslashes($description)).'" />';
			echo "\n";
		}	
	}	
}

//wp title filter
add_filter( 'wp_title', 'superfastseo_title_filter', 9999, 2 );
function superfastseo_title_filter( $title, $sep ){
	global $paged, $page, $post;
	$option = get_option( 'superfastseo_options' );
	$data = superfastMeta_datas();
	$sep = isset($option['superfastseo_title_sep']) ? $option['superfastseo_title_sep'] : ' | ';
	if( is_single() || is_page() ){
		$meta=get_post_meta($post->ID,'_superfast_singular_meta',true);
		$title = ( isset($meta['title']) && !empty($meta['title']) ) ? $meta['title'] : get_the_title( $post->ID );
	}
	else if( is_home() || is_front_page() ){
		$title = ( isset($option['superfastseo_home_title']) && !empty($option['superfastseo_home_title'])) ? $option['superfastseo_home_title'] : get_bloginfo('name').$sep.get_bloginfo('description');
	}
	else if(is_category()){
		$cat_id=get_query_var('cat');
		$val=get_option('cat_meta_key_'.$cat_id);
		$title = ( isset($val['page_title']) && !empty($val['page_title']) ) ? $val['page_title'] : get_cat_name($cat_id);
	}
	else if(is_tag()){
		$tag_id=get_query_var('tag_id');
		$val=get_option('tag_meta_key_'.$tag_id);
		$title = ( isset($val['page_title']) && !empty($val['page_title']) ) ? $val['page_title'] : single_tag_title( '', false );
	}elseif (is_search() || is_404() || is_author()) {
    	$title = $title.get_bloginfo( 'name' );
	}else{
		$title = $title;
	}
	if( isset($option['superfastseo_title_suffix']) && $option['superfastseo_title_suffix']=='on' && !is_home() && !is_front_page()&&!is_search() && !is_404() && !is_author() )
		$title .= $sep.get_bloginfo( 'name' );
	
	if ( ( $paged >= 2 || $page >= 2 ) && isset($option['superfastseo_title_paged']) && $option['superfastseo_title_paged']=='on' )
		$title = $title.$sep.sprintf( '第 %s 页', max( $paged, $page ) );
	$tailed = isset($option['superfastseo_title_tail']) ? $option['superfastseo_title_tail'] : '';
	return $title.$tailed;
}


//add wp_head action
add_action('wp_head','superfast_custom_code');
function superfast_custom_code(){
	if( is_single() || is_page() ){
		$meta=get_post_meta(get_the_ID(),'_superfast_singular_meta',true);
		if( isset($meta['code']) && $meta['code'] ){
			echo esc_attr($meta['code'])."\n";
		}
	}
	if( is_home() || is_front_page() ){
		$val=get_option('superfastseo_options');
		$metas=$val['superfastseo_home_metas'];
		if( isset($metas) && $metas ){
			echo esc_html($metas);
			echo "\n";	
		}
	}
	if(is_category()){
		$cat_id=get_query_var('cat');
		$val=get_option('cat_meta_key_'.$cat_id);
		$metas=$val['metas'];
		if( isset( $metas ) && $metas){
			echo esc_attr(stripslashes($metas));
			echo "\n";	
		}
	}
	if(is_tag()){
		$tag_id=get_query_var('tag_id');
		$val=get_option('tag_meta_key_'.$tag_id);
		$metas=$val['metas'];
		if( isset($metas) && $metas ){
			echo esc_attr(stripslashes($metas));
			echo "\n";	
		}
	}
}
