<?php
$options = array(
    'superfastseo-from-name',
    'superfastseo-smtp-host-name',
    'superfastseo-smtp-port',
    'superfastseo-mail-username',
    'superfastseo-smtp-pd',
    'superfastseo-smtp-mail-name',
    'superfastseo-smtp-class'
);

foreach( $options as $option  ) {
    
    if( isset($_POST['superfastseo-smtp-set']) && $_POST['superfastseo-smtp-set'] ){
        //过滤并入库
        if(empty($_POST[$option])){
            
        }else{
            update_option($option,sanitize_text_field( $_POST[$option] ));
        }
        
    }
    
}


?>
<form action="" method="POST">
    <table class="form-table">
        <tbody>
            
            <tr><th scope="row"><label><?php echo '发件人名称：';?></label></th>
            <td>
             <input id="superfastseo-from-name" name="superfastseo-from-name" type="text" value="<?php echo esc_attr(get_option('superfastseo-from-name'));?>" style="width:38%;">
            </td>
            </tr>
            
            <tr><th scope="row"><label><?php echo 'SMTP服务器：';?></label></th>
            <td>
                <input id="superfastseo-smtp-host-name" name="superfastseo-smtp-host-name" type="text" value="<?php echo esc_attr(get_option('superfastseo-smtp-host-name'));?>" style="width:38%;">
            </td>
            </tr>
    
            <tr><th scope="row"><label><?php echo 'SMTP端口：';?></label></th>
            <td>
                <input id="superfastseo-smtp-port" name="superfastseo-smtp-port" type="text" value="<?php echo esc_attr(get_option('superfastseo-smtp-port'));?>" style="width:38%;">
            </td>
            </tr>

            <tr><th scope="row"><label><?php echo '邮箱账户：';?></label></th>
            <td>
                <input id="superfastseo-mail-username" name="superfastseo-mail-username" type="text" value="<?php echo esc_attr(get_option('superfastseo-mail-username'));?>" style="width:38%;">
            </td>
            </tr>

            <tr><th scope="row"><label><?php echo 'STMP邮箱密码：';?></label></th>
            <td>
                <input id="superfastseo-smtp-pd" name="superfastseo-smtp-pd" type="text" value="<?php echo esc_attr(get_option('superfastseo-smtp-pd'));?>" style="width:38%;">
                </td>
            </tr>

            <tr><th scope="row"><label><?php echo '你的邮箱：';?></label></th>
            <td>
                <input id="superfastseo-smtp-mail-name" name="superfastseo-smtp-mail-name" type="text" value="<?php echo esc_attr(get_option('superfastseo-smtp-mail-name'));?>" style="width:38%;">
            </td>
            </tr>

            <tr><th scope="row"><label><?php echo '邮箱端口类型：';?></label></th>
            <td>
                <input id="superfastseo-smtp-class" name="superfastseo-smtp-class" type="text" value="<?php echo esc_attr(get_option('superfastseo-smtp-class'));?>" style="width:38%;">
            </td>
            </tr>
    
</tbody>
</table>
<br><hr>
<input type="submit" name="superfastseo-smtp-set" class="button" value="<?php echo '保存';?>">

</form>