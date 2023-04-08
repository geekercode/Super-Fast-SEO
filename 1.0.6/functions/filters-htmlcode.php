<?php
//发布文章前对文章内容进行预处理
function superfastseo_light_insert_post_data( $data , $postarr ) {
	//去掉大写空格(　)* 
    $data['post_content_filtered'] = preg_replace('/(　)*/', '', $data['post_content_filtered']); 
    $data['post_content_filtered'] = preg_replace('/&nbsp;/', '', $data['post_content_filtered']); 
    $data['post_content'] = preg_replace('/(　)*/', '', $data['post_content']); 
    $data['post_content'] = preg_replace('/&nbsp;/', '', $data['post_content']); 
	//html标签合并处理
	$data['post_content_filtered'] = superfastseo_light_insert_post_data_filterAll($data['post_content_filtered']);
	$data['post_content'] = superfastseo_light_insert_post_data_filterAll($data['post_content']);
return $data;
}
add_filter( 'wp_insert_post_data', 'superfastseo_light_insert_post_data', '99', 2 );
//end

//html标签替换为P
function superfastseo_light_insert_post_data_DisHtmlTags($data) {
	foreach(array('div','center') as $val):
		$data = preg_replace('#<'.$val.'[^>]*>(.*?)</'.$val.'>#is', '<p>$1</p>', $data); //替换为p	
	endforeach;
return $data;
}
//end

//html标签去除重叠
function superfastseo_light_insert_post_data_DelHtmlRepeat($data) {
	foreach(array('strong','b') as $val):
		$data = preg_replace('#<'.$val.'><'.$val.'>(.*?)</'.$val.'></'.$val.'>#is', '<'.$val.'>$1</'.$val.'>', $data); 
		$data = preg_replace('#</'.$val.'><'.$val.'>#is', '', $data); 
		$data = preg_replace('#<'.$val.'></'.$val.'>#is', '', $data);
	endforeach;
return $data;
}
//end

//html标签删除
function superfastseo_light_insert_post_data_DelHtmlTags($data) {
	foreach(array('span','section') as $val):
		$data = preg_replace('/<(\/?'.$val.'.*?)>/si','',$data); //过滤标签
	endforeach;
return $data;
}
//end

//html标签合并处理
function superfastseo_light_insert_post_data_filterAll($data) {
	$data = superfastseo_light_insert_post_data_DisHtmlTags($data);
	$data = superfastseo_light_insert_post_data_DelHtmlRepeat($data);
	$data = superfastseo_light_insert_post_data_DelHtmlTags($data);
	$data = trim($data);
return $data;
}
//end
?>