<?php
$options = array(
    'superfastseo-sitemap-xml',
    //'superfastseo-sitemap-html'
);

foreach( $options as $option  ) {
    
    if( isset($_POST['superfastseo-sitemap-set']) && $_POST['superfastseo-sitemap-set'] ){
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
<th scope="row"><?php echo esc_html('生成网站地图 XML 格式');?></th>
<td>
<input type="checkbox" name="superfastseo-sitemap-xml" value="1"<?php checked(1,get_option('superfastseo-sitemap-xml'));?>/><?php echo esc_html('实时生成 XML 格式的网站地图。');?>
<p class="description"><?php echo esc_html('打勾开启；实时生成，没有缓存文件无需手动更新，不影响性能。');?></p>
</td>
</tr>
<tr>
    
</tbody>
</table>
<input type="submit" name="superfastseo-sitemap-set" id="superfastseo-sitemap-set" class="button button-primary" value="<?php echo esc_html('保存更改');?>">
</form>
<?php
//生成网站地图HTML
if( get_option('superfastseo-sitemap-xml') ==='1' ){
    include(SUPERFASTSEO_PLUGIN_DIR . '/functions/sitemap-xml.php');
}
?>