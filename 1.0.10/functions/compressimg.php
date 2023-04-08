<?php
function superfastseo_handle_upload_callback( $data ) {
    $image_quality = 60; 
    $file_path = $data['file'];
    $image = false;
    switch ( $data['type'] ) {
        
        case 'image/jpeg': {
            $image = imagecreatefromjpeg( $file_path );
            imagejpeg( $image, $file_path, $image_quality );
            break;
        }
        
        case 'image/bmp': {
            $image = imagecreatefromjpeg( $file_path );
            imagejpeg( $image, $file_path, $image_quality );
            break;
        }
        
        case 'image/webp': {
            $image = imagecreatefromjpeg( $file_path );
            imagejpeg( $image, $file_path, $image_quality );
            break;
        }
        
        case 'image/png': {
            $image = imagecreatefrompng( $file_path );
            imagejpeg( $image, $file_path, $image_quality );//注意，imagepng并没有quality这个选项，使用imagejpeg则不会保存png的rgba通道，即没有透明度
            break;
        }
        case 'image/gif': {
         // Nothing to do here since imagegif doesn't have an 'image quality' option
            break;
         }
    }
     return $data;
}

add_filter( 'wp_handle_upload', 'superfastseo_handle_upload_callback' );
?>