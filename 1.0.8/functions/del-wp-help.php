<?php
//移除后台右上角帮助
add_action('in_admin_header', function(){
    global $current_screen;
    $current_screen->remove_help_tabs();
});
?>