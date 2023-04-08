<?php
//禁止自动保存功能
add_action('wp_print_scripts','superfastseo_disable_autosave');
function superfastseo_disable_autosave(){  
    wp_deregister_script('autosave'); 
}
?>