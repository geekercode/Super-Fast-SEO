<?php
//禁用古腾堡编辑器
add_filter ('use_block_editor_for_post','__return_false');
remove_action('wp_enqueue_scripts', 'wp_common_block_scripts_and_styles');
?>