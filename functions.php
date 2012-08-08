<?php

// Load up our awesome theme options
require_once ( get_stylesheet_directory() . '/theme-options.php' );

function darkenColour($color){
    $dif = 20;
    $color = str_replace('#', '', $color);
    if (strlen($color) != 6){ return '000000'; }
    $rgb = '';
    for ($x=0;$x<3;$x++){
        $c = hexdec(substr($color,(2*$x),2)) - $dif;
        $c = ($c < 0) ? 0 : dechex($c);
        $rgb .= (strlen($c) < 2) ? '0'.$c : $c;
    }
    return '#'.$rgb;
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
