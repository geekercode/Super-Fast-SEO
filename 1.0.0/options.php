<?php
/*
 * 挂载到管理主菜单,按需扩展添加
 */
//add_action('admin_menu', 'superfastseo_admin_menu', 90);
add_action('admin_menu','superfastseo_admin_menu');
function superfastseo_admin_menu(){
    //主菜单
    add_menu_page(
        '关于SuperFastSEO插件','SuperFastSEO','administrator','superfastseo','superfastseo_admin_menu_callback', '',90
    );
    //子菜单
    add_submenu_page(
        'superfastseo','后台基础优化','基础优化','administrator','baseoptimize','superfastseo_optimize_menu_callback'
    );
    add_submenu_page(
        'superfastseo','正文过滤HTML垃圾代码','过滤HTML垃圾代码','administrator','articlefilters','superfastseo_articlefilters_menu_callback'
    );
    add_submenu_page(
        'superfastseo','伪原创模板','SEO伪原创模板','administrator','rewritetheme','superfastseo_rewritetheme_menu_callback'
    );
    add_submenu_page(
        'superfastseo','正文自定义关健词内链','自定义关健词内链','administrator','keywordlink','superfastseo_keywordlink_menu_callback'
    );
    add_submenu_page(
        'superfastseo','自定义关健词替换，给旧文章添加内链','指定文章添加内链','administrator','keyword_link','superfastseo_keyword_link_menu_callback'
    );
    add_submenu_page(
        'superfastseo','上传图片压缩、重命名','图片压缩处理','administrator','imgcompress','superfastseo_imgcompress_menu_callback'
    );

    add_submenu_page(
        'superfastseo','数据库查询优化【让WP支持百万级数据】','数据库查询优化','administrator','dboptimize','superfastseo_dboptimize_menu_callback'
    );
    add_submenu_page(
        'superfastseo','WordPress后台安全增强','后台安全增强','administrator','adminsafe','superfastseo_adminsafe_menu_callback'
    );
    add_submenu_page(
        'superfastseo','SEO TDK优化设置','SEO TDK优化','administrator','superfast_meta','superfastSEO_meta_menu_page_form'
    );
}

//回调
function superfastseo_admin_menu_callback(){
    echo '<h2>Super Fast SEO插件介绍</h2>'; 
    echo '<hr>';
    include_once('readme.php');
}

function superfastseo_articlefilters_menu_callback(){
    echo '<h2>文章发布前清理、过滤HTML垃圾代码</h2><strong><a href = "http://www.geekercode.com/wp/126.html" target="_black">使用教程</a></strong>'; 
    echo '<hr>';
    include_once(SUPERFASTSEO_PLUGIN_DIR . '/modules/filters/filters.php');
}
function superfastseo_optimize_menu_callback(){
    echo '<h2>后台基础优化【加速、禁用、移除】</h2><strong><a href = "http://www.geekercode.com/wp/125.html" target="_black">使用教程</a></strong>'; 
    echo '<hr>';
    include_once(SUPERFASTSEO_PLUGIN_DIR . '/modules/optimize/optimize.php');
}
function superfastseo_rewritetheme_menu_callback(){
    echo '<h2>SEO伪原创模板</h2>'; 
    echo '<hr>';
    include_once(SUPERFASTSEO_PLUGIN_DIR . '/modules/seo/rewritetheme.php');
}
function superfastseo_keywordlink_menu_callback(){
    echo '<h2>自定义正文关键词内链</h2>'; 
    echo '<hr>';
    include_once(SUPERFASTSEO_PLUGIN_DIR . '/modules/link/keywordlink.php');
}
function superfastseo_keyword_link_menu_callback(){
    echo '<h2>指定文章添加内链</h2>'; 
    echo '<hr>';
    include_once(SUPERFASTSEO_PLUGIN_DIR . '/modules/link/keyword-link.php');
}
function superfastseo_imgcompress_menu_callback(){
    echo '<h2>上传图片压缩、重命名</h2><strong><a href = "http://www.geekercode.com/wp/127.html" target="_black">使用教程</a></strong>'; 
    echo '<hr>';
    include_once(SUPERFASTSEO_PLUGIN_DIR . '/modules/compress/compress.php');
}

function superfastseo_dboptimize_menu_callback(){
    echo '<h2>数据库查询优化【让WP支持百万级数据】</h2><strong><a href = "http://www.geekercode.com/wp/128.html" target="_black">使用教程</a></strong>'; 
    echo '<hr>';
    include_once(SUPERFASTSEO_PLUGIN_DIR . '/modules/db/database.php');
}
function superfastseo_adminsafe_menu_callback(){
    echo '<h2>WordPress后台安全增强</h2><strong><a href = "http://www.geekercode.com/wp/129.html" target="_black">使用教程</a></strong>'; 
    echo '<hr>';
    include_once(SUPERFASTSEO_PLUGIN_DIR . '/modules/safe/safe.php');
}
function superfastSEO_meta_menu_page_form(){
    include_once(SUPERFASTSEO_PLUGIN_DIR . '/modules/seo/meta-form.php');
}
?>