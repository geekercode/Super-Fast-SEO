<?php
//基础优化
if( get_option('superfastseo-disable-autosave') ==='1' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/disable-autosave.php');
}
if( get_option('superfastseo-disable-revisions') ==='1' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/disable-revisions.php');
}
if( get_option('superfastseo-remove-prefetch') ==='2' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/remove-prefetch.php');
}
if( get_option('superfastseo-del-auto-updater') ==='3' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/del-auto-updater.php');
}
if( get_option('superfastseo-del-wp-logo') ==='4' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/del-wp-logo.php');
}
if( get_option('superfastseo-del-wp-help') ==='5' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/del-wp-help.php');
}
if( get_option('superfastseo-del-wp-admin-title') ==='6' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/del-wp-admin-title.php');
}
if( get_option('superfastseo-del-wp-site-health') ==='7' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/del-wp-site-health.php');
}
if( get_option('superfastseo-del-wp-generator') ==='8' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/del-wp-generator.php');
}
if( get_option('superfastseo-del-wp-other') ==='9' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/del-wp-other.php');
}
if( get_option('superfastseo-del-wp-avatar') ==='10' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/del-wp-avatar.php');
}
if( get_option('superfastseo-del-wp-api') ==='11' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/del-wp-api.php');
}
if( get_option('superfastseo-del-wp-head') ==='12' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/del-wp-head.php');
}
if( get_option('superfastseo-wp-title-separator') ==='13' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/wp-title-separator.php');
}
if( get_option('superfastseo-wp-front-lang') ==='14' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/wp-front-lang.php');
}
if( get_option('superfastseo-del-Gutenberg') ==='15' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/del-Gutenberg.php');
}
if( get_option('superfastseo-del-category-url') ==='16' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/del-category-url.php');
}
if( get_option('superfastseo-search-link') ==='17' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/search-link.php');
}
if( get_option('superfastseo-del-css-class') ==='18' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/del-css-class.php');
}
if( get_option('superfastseo-del-js-css-ver') ==='19' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/del-js-css-ver.php');
}

//图片处理
if( get_option('superfastseo-addimgclass') ==='1' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/addimgclass.php');
}
if( get_option('superfastseo-rename') ==='1' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/rename.php');
}
if( get_option('superfastseo-compress') ==='2' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/compressimg.php');
}





//清理过滤正文垃圾
if( get_option('superfastseo-filters-htmlcode') ==='1' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/filters-htmlcode.php');
}

//SEO伪原创模板
//正文自定义关键词内链
include_once(SUPERFASTSEO_PLUGIN_DIR . '/functions/addkeywordlink.php');

//后台安全增强
if( get_option('superfastseo-disable-bad-request') ==='1' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/disable-bad-request.php');
}
if( get_option('superfastseo-disable-admin-login') ==='1' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/disable-admin-login.php');
}
if( get_option('superfastseo-return-414') ==='2' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/return-414.php');
}
if( get_option('superfastseo-wp-admin-login-url') ==='3' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/wp-admin-login-url.php');
}
/*
if( get_option('blocking-x-a') ==='4' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/blocking-xss-attack.php');
}*/

//数据库百万级优化query
if( get_option('superfastseo-query-request-100') ==='1' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/dboptimize.php');
}

//禁止空USER_AGENT
if( get_option('superfastseo-no-none-ua') ==='1' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/disable-none-ua.php');
}
//禁止垃圾蜘蛛爬取
if( get_option('superfastseo-no-spider') ==='1' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/disable-spider.php');
}

//修改robots.txt
if( get_option('superfastseo-robots-txt') ==='1' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/robots-txt.php');
}

//百度实时主动推送-普通
if( get_option('superfastseo-baidu-general') ==='1' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/baidu-general-submit.php');
}
?>