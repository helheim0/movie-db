<?php
wp_enqueue_style( 'docs', get_template_directory_uri() . '/modules/css/docs.css', false, '1.1', 'all');
wp_enqueue_style( 'style', get_stylesheet_uri() );

if ( ! function_exists( 'theme_setup' ) ) {
/**
* Sets up theme defaults and registers support for various WordPress features.
*
* Note that this function is hooked into the after_setup_theme hook, which runs
* before the init hook. The init hook is too late for some features, such as indicating
* support post thumbnails.
*/
function theme_setup() {
    
    /**
     * Make theme available for translation.
     * Translations can be placed in the /languages/ directory.
     */
    load_theme_textdomain( 'text_domain', get_template_directory() . '/languages' );
    
    /**
     * Add default posts and comments RSS feed links to <head>.
     */
    add_theme_support( 'automatic-feed-links' );
    
    /**
     * Enable support for post thumbnails and featured images.
     */
    add_theme_support( 'post-thumbnails' );
    
    /**
     * Add support for two custom navigation menus.
     */
    register_nav_menus( array(
        'primary'   => __( 'Primary Menu', 'text_domain' ),
        'secondary' => __('Secondary Menu', 'text_domain' )
    ) );
    
    /**
     * Enable support for the following post formats:
     * aside, gallery, quote, image, and video
     */
    add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );

    //MY PART OF CODE
    register_sidebar('footer-widgets');
}
} // theme_setup
add_action( 'after_setup_theme', 'theme_setup' );


wp_enqueue_script( 'script', get_template_directory_uri() . '/modules/js/script.js', array( 'jquery' ), 1.1, true);