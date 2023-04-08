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

add_action('phpmailer_init', 'superfastseo_mail_smtp');
function superfastseo_mail_smtp( $phpmailer ) {
   //设置
    $phpmailer->FromName = esc_attr(get_option('superfastseo-from-name')); //发件人
    $phpmailer->Host = esc_attr(get_option('superfastseo-smtp-host-name')); //修改为你使用的SMTP服务器
    $phpmailer->Port = esc_attr(get_option('superfastseo-smtp-port')); //SMTP端口，开启了SSL加密
    $phpmailer->Username = esc_attr(get_option('superfastseo-mail-username')); //邮箱账户   
    $phpmailer->Password = esc_attr(get_option('superfastseo-smtp-pd')); //输入你对应的邮箱密码，这里使用了*代替
    $phpmailer->From = esc_attr(get_option('superfastseo-smtp-mail-name')); //你的邮箱   
    $phpmailer->SMTPAuth = true;
    $phpmailer->CharSet = 'UTF-8';               //设置邮件的字符编码，这很重要，不然中文乱码
    $phpmailer->SMTPSecure = esc_attr(get_option('superfastseo-smtp-class')); //tls or ssl （port=25留空，465为ssl）
    $phpmailer->IsSMTP();
}
?>