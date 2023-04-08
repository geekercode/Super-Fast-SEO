<?php 
/**
 * Plugin Name:  Super Fast SEO优化插件
 * Plugin URI:   https://www.jizhuti.com/
 * Description:  基于WordPress的国产SEO插件，代码精炼、超快、功能强大！主要功能：基础优化、正文过滤HTML、正文自定义关键词内链、数据库优化(使WP支持百万级数据)、生成memcached缓存、redis缓存、模板伪原创、图片压缩处理、SITEMAP、自定义TKD、
 * Version:      1.0.10
 * Author:       极主题
 * Author URI:   http://www.jizhuti.com/
 * Author Email: 77103588@qq.com
 */
 
if (!defined('ABSPATH')) die();


//当前插件目录：http://www.jizhuti.com/wp-content/plugins/插件目录名称
define('SUPERFASTSEO_PLUGIN_URL', plugins_url('', __FILE__));
//返回当前插件目录在服务器的绝对路径:/www/wwwroot/lnw/wp-content/plugins/插件目录名称/
define('SUPERFASTSEO_PLUGIN_DIR', plugin_dir_path( __FILE__ ));
//返回当前插件目录下本文件地址：/www/wwwroot/lnw/wp-content/plugins/插件目录名称/当前文件名.php
define('SUPERFASTSEO_PLUGIN_FILE', __FILE__);

//加载下述文件
include(SUPERFASTSEO_PLUGIN_DIR . 'hook.php'); //插件动作
include(SUPERFASTSEO_PLUGIN_DIR . 'modules.php'); //插件模块
include(SUPERFASTSEO_PLUGIN_DIR . '/functions/functions.php'); //插件函数
include(SUPERFASTSEO_PLUGIN_DIR . 'options.php'); //插件选项
include(SUPERFASTSEO_PLUGIN_DIR . 'super-fast-seo.php'); //插件模块

?>