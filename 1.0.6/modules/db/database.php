<?php
//过滤并入库
if( isset( $_POST['superfastseo-database-query-optimize'] ) && $_POST['superfastseo-database-query-optimize']){
    
    if( empty( $_POST['superfastseo-query-request-100'] ) ){
        update_option('superfastseo-query-request-100','0');
    }else{
        update_option('superfastseo-query-request-100',sanitize_text_field( $_POST['superfastseo-query-request-100'] ));
    }
    
}
?>
<form action="" method="POST">
<table class="form-table" role="presentation">
<tbody>
    
<tr>
<th scope="row">数据库百万级查询优化</th>
<td><input type="checkbox" name="superfastseo-query-request-100" value="1"<?php checked('1',get_option('superfastseo-query-request-100'));?>/>通过重构优化数据库查询，使 WordPress 轻松突破百万级数据！
<p class="description"></p>
</td>
</tr>

</tbody>
</table>
<input type="submit" name="superfastseo-database-query-optimize" id="superfastseo-database-query-optimize" class="button button-primary" value="保存更改">
</form>