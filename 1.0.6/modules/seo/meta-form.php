<?php
	$title = 'superfastseo_home_title';
	$keywords = 'superfastseo_home_keywords';
	$description = 'superfastseo_home_description';
	$metas = 'superfastseo_home_metas';	
	$auto_des = 'superfast_auto_description';
	$auto_des_num = 'superfast_auto_description_num';
	$tag = 'superfast_auto_keywords';
	$suffix = 'superfastseo_title_suffix';
	$page_num = 'superfastseo_title_paged';
	$sep = 'superfastseo_title_sep';
	
	if( isset($_POST['update_index_meta']) && $_POST['update_index_meta'] ){
		$val=array(
			$title => isset($_POST[$title]) ? sanitize_text_field($_POST[$title]) : '',
			$keywords => isset($_POST[$keywords]) ? sanitize_text_field($_POST[$keywords]) : '',
			$description => isset($_POST[$description]) ? sanitize_text_field($_POST[$description]) : '',
			$metas => isset($_POST[$metas]) ? sanitize_text_field($_POST[$metas]) : '',
			$auto_des => isset($_POST[$auto_des]) ? sanitize_text_field($_POST[$auto_des]) : '',
			$auto_des_num => isset($_POST[$auto_des_num]) ? sanitize_text_field($_POST[$auto_des_num]) : '',
			$tag => isset($_POST[$tag]) ? sanitize_text_field($_POST[$tag]) : '',
			$sep => isset($_POST[$sep]) ? sanitize_text_field($_POST[$sep]) : '',
			$suffix => isset($_POST[$suffix]) ? sanitize_text_field($_POST[$suffix]) : '',
			$page_num => isset($_POST[$page_num]) ? sanitize_text_field($_POST[$page_num]) : ''
		);
		update_option('superfastseo_options',$val);
	}
	
?>

<style type="text/css">
#container{width:98%;border:solid 1px #ddd;float:left;padding:0 0 20px 30px;background-color:#fff;-webkit-box-shadow:0 1px 1px 0 rgba(0,0,0,.1);box-shadow:0 1px 1px 0 rgba(0,0,0,.1)}.hidden{display:none}h3{background-color:#CCC;padding:5px}#function{background-color:#fff;border-left:3px solid #005aff;text-indent:8px;font-weight:bold;}textarea{width:600px;height:158px}.wrap h2{margin-bottom:20px;}
</style>

<script type="text/javascript">
	jQuery(document).ready(function($){
		$('.on:radio').click(function(){
			$(this).nextAll('.toggle').fadeIn('slow');
		});
		$('.off:radio').click(function(){
			$(this).nextAll('.toggle').fadeOut('slow');
		});		
	});
</script>

<div class="wrap">

	<div id="icon-options-general" class="icon32"><br></div>
	
	<div id="container">
	    <h1 style="font-weight:bold;"><?php echo esc_html('SEO TDK优化设置');?></h1>
	    <p><strong style="color:red;"><?php echo esc_html('注意：如果主题已有SEO的TDK功能，请只开启一种即可！要设置分类、标签、文章页的TDK功能，请去相关页面点编辑拉到最下方即可见！');?></strong><strong><a href = "http://www.geekercode.com/wp/130.html" target="_black"><?php echo esc_html('使用教程');?></a></strong></p>
	<form action="" method="post">
		<div id="feature">
			<h3 id="function"><?php echo esc_html('全局SEO功能设定');?></h3>
			<?php $value=get_option('superfastseo_options');?>
				<p>
					<label for="<?php echo esc_attr($auto_des); ?>"><strong><?php echo esc_html('自动获取文章内容作为文章description标签：');?></strong></label></p>
					<p><input class="on" type="radio" name="<?php echo esc_attr($auto_des); ?>" id="<?php echo esc_attr($auto_des); ?>" value="on" <?php echo esc_attr(($value[$auto_des])=='on') ? 'checked' : ''; ?>/><?php echo esc_html('开启');?> 
					<input class="off" type="radio" name="<?php echo esc_attr($auto_des); ?>" id="<?php echo esc_attr($auto_des); ?>" value="off" <?php echo esc_attr(($value[$auto_des])=='off') ? 'checked' : ''; ?>/><?php echo esc_html('关闭');?> </p>
					<label class="toggle <?php echo esc_attr(($value[$auto_des])=='off') ? 'hidden' : ''; ?>" for="<?php echo esc_attr($auto_des_num); ?>" ><?php echo esc_html('字节数：');?></label>
					<input class="toggle" <?php echo esc_attr(($value[$auto_des])=='off') ? 'hidden' : ''; ?> type="text" name="<?php echo esc_attr($auto_des_num); ?>" id="<?php echo esc_attr($auto_des_num); ?>" value="<?php echo esc_attr($value[$auto_des_num]); ?>" size="20" />&nbsp;&nbsp;<?php echo esc_html('注：如果要截取100个汉字，应填写200个字节；即，要截取的字数*2');?>
				</p>
				<p>
					<label for="<?php echo esc_attr($tag); ?>"><strong><?php echo esc_html('自动获取文章标签作为文章keyword标签：');?></strong></label></p>
					<p><input type="radio" name="<?php echo esc_attr($tag); ?>" id="<?php echo esc_attr($tag); ?>" value="on" <?php echo esc_attr(($value[$tag])=='on') ? 'checked' : ''; ?>/><?php echo esc_html('开启');?> 
					<input type="radio" name="<?php echo esc_attr($tag); ?>" id="<?php echo esc_attr($tag); ?>" value="off" <?php echo esc_attr(($value[$tag]=='off')) ? 'checked' : ''; ?>/><?php echo esc_html('关闭');?> 
				</p>              
 				<p>
					<label for="<?php echo esc_attr($suffix); ?>"><strong><?php echo esc_html('内页title添加站点标题后缀：');?></strong></label>
                    <?php $val_suffix = isset($value[$suffix]) ? esc_attr($value[$suffix]) : ''; ?>
					<input type="checkbox" name="<?php echo esc_attr($suffix); ?>" id="<?php echo esc_attr($suffix); ?>" value="on" <?php checked( $val_suffix,'on' ); ?>/> 开启
				</p>
  				<p>
					<label for="<?php echo esc_attr($page_num); ?>"><strong><?php echo esc_html('title添加分页后缀：');?></strong></label>
                    <?php $val_page_num = isset($value[$page_num]) ? esc_attr($value[$page_num]) : ''; ?>
					<input type="checkbox" name="<?php echo esc_attr($page_num); ?>" id="<?php echo esc_attr($page_num); ?>" value="on" <?php checked( $val_page_num,'on' ); ?>/> 开启
				</p>
 				<p>
					<label for="<?php echo esc_attr($sep); ?>"><strong><?php echo esc_html('title后缀分隔符：');?></strong></label>
                    <?php $val_sep = isset($value[$sep]) ? $value[$sep] : ' - '; ?>
					<input type="text" name="<?php echo esc_attr($sep); ?>" id="<?php echo esc_attr($sep); ?>" value="<?php echo esc_attr($val_sep); ?>"/>
                    <span style="color:gray;">&nbsp;&nbsp;<?php echo esc_html('若勾选后缀则使用此分隔符。');?></span>
				</p>                                                          						
		</div>
	
		<div id="meta">
			<h3 id="function"><?php echo esc_html('首页SEO设置');?></h3>
			<p>
				<label for="<?php echo esc_attr($title); ?>" style="padding-right:15px;"><strong><?php echo esc_html('首页的标题');?></strong></label></p>
				<p><input type="text" name="<?php echo esc_attr($title); ?>" id="<?php echo esc_attr($title); ?>" value="<?php echo esc_attr(stripslashes($value[$title])); ?>" size="80" />
			</p>
			<p>
				<label for="<?php echo esc_attr($keywords); ?>" style="padding-right:15px;"><strong><?php echo esc_html('首页关键词');?></strong></label></p>
				<p><input type="text" name="<?php echo esc_attr($keywords); ?>" id="<?php echo esc_attr($keywords); ?>" value="<?php echo esc_attr(stripslashes($value[$keywords])); ?>" size="80" />
			</p>
			<p>
				<label for="<?php echo esc_attr($description); ?>" style="display:block;padding-bottom:10px;" ><strong><?php echo esc_html('首页的描述');?></strong></label>
				<textarea name="<?php echo esc_attr($description); ?>" id="<?php echo esc_attr($description); ?>" ><?php echo esc_attr(stripslashes($value[$description])); ?></textarea>
			</p>
			<p>
				<label for="<?php echo esc_attr($metas); ?>" style="display:block;padding-bottom:10px;"><strong><?php echo esc_html('Metas(非必填)');?></strong></label>
				<textarea name="<?php echo esc_attr($metas); ?>" id="<?php echo esc_attr($metas); ?>" ><?php echo esc_attr(stripslashes($value[$metas])); ?></textarea>
				<div style="color:gray;"></div>
			</p>
				<input type="hidden" name="meta_save" value="on"/>
				<?php submit_button('保存配置','primary','update_index_meta');?>
		</div>
	</form>
	</div>
	
	<div style="float:left;width:200px;margin-left:20px;border: 1px solid #DDD;background-color: #F7F7FF;padding:10px;display:none;">
		<?php do_action('superfast_admin_side_show');?>
	</div>

</div>

<div style="clear:both;"></div>

<?php ?>