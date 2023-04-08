<?php
// 移除仪表盘其他模块
add_action('wp_dashboard_setup', 'superfastseo_disable__dashboard_setup');
function superfastseo_disable__dashboard_setup(){
	global $wp_meta_boxes;
	$array = array(
		'side' => array(
			'dashboard_quick_press', //快速发布 
			'dashboard_recent_drafts', //近期草稿
			'dashboard_primary', //开发日志
			'dashboard_secondary', //wp 新闻
		),
		'normal' => array(
			'dashboard_incoming_links', //wp链接 
			'dashboard_plugins', //插件
			'dashboard_activity', //活动
			'dashboard_recent_comments', //近期评论
			'dashboard_right_now', //概况
			'dashboard_site_health', //健康状态
		)
	);		
	//批量移除
	foreach($array as $key=>$val){
		foreach($val as $value){
			if($value){
				unset($wp_meta_boxes['dashboard'][$key]['core'][$value]);
			}
		}
	}
}
?>