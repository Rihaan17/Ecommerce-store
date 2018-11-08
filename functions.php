<?php
/**
 * Function describe for ecommerce-store 
 * 
 * @package ecommerce-store
 */
include_once( trailingslashit( get_stylesheet_directory() ) . 'lib/ecommerce-store-metaboxes.php' );
include_once( trailingslashit( get_stylesheet_directory() ) . 'lib/custom-config.php' );

add_action( 'wp_enqueue_scripts', 'ecommerce_store_enqueue_styles', 999 );
function ecommerce_store_enqueue_styles() {
  $parent_style = 'ecommerce-store-parent-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'ecommerce-store-child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style )
    );
}


function ecommerce_store_theme_setup() {
    
    load_child_theme_textdomain( 'ecommerce-store', get_stylesheet_directory() . '/languages' );
    
    add_image_size( 'ecommerce-store-cat', 600, 600, true );
}
add_action( 'after_setup_theme', 'ecommerce_store_theme_setup' );

// Remove parent theme homepage style.
function ecommerce_store_remove_page_templates( $templates ) {
    unset( $templates['template-home.php'] );
    return $templates;
}
add_filter( 'theme_page_templates', 'ecommerce_store_remove_page_templates' );

// Load theme info page.
if ( is_admin() ) {
	include_once(trailingslashit( get_template_directory() ) . 'lib/welcome/welcome-screen.php');
}



