<?php
$safevset = array(
    'superfastseo-disable-bad-request',
    'superfastseo-disable-admin-login',
    'superfastseo-return-414',
    'superfastseo-wp-admin-login-url',
    'superfastseo-text_one',
    'superfastseo-text_two'
);

foreach( $safevset as $option  ) {
    
    if( isset($_POST['adminsafe']) && $_POST['adminsafe'] ){
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
<th scope="row">阻止非法访问</th>
<td><input type="checkbox" name="superfastseo-disable-bad-request" value="1"<?php checked('1',get_option('superfastseo-disable-bad-request'));?>/>阻止非法访问
<p class="description"></p>
</td>
</tr>
<tr>
<th scope="row">禁用 admin 用户名登录</th>
<td><input type="checkbox" name="superfastseo-disable-admin-login" value="1"<?php checked('1',get_option('superfastseo-disable-admin-login'));?>/>禁用 admin 用户名登录
</td>
</tr>
<tr>
<th scope="row">返回414</th>
<td><input type="checkbox" name="superfastseo-return-414" value="2"<?php checked('2',get_option('superfastseo-return-414'));?>/>返回414错误提示
</td>
</tr>
<tr>
<th scope="row">更改后台登录地址</th>
<td><input type="checkbox" name="superfastseo-wp-admin-login-url" value="3"<?php checked('3',get_option('superfastseo-wp-admin-login-url'));?>/>更改后台wp-admin/wp-login.php登录地址
</td>
<td>
</td>
</tr>
<tr>
<th scope="row"></th>
<td><input id="text_one" name="superfastseo-text_one" type="text" value="<?php echo esc_attr(get_option('superfastseo-text_one'));?>" placeholder="随便填写第一个英文或数字串" style="width:18%;">
</td>
<td>
</td>
</tr>
<tr>
<th scope="row"></th>
<td><input id="text_two" name="superfastseo-text_two" type="text" value="<?php echo esc_attr(get_option('superfastseo-text_two'));?>" placeholder="随便填写第二个英文或数字串" style="width:18%;">
</td>
<td>
</td>
</tr>
<?php 
if( (get_option('superfastseo-text_one') != '' ) && (get_option('superfastseo-text_two') != '' )){
    $safe_login_url = site_url();
    $safe_login_url .= '/wp-login.php?';
    $safe_login_url .= get_option('superfastseo-text_one');
    $safe_login_url .= '=';
    $safe_login_url .= get_option('superfastseo-text_two');
    echo '<tr><th scope="row">后台安全登录地址为：</th><td><code>'.esc_url( $safe_login_url ).'</code></td<tr>';
    unset($safe_login_url);
}
?>

</tbody>
</table>
<input type="submit" name="adminsafe" id="adminsafe" class="button button-primary" value="保存更改">
</form>

<?php

/*
if(isset($_POST['adminsafe']) && $_POST['adminsafe'] ){

    //过滤
    $jztDisBadReq     = sanitize_text_field( $_POST['superfastseo-disable-bad-request'] );
    $jztDisAdminLogin = sanitize_text_field( $_POST['superfastseo-disable-admin-login'] );
    $jztReturn414     = sanitize_text_field( $_POST['superfastseo-return-414'] );
    $jztAdminLoginUrl = sanitize_text_field( $_POST['superfastseo-wp-admin-login-url'] );
    $jztTextOne       = sanitize_text_field( $_POST['superfastseo-text_one'] );
    $jztTextTwo       = sanitize_text_field( $_POST['superfastseo-text_two'] );

    //入库
    update_option('superfastseo-disable-bad-request',$jztDisBadReq);
    update_option('superfastseo-disable-admin-login',$jztDisAdminLogin);
    update_option('superfastseo-return-414',$jztReturn414);
    update_option('superfastseo-wp-admin-login-url',$jztAdminLoginUrl);
    update_option('superfastseo-text_one',$jztTextOne );
    update_option('superfastseo-text_two',$jztTextTwo);
}
*/
?>