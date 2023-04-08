<?php
$options = array(
    'superfastseo-disable-autosave',
    'superfastseo-disable-revisions',
    'superfastseo-remove-prefetch',
    'superfastseo-del-auto-updater',
    'superfastseo-del-wp-logo',
    'superfastseo-del-wp-help',
    'superfastseo-del-wp-admin-title',
    'superfastseo-del-wp-site-health',
    'superfastseo-del-wp-generator',
    'superfastseo-del-wp-other',
    'superfastseo-del-wp-avatar',
    'superfastseo-del-wp-api',
    'superfastseo-del-wp-head',
    'superfastseo-wp-front-lang',
    'superfastseo-del-Gutenberg',
    'superfastseo-del-category-url',
    'superfastseo-search-link',
    'superfastseo-del-css-class',
    'superfastseo-del-js-css-ver'
);
foreach( $options as $option  ) {

        if(isset($_POST['baseoptimize']) && $_POST['baseoptimize'] ){
            if( empty( $_POST[$option] ) ){
                update_option($option,'0');
            }else{
            //过滤并入库
            update_option($option,sanitize_text_field( $_POST[$option] ));                
            }
        }

}

?>

<form action="" method="POST">
<table class="form-table" role="presentation">
<tbody>
<tr>
<th scope="row">禁止自动保存</th>
<td><input type="checkbox" name="superfastseo-disable-autosave" value="1"<?php checked('1',get_option('superfastseo-disable-autosave'));?>/>禁止自动保存草稿功能
</td>
</tr>

<tr>
<th scope="row">禁用修订版本</th>
<td><input type="checkbox" name="superfastseo-disable-revisions" value="1"<?php checked('1',get_option('superfastseo-disable-revisions'));?>/>禁用所有文章类型的修订版本
</td>
</tr>

<tr>
<th scope="row">禁用s.w.org</th>
<td><input type="checkbox" name="superfastseo-remove-prefetch" value="2"<?php checked('2',get_option('superfastseo-remove-prefetch'));?>/>禁用s.w.org的加载
</td>
</tr>

<tr>
<th scope="row">关闭自动更新</th>
<td><input type="checkbox" name="superfastseo-del-auto-updater" value="3"<?php checked('3',get_option('superfastseo-del-auto-updater'));?>/>关闭自动更新/关闭更新检查定时作业/停用版本更新通知/禁止更新检查、提示/移除更新菜单
</td>
</tr>

<tr>
<th scope="row">移除wp logo</th>
<td><input type="checkbox" name="superfastseo-del-wp-logo" value="4"<?php checked('4',get_option('superfastseo-del-wp-logo'));?>/>移除后台左上角wp logo
</td>
</tr>

<tr>
<th scope="row">移除后台右上角帮助</th>
<td><input type="checkbox" name="superfastseo-del-wp-help" value="5"<?php checked('5',get_option('superfastseo-del-wp-help'));?>/>移除后台右上角帮助下拉按钮
</td>
</tr>

<tr>
<th scope="row">去掉后台标题</th>
<td><input type="checkbox" name="superfastseo-del-wp-admin-title" value="6"<?php checked('6',get_option('superfastseo-del-wp-admin-title'));?>/>去掉后台WordPress的标题
</td>
</tr>

<tr>
<th scope="row">移除站点健康小工具</th>
<td><input type="checkbox" name="superfastseo-del-wp-site-health" value="7"<?php checked('7',get_option('superfastseo-del-wp-site-health'));?>/>去掉后台WordPress站点健康小工具
</td>
</tr>

<tr>
<th scope="row">移除WP版本号</th>
<td><input type="checkbox" name="superfastseo-del-wp-generator" value="8"<?php checked('8',get_option('superfastseo-del-wp-generator'));?>/>去掉后台 WordPress 版本号
</td>
</tr>

<tr>
<th scope="row">移除仪表盘其他模块</th>
<td><input type="checkbox" name="superfastseo-del-wp-other" value="9"<?php checked('9',get_option('superfastseo-del-wp-other'));?>/>移除'快速发布/近期草稿/开发日志/新闻活动/概况/评论'
</td>
</tr>

<tr>
<th scope="row">禁用avatar头像</th>
<td><input type="checkbox" name="superfastseo-del-wp-avatar" value="10"<?php checked('10',get_option('superfastseo-del-wp-avatar'));?>/>禁用默认gravatar头像，并用插件自带头像替换,切不可使用任何第三方加速!
</td>
</tr>

<tr>
<th scope="row">API 优化</th>
<td><input type="checkbox" name="superfastseo-del-wp-api" value="11"<?php checked('11',get_option('superfastseo-del-wp-api'));?>/>禁用'XML-RPC接口、pingbacks、 enclosures、 trackbacks/关闭 pingback/去掉 _encloseme 和 do_ping 操作/禁用 REST API/验证 REST API '
</td>
</tr>

<tr>
<th scope="row">wp_head精简、移除</th>
<td><input type="checkbox" name="superfastseo-del-wp-head" value="12"<?php checked('12',get_option('superfastseo-del-wp-head'));?>/>移除"admin Bar、RSD LINK、wlwmanifest、Feed link、日志链接、shortlink、WP RSET API、短链接、Link 标签、Emoji、wp-json"
</td>
</tr>


<tr>
<th scope="row">字体及语言包</th>
<td><input type="checkbox" name="superfastseo-wp-front-lang" value="14"<?php checked('14',get_option('superfastseo-wp-front-lang'));?>/>移除 front/不加载语言包/移除中文包无用代码
</td>
</tr>

<tr>
<th scope="row">禁用古腾宝编辑器</th>
<td><input type="checkbox" name="superfastseo-del-Gutenberg" value="15"<?php checked('15',get_option('superfastseo-del-Gutenberg'));?>/>禁用古腾宝编辑器，使用原来的编辑器
</td>
</tr>

<tr>
<th scope="row">移除分类 category </th>
<td><input type="checkbox" name="superfastseo-del-category-url" value="16"<?php checked('16',get_option('superfastseo-del-category-url'));?>/>移除分类 category，美化URL、SEO更友好
</td>
</tr>

<tr>
<th scope="row">搜索URL静态化</th>
<td><input type="checkbox" name="superfastseo-search-link" value="17"<?php checked('17',get_option('superfastseo-search-link'));?>/>修改搜索结果的链接为："/search/",搜索结果排除所有页面,搜索关键词为空 跳转到首页
</td>
</tr>

<tr>
<th scope="row">删除菜单多余css class</th>
<td><input type="checkbox" name="superfastseo-del-css-class" value="18"<?php checked('18',get_option('superfastseo-del-css-class'));?>/>删除菜单多余的css class样式
</td>
</tr>

<tr>
<th scope="row">删除JS/CSS后面带的版本号</th>
<td><input type="checkbox" name="superfastseo-del-js-css-ver" value="19"<?php checked('19',get_option('superfastseo-del-js-css-ver'));?>/>删除JS/CSS后面带的版本号，如xxx.js?ver=3.5.1应加载为 xxx.js
</td>
</tr>



</tbody>
</table>
<input type="submit" name="baseoptimize" id="baseoptimize" class="button button-primary" value="保存更改">
</form>