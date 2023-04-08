<?php
//获取UA信息
$ua = $_SERVER['HTTP_USER_AGENT'];

//禁止空USER_AGENT，dedecms等主流采集程序都是空USER_AGENT，部分sql注入工具也是空USER_AGENT
if(!$ua) {
    header("Content-type: text/html; charset=utf-8");
    wp_die('请联系网站管理中获取许可！');
}
?>