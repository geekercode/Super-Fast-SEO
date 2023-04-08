<?php
$options = array(
    'superfastseo-no-none-ua',
    'superfastseo-no-spider'
);

foreach( $options as $option  ) {
    
    if( isset($_POST['no-none-ua']) && $_POST['no-none-ua'] ){
        //过滤并入库
        if(empty($_POST[$option])){
            update_option($option,'0');
        }else{
            update_option($option,sanitize_text_field( $_POST[$option] ));
        }
        
    }
    
}

/*
if( $_POST['no-none-ua'] ){

    //过滤并入库
    update_option('superfastseo-no-none-ua', $_POST['superfastseo-no-none-ua']);

    //过滤并入库
    update_option('superfastseo-no-spider', $_POST['superfastseo-no-spider']);

        
}
*/
?>
<form action="" method="POST">
<table class="form-table" role="presentation">
<tbody>

<tr>
<th scope="row"><?php echo esc_html('禁止空USER_AGENT');?></th>
<td>
<input type="checkbox" name="superfastseo-no-none-ua" value="1"<?php checked(1,get_option('superfastseo-no-none-ua'));?>/><?php echo esc_html('禁止空USER_AGENT提高安全性。');?>
<p class="description"><?php echo esc_html('主流采集程序都是空USER_AGENT，部分sql注入工具也是空USER_AGENT');?></p>
</td>
</tr>
<tr>
    
<tr>
<th scope="row"><?php echo esc_html('禁止垃圾蜘蛛爬取');?></th>
<td><input type="checkbox" name="superfastseo-no-spider" value="1"<?php checked(1,get_option('superfastseo-no-spider'));?>/><?php echo esc_html('禁止垃圾蜘蛛爬取节约CPU、内存、带宽');?>
<p class="description"><?php echo esc_html('垃圾蜘蛛：爬了也不收录，收录了也没流量，爬取的不一定是搜索引擎。');?></p>
</td>
</tr>
<tr>

</tbody>
</table>
<input type="submit" name="no-none-ua" id="no-none-ua" class="button button-primary" value="<?php echo esc_html('保存更改');?>">
</form>
