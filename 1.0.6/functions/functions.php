<?php
/*
 * ------------------------------------------------------------------------------
 * 功能：Super Fast SEO插件公用函数
 * 作者：jizhuti.com 
 * 官网：https://www.jizhuti.com/
 * 联系：QQ：77103588  微信：xoyoso
 * 说明：函数调用
 * ------------------------------------------------------------------------------
 */

function superfastseo_add_robots_rewrite($outputrobots){
    $outputrobots = "User-agent: *\n";
    $outputrobots .="Disallow: *?*\n";
    $outputrobots .="Disallow: /wp-admin/\n";
    $outputrobots .="Disallow: /wp-includes/\n";
    $outputrobots .="Disallow: /wp-content/cache\n";
    $outputrobots .="Disallow: /wp-content/themes/*\n";
    $outputrobots .="Disallow: /wp-content/plugins/*\n";
    $outputrobots .="Disallow: /trackback\n\n";
    $outputrobots .="Allow: /wp-admin/admin-ajax.php\n\n";
    $outputrobots .="Sitemap: ".site_url()."/wp-sitemap.xml\n";
    
    return $outputrobots;
}

function Md5Files($filenamesource,$filenamedest){
    $sourcefile = md5_file($filenamesource);
    $destfile   = md5_file($filenamedest);
    if($sourcefile == $destfile){
        return  true;
    }else{
        return  false;
    }
}


?>