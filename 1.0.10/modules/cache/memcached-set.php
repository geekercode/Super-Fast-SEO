<?php
$options = array(
    'superfastseo-memcached',
);

foreach( $options as $option  ) {
    
    if( isset($_POST['superfastseo-memcached-cache']) && $_POST['superfastseo-memcached-cache'] ){
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
<th scope="row">配置 memcached 缓存</th>
<td>
<input type="checkbox" name="superfastseo-memcached" value="1"<?php checked(1,get_option('superfastseo-memcached'));?>/>配置 WordPress 使其支持 Memcached 缓存。
<p class="description">打勾开启；自动生成，加速性能。</p>
</td>
</tr>
<tr>

</tbody>
</table>
<input type="submit" name="superfastseo-memcached-cache" id="superfastseo-memcached-cache" class="button button-primary" value="保存设置">
</form>
<?php

?>