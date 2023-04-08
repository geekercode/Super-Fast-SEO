<?php
date_default_timezone_set('Asia/Shanghai'); 
add_action('publish_post', 'publish_bd_general_submit', 999);
//add_action('save_post', 'publish_bd_general_submit', 99);
function publish_bd_general_submit($post_ID){ 
    global $post;
    $bd_general_submit_enabled = true;

    if($bd_general_submit_enabled){
    $api ='http://data.zz.baidu.com/urls?site=';
    $api .= site_url().'&token=';
    $api .= esc_attr(get_option('superfastseo-baidu-general-token'));
        if($post->post_status != "publish"){
        $url = get_permalink($post_ID);
        $ch = curl_init();
        $options = array(
            CURLOPT_URL => $api,
            CURLOPT_POST => true,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POSTFIELDS => $url,
            CURLOPT_HTTPHEADER => array('Content-Type: text/plain')
        );
        curl_setopt_array($ch, $options);
        $result = curl_exec($ch);
        // $result = json_decode($result, true);
        //如果推送成功则在文章新增自定义栏目Baidusubmit，值为推送成功
        if($result['success']){
            add_post_meta($post_ID, 'Baidusubmit', 推送成功, true);
        }
        if($result['message']){
           add_post_meta($post_ID, 'Baidusubmit', 推送失败, true);
        }
        $time = time();
      
        $file = WP_CONTENT_DIR.'/BaiduGeneralSubmit.txt';//生成日志文件
        //$file = dirname(__FILE__).'/generabaiduSubmit.txt';//生成日志文件,与代码所处文件同目录
        if(date('Y-m-d',filemtime($file)) != date('Y-m-d')){
            $handle = fopen($file,"w");
        }else{
            $handle = fopen($file,"a");
        }
        $resultMessage="";
        if($result['message']){
            $resultMessage= date('Y-m-d G:i:s',$time)."\n提交失败".$result['message'].":\n网址：".$url."\n\n".$result;
        }
        if($result['success']){
            $resultMessage= date('Y-m-d G:i:s',$time)."\n提交成功".":".$url."\n\n";
        }
        fwrite($handle,$resultMessage);
        fclose($handle);
        }
    }
}

?>