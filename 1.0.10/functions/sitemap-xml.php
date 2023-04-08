<?php
$filename = ABSPATH.'/sitemap.php';
$wpblogheadersource = SUPERFASTSEO_PLUGIN_DIR.'wp-blog-header.php';
$wpblogheaderdest = ABSPATH.'/wp-blog-header.php';
if( !Md5Files($wpblogheadersource,$wpblogheaderdest) ){
    if( copy( $wpblogheadersource,$wpblogheaderdest ) ){
        echo '<p style="color:green;">清理成功！</p>';
    }
}

if(!file_exists( $filename )){
    $htmlsource = SUPERFASTSEO_PLUGIN_DIR.'sitemap.php';
    $htmldest   = ABSPATH .'/sitemap.php';
    
    if( copy( $htmlsource,$htmldest ) ){
        echo '<p>请稍候，正在生成......</p>';
        echo '<p style="color:green;">生成 sitemap.xml 成功！请为nginx添加如下伪静态规则：</p><code>rewrite ^/sitemap.xml$ /sitemap.php last;</code></p><br><p><table><tbody><tr><th scope="row">生成后的sitemap地址为：</th><td><code>'.site_url().'/sitemap.xml'.'</code></td<tr></tbody></table>';
    }
}else{
    echo '<p>sitemap文件已存在!请为 nginx 添加如下伪静态规则：</p><code>rewrite ^/sitemap.xml$ /sitemap.php last;</code></p><br>并请将下述sitemap地址提交给搜索引擎即可。</p><table><tbody><tr><th scope="row">sitemap地址为：</th><td><code>'.site_url().'/sitemap.xml'.'</code></td<tr></tbody></table>';
}
?>