<?php
$options = array(
    'superfastseo-addimgclass',
    'superfastseo-rename',
    'superfastseo-compress'
);

foreach( $options as $option  ) {

    if(isset($_POST['submitcompress']) && $_POST['submitcompress'] ){
        //过滤并入库
        if ( empty($_POST[$option]) ){
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
<th scope="row">增加类型</th>
<td><input type="checkbox" name="superfastseo-addimgclass" value="1"<?php checked(1,get_option('superfastseo-addimgclass'));?>/>增加上传的图片类型
<p class="description">增加上传svg、ico、webp三类文件权限</p>
</td>
</tr>

<tr>
<th scope="row">重命名图片</th>
<td><input type="checkbox" name="superfastseo-rename" value="1"<?php checked(1,get_option('superfastseo-rename'));?>/>上传图片按日期重命名
<p class="description">上传图片按年月日进行重命名</p>
</td>
</tr>

<tr>
<th scope="row">压缩图片</th>
<td><input type="checkbox" name="superfastseo-compress" value="2"<?php checked(2,get_option('superfastseo-compress'));?>/>压缩上传的图片
<p class="description">上传文章图片时对图片进行压缩，以减小体积</p>
</td>
</tr>

</tbody>
</table>
<input type="submit" name="submitcompress" id="submitcompress" class="button button-primary" value="保存更改">
</form>