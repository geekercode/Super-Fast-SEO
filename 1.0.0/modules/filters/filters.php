<?php
//过滤入库
if( isset($_POST['superfastseo-filters-html'] ) && $_POST['superfastseo-filters-html'] ){
    
    if( empty( $_POST['superfastseo-filters-htmlcode'] ) ){
        update_option('superfastseo-filters-htmlcode','0');
    }else{
        update_option('superfastseo-filters-htmlcode',sanitize_text_field( $_POST['superfastseo-filters-htmlcode'] ));
    }
    
}
?>
<form action="" method="POST">
<table class="form-table" role="presentation">
<tbody>
    
<tr>
<th scope="row">清理过滤正文垃圾</th>
<td><input type="checkbox" name="superfastseo-filters-htmlcode" value="1"<?php checked('1',get_option('superfastseo-filters-htmlcode'));?>/>文章发布前清理、过滤HTML垃圾代码！
<p class="description"></p>
</td>
</tr>

</tbody>
</table>
<input type="submit" name="superfastseo-filters-html" id="superfastseo-filters-html" class="button button-primary" value="保存更改">
</form>