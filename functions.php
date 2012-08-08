<?php

// Load up our awesome theme options
require_once ( get_stylesheet_directory() . '/theme-options.php' );

function darkenColour($color, $diff=20){
    $i = hexdec($color);
    $rgb['r'] = 0xFF & ($i >> 0x10);
    $rgb['g'] = 0xFF & ($i >> 0x8);
    $rgb['b'] = 0xFF & $i;
    $hex = "#";
    foreach($rgb as $v) {
        $hex .= ($v <= $diff) ? '00' : dechex($v-$diff);
    }
    return $hex;
}

register_sidebar( array(
  'name' => 'Primary Widget Area',
  'id' => 'primary-widget-area',
  'description' => __( 'The primary widget area', 'twentyten' ),
  'before_widget' => '<section id="%1$s" class="widget-container %2$s">',
  'after_widget' => '</section>',
  'before_title' => '<h2>',
  'after_title' => '</h2>',
 ));


/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
  $content_width  = '630';

add_action( 'after_setup_theme', 'colortype_setup' );
if ( ! function_exists( 'colortype_setup' ) ) {
  function colortype_setup () {
    // Add default posts and comments RSS feed links to <head>.
    add_theme_support( 'automatic-feed-links' );
    register_nav_menu( 'primary', 'Sidebar Menu');
  }
}
