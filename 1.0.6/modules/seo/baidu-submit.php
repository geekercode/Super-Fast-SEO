<?php
echo '功能特点：在发布文章时将文章同时提交过去，平时静默不影响性能！&nbsp;&nbsp;<strong><a href = "http://www.geekercode.com/wp/131.html" target="_black">使用教程</a></strong>&nbsp;&nbsp;<strong><a href = "https://www.jizhuti.com/themes/superfastse" target="_black">升级 VIP 获取快速收录功能！</a></strong>';
echo '<hr>';

$options = array(
    'superfastseo-baidu-general',
    'superfastseo-baidu-general-token',
);

foreach( $options as $option  ) {
    
    if( isset($_POST['submit-to-baidu']) && $_POST['submit-to-baidu'] ){
        //过滤并入库
        if(empty($_POST[$option])){
            update_option($option,'0');
        }else{
            update_option($option,sanitize_text_field( $_POST[$option] ));
        }
        
    }
    
}

?>
<form action="" method="POST">
<table class="form-table" role="presentation">
<tbody>

<tr>
<th scope="row"><?php echo esc_html('普通收录');?></th>
<td><input type="checkbox" name="superfastseo-baidu-general" value="1"<?php checked(1,get_option('superfastseo-baidu-general'));?>/><?php echo esc_html('实时主动提交到百度普通收录');?>
<p class="description"><?php echo esc_html('普通收录一般站点均可提交');?></p>
</td>
</tr>
<tr>
<th scope="row"><?php echo esc_html('普通收录令牌');?></th>
<td><input id="baidu-general-token" name="superfastseo-baidu-general-token" type="text" value="<?php echo esc_attr(get_option('superfastseo-baidu-general-token'));?>" placeholder="<?php echo esc_html('填写普通收录TOKEN');?>" style="width:28%;">
</td>
<td>
</td>
</tr>

</tbody>
</table>
<input type="submit" name="submit-to-baidu" id="submit-to-baidu" class="button button-primary" value="<?php echo esc_html('保存更改');?>">
</form>