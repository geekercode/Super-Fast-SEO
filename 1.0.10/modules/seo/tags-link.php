<?php
$options = array(
    'superfastseo-tags-link',
    'superfastseo-tags-content'
);

foreach( $options as $option  ) {
    
    if( isset($_POST['superfastseo-tags-set']) && $_POST['superfastseo-tags-set'] ){
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
<th scope="row"><?php echo '为文章添加TAGS标签';?></th>
<td>
<input type="checkbox" name="superfastseo-tags-content" value="1"<?php checked(1,get_option('superfastseo-tags-content'));?>/><?php echo '自动为文章添加已使用过的TAGS标签';?>
<p class="description"><?php echo '自动为文章添加已使用过的TAGS标签';?></p>
</td>
</tr>
<tr>
        
<tr>
<th scope="row"><?php echo 'TAGS标签添加内链';?></th>
<td>
<input type="checkbox" name="superfastseo-tags-link" value="1"<?php checked(1,get_option('superfastseo-tags-link'));?>/><?php echo '文章中TAGS标签添加内链';?>
<p class="description"><?php echo '在文章中对出现的TAGS关健词标签添加内链。';?></p>
</td>
</tr>
<tr>

</tbody>
</table>
<input type="submit" name="superfastseo-tags-set" id="superfastseo-tags-set" class="button button-primary" value="<?php echo '保存设置';?>">
</form>
