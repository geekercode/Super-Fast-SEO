<?php
//获取UA信息,转为小写
$userAgent = strtolower($_SERVER['HTTP_USER_AGENT']);
//将恶意USER_AGENT存入数组
$spider_ua = array(
    'FeedDemon','BOT/0.1 (BOT for JCE)','CrawlDaddy ','Java','Feedly','UniversalFeedParser','ApacheBench','Swiftbot','ZmEu','Indy Library','oBot','jaunty','YandexBot','AhrefsBot','YisouSpider','jikeSpider','MJ12bot','WinHttp','EasouSpider','HttpClient','Microsoft URL Control','YYSpider','jaunty','Python-urllib','lightDeckReports Bot'
);

if( $userAgent !== '' ){
    foreach($spider_ua as $value ){
        $value = strtolower($value);
        //判断是否是数组中存在的UA
        if( strpos($userAgent,$value) !== false ) {

            header("Content-type: text/html; charset=utf-8");
            wp_die('请联系网站管理中获取许可！');

        }
    }
}
?>