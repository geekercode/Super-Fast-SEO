<?php 
$title='cat_page_title';
$key='cat_keywords';
$des='cat_description';
$metas='cat_metas';
$val=get_option('cat_meta_key_'.sanitize_text_field($_GET['tag_ID']));
?>
<h3><?php echo esc_html('分类目录SEO设置');?></h3>
<table class="form-table">
	<tbody>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="<?php echo esc_attr($title); ?>"><?php echo esc_html('自定义标题');?></label></th>
			<td><input name="<?php echo esc_attr($title); ?>" id="<?php echo esc_attr($title); ?>" type="text" value="<?php echo esc_attr(stripslashes($val['page_title'])); ?>" size="30"></td>
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="<?php echo esc_attr($key); ?>"><?php echo esc_html('设置关键词');?></label></th>
			<td><input name="<?php echo esc_attr($key); ?>" id="<?php echo esc_attr($key); ?>" type="text" value="<?php echo esc_attr($val['metakey']); ?>" size="40"></td>
		</tr>		
		<tr class="form-field">
			<th scope="row" valign="top"><label for="<?php echo esc_attr($des); ?>"><?php echo esc_html('自定义描述');?></label></th>
			<td><textarea name="<?php echo esc_attr($des); ?>" id="<?php echo esc_attr($des); ?>" rows="5" cols="50" style="width: 97%;"><?php echo esc_attr(stripslashes($val['description'])); ?></textarea></td>
		</tr>
		<tr class="form-field">
			<th scope="row" valign="top"><label for="<?php echo esc_attr($metas); ?>"><?php echo esc_html('Metas（非必填）');?></label></th>
			<td><textarea name="<?php echo esc_attr($metas); ?>" id="<?php echo esc_attr($metas); ?>" rows="1" cols="50" style="width: 97%;"><?php echo esc_attr(stripslashes($val['metas'])); ?></textarea></td>
		</tr>	
	</tbody>
</table>