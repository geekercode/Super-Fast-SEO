<?php
$options = array(
    'superfastseo-robots-txt',
    //'superfastseo-robots-html'
);

foreach( $options as $option  ) {
    
    if( isset($_POST['superfastseo-robots-set']) && $_POST['superfastseo-robots-set'] ){
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
<th scope="row"><?php echo esc_html('生成 robots.txt');?> </th>
<td>
<input type="checkbox" name="superfastseo-robots-txt" value="1"<?php checked(1,get_option('superfastseo-robots-txt'));?>/><?php echo esc_html('生成 robots.txt 文件。');?>
<p class="description"><?php echo esc_html('打勾开启；自动生成，不影响性能。');?></p>
</td>
</tr>
<tr>

</tbody>
</table>
<input type="submit" name="superfastseo-robots-set" id="superfastseo-robots-set" class="button button-primary" value="<?php echo esc_html('保存设置');?>">
</form>
<?php
//生成网站地图HTML
if( get_option('superfastseo-robots-txt') ==='1' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/robots-txt.php');
}
?>