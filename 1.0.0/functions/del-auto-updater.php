<?php
// 关闭自动更新
add_filter('automatic_updater_disabled', '__return_true');

// 关闭更新检查定时作业
remove_action('init', 'wp_schedule_update_checks');

//停用版本更新通知
remove_action('load-update-core.php', 'wp_update_themes');

//禁止更新检查
$remove = array(
	'_maybe_update_core', //内核检查
	'_maybe_update_themes', //主题检查
);
foreach($remove as $value){
	remove_action('admin_init', $value);
}

//关闭更新提示
$remove = array(
	'pre_site_transient_update_core', //核心提示
	'pre_site_transient_update_themes', //主题提示
);
foreach($remove as $value){
	add_filter($value, function($a){
		return null;
	});
}
unset($remove);

// 移除更新菜单
// plugin-setup
$field_name = 'remove_update_menu';
if (!empty($values) && in_array($field_name, $values)) {
	add_action('admin_menu', function() {
		remove_submenu_page('index.php', 'update-core.php'); //更新
	});
}
?>