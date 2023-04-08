<?php
	$id=get_the_ID();
	$val=get_post_meta($id,'_superfast_singular_meta',true);	
	$title='title';
	$keywords='keywords';
	$description='description';
	$metas='code';
?>
<form action="" method="post">
<p>
	<label for="<?php echo esc_attr($title); ?>_meta" style="display:block;padding-bottom:10px;"><b><?php echo esc_html('自定义标题');?></b></label>
    <?php $val_title = isset($val['title']) ? $val['title'] : ''; ?>
	<input type="text" name="<?php echo esc_attr($title); ?>" id="<?php echo esc_attr($title); ?>_meta" value="<?php echo esc_attr($val_title); ?>" size="120" />
</p>

<p style="clear:both">
	<label for="<?php echo esc_attr($keywords); ?>" style="display:block;padding-bottom:10px;"><b><?php echo esc_html('设置关键词');?></b></label>
    <?php $val_keywords = isset($val['keywords']) ? $val['keywords'] : ''; ?>
	<input type="text" name="<?php echo esc_attr($keywords); ?>" id="<?php echo esc_attr($keywords); ?>" value="<?php echo esc_attr($val_keywords); ?>" size="120" />
</p>
<p>
	<label for="<?php echo esc_attr($description); ?>" style="display:block;padding-bottom:10px;" ><b><?php echo esc_html('自定义描述');?></b></label>
    <?php $val_description = isset($val['description']) ? $val['description'] : ''; ?>
	<textarea name="<?php echo esc_attr($description); ?>" id="<?php echo esc_attr($description); ?>" cols="120" rows="3"><?php echo esc_attr($val_description); ?></textarea>
</p>
<p>
	<label for="<?php echo esc_attr($metas); ?>" style="display:block;padding-bottom:10px;"><b><?php echo esc_html('Metas（非必填）');?></b></label>
    <?php $val_code = isset($val['code']) ? $val['code'] : ''; ?>
	<textarea name="<?php echo esc_attr($metas); ?>" id="<?php echo esc_attr($metas); ?>" cols="120" rows="1"><?php echo esc_attr($val_code); ?></textarea>
</p>
	<input type="hidden" name="meta_save" value="on"/>
</form>