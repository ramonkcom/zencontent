<?php

function zencontent_setup(){
    add_theme_support( 'custom-logo', array(
        'height'      => 60,
        'flex-height' => false,
        'flex-width'  => true,
        ) );
        
        add_theme_support( 'post-thumbnails' );

        $supported_formats = array( 'aside', 'audio', 'gallery', 'image', 'link', 'quote', 'status', 'video' );
        add_theme_support( 'post-formats', $supported_formats );
}

add_action( 'after_setup_theme', 'zencontent_setup' );

function zencontent_assets( $hook ) {
    $script_path = '/assets/js/script.js';
	$script_ver  = date("ymd-Gis", filemtime( get_template_directory() . $script_path ));
	wp_enqueue_script( 'zencontent-main-js', get_template_directory_uri() . $script_path, array('jquery'), $script_ver );
    
    $fonts = "https://fonts.googleapis.com/css2?family=IBM+Plex+Mono&family=IBM+Plex+Sans:ital,wght@0,300;0,500;1,300;1,500&display=swap";
	wp_enqueue_style( 'google-fonts', $fonts, array() );

    $style_path = '/assets/css/style.css';
	$style_ver  = date("ymd-Gis", filemtime( get_template_directory() . $style_path ));
	wp_enqueue_style( 'zencontent-main-css', get_template_directory_uri() . $style_path, array('google-fonts'), $style_ver );
}

add_action( 'wp_enqueue_scripts', 'zencontent_assets' );

function zencontent_script_tag( $tag, $handle, $src ) {
    if ( !str_contains( $handle, 'zencontent' ) ) {
        return $tag;
    }

    $tag = '<script type="module" src="' . esc_url( $src ) . '"></script>';
    return $tag;
}

add_filter( 'script_loader_tag', 'zencontent_script_tag' , 10, 3);