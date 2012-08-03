<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="ie ie6 lte9 lte8 lte7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>     <html class="ie ie7 lte9 lte8 lte7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>     <html class="ie ie8 lte9 lte8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 9]>     <html class="ie ie9 lte9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 9]>  <html <?php language_attributes(); ?>> <![endif]-->
<!--[if !IE]><!--> <html <?php language_attributes(); ?>>             <!--<![endif]-->
  <head>
    <meta charset="<?php bloginfo('charset'); ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=9">
      <title><?php
        /*
         * Print the <title> tag based on what is being viewed.
         */
        global $page, $paged;

        wp_title('|', true, 'right');

        // Add the blog name.
        bloginfo('name');

        // Add the blog description for the home/front page.
        $site_description = get_bloginfo('description', 'display');
        if ($site_description && (is_home() || is_front_page()))
          echo " | $site_description";

        // Add a page number if necessary:
        if ($paged >= 2 || $page >= 2)
          echo ' | ' . sprintf('Page %s', max($paged, $page));

      ?></title>
      <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
      <![endif]-->
      <link rel="stylesheet" media="all" href="<?php bloginfo('stylesheet_url') ?>"/>
      <link rel="pingback" href="<?php bloginfo('pingback_url') ?>" />
      <meta name="viewport" content="width=device-width, initial-scale=1"/>
      <script src="<?php echo get_bloginfo( 'template_directory') . '/scripts/jquery.js' ?>"></script>
      <!--[if lt IE 9]>
        <script src="<?php echo get_bloginfo( 'template_directory') . '/scripts/jquery.corner.js' ?>"></script>
        <script type="text/javascript">
          $(function() {$('.date').corner('round 5px');});
        </script>
      <![endif]-->
      <?php wp_head() ?>
      <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ) ?>
  </head>
    <body <?php body_class() ?>>
    <style>
      <?php $options = get_option('colortype_theme_options'); ?>
      <?php
        if (!$options['maincolor']) $options['maincolor'] = '#d3513c';
      ?>
      a { color: <?php echo $options['maincolor'];?>;}
      a:hover { color: <?php echo darkenColour($options['maincolor'], 35); ?>}
      .entry-header .date { background-color: <?php echo $options['maincolor'];?>;}
      .reply a { background-color: <?php echo $options['maincolor']; ?>}
      .reply a:hover { background-color: <?php echo darkenColour($options['maincolor']); ?>}
      .comment-meta { background-color: <?php echo $options['maincolor']; ?>}
      input, textarea { outline-color: <?php echo $options['maincolor'] ?>}
      .archive-title {border: 3px solid <?php echo $options['maincolor'] ?>; color: <?php echo $options['maincolor'] ?>}
      #submit, input[type="submit"] { background-color: <?php echo $options['maincolor'] ?>}
      <?php if ($options['css']) echo $options['css']; ?>
    </style>
    <div id="wrap">
      <?php get_sidebar(); ?>
      <div id="main">
