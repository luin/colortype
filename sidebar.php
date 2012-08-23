<?php $options = get_option('colortype_theme_options'); ?>
<aside>
  <h1><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name') ?></a></h1>
  <?php if (!$options['about-me']): ?>
    <section id="aboutMe">
      <?php if ($options['avatar']) : ?>
        <p class="avatar"><img src="<?php echo $options['avatar']; ?>" width="250" /></p>
      <?php endif; ?>
      <p><?php echo $options['bio'] ? $options['bio'] : get_bloginfo('description'); ?></p>
      <p class="social">
        <?php $dir = ($options['gray-icon']) ? 'gray': 'color'; ?>
        <?php if (!$options['rss']) :?>
          <a target="_blank" href="<?php bloginfo('rss2_url'); ?>"><img src="<?php echo get_bloginfo( 'template_directory') . "/images/icons/{$dir}/rss.png" ?>" width="32" height="32" /></a>
        <?php endif ;?>
        <?php if ($options['twitter']) :?>
          <a target="_blank" href="http://twitter.com/<?php echo $options['twitter'] ?>"><img src="<?php echo get_bloginfo( 'template_directory') . "/images/icons/{$dir}/twitter.png" ?>" width="32" height="32" /></a>
        <?php endif; ?>
        <?php if ($options['facebook']) :?>
          <a target="_blank" href="http://www.facebook.com/<?php echo $options['facebook'] ?>"><img src="<?php echo get_bloginfo( 'template_directory') . "/images/icons/{$dir}/facebook.png" ?>" width="32" height="32" /></a>
        <?php endif; ?>
        <?php if ($options['google']) :?>
          <a target="_blank" href="http://plus.google.com/<?php echo $options['google']; ?>"><img src="<?php echo get_bloginfo( 'template_directory') . "/images/icons/{$dir}/google.png" ?>" width="32" height="32" /></a>
        <?php endif; ?>
        <?php if ($options['flickr']) :?>
          <a target="_blank" href="http://www.flickr.com/people/<?php echo $options['flickr']; ?>"><img src="<?php echo get_bloginfo( 'template_directory') . "/images/icons/{$dir}/flickr.png" ?>" width="32" height="32" /></a>
        <?php endif; ?>
        <?php if ($options['github']) :?>
          <a target="_blank" href="http://github.com/<?php echo $options['github']; ?>"><img src="<?php echo get_bloginfo( 'template_directory') . "/images/icons/{$dir}/github.png" ?>" width="32" height="32" /></a>
        <?php endif; ?>
        <?php if ($options['dribbble']) :?>
          <a target="_blank" href="http://dribbble.com/<?php echo $options['dribbble']; ?>"><img src="<?php echo get_bloginfo( 'template_directory') . "/images/icons/{$dir}/dribbble.png" ?>" width="32" height="32" /></a>
        <?php endif; ?>
        <?php if ($options['jiepang']) :?>
          <a target="_blank" href="http://jiepang.com/<?php echo $options['jiepang']; ?>"><img src="<?php echo get_bloginfo( 'template_directory') . "/images/icons/{$dir}/jiepang.png" ?>" width="32" height="32" /></a>
        <?php endif; ?>
        <?php if ($options['fanfou']) :?>
          <a target="_blank" href="http://fanfou.com/<?php echo $options['fanfou']; ?>"><img src="<?php echo get_bloginfo( 'template_directory') . "/images/icons/{$dir}/fanfou.png" ?>" width="32" height="32" /></a>
        <?php endif; ?>
        <?php if ($options['douban']) :?>
          <a target="_blank" href="http://www.douban.com/people/<?php echo $options['douban']; ?>"><img src="<?php echo get_bloginfo( 'template_directory') . "/images/icons/{$dir}/douban.png" ?>" width="32" height="32" /></a>
        <?php endif; ?>
        <?php if ($options['weibo']) :?>
          <a target="_blank" href="http://weibo.com/<?php echo $options['weibo']; ?>"><img src="<?php echo get_bloginfo( 'template_directory') . "/images/icons/{$dir}/weibo.png" ?>" width="32" height="32" /></a>
        <?php endif; ?>
      <div style="clear: both"></div>
      <?php if (!$options['menu']): ?>
        <?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        <div style="clear: both"></div>
      <?php endif; ?>
    </section>
  <?php endif; ?>
  <?php
    if ( ! dynamic_sidebar( 'primary-widget-area' ) ) : ?>
      <section id="archives" class="widget-container">
        <h2><?php _e( 'Archives', 'twentyten' ); ?></h2>
        <ul>
          <?php wp_get_archives( 'type=monthly' ); ?>
        </ul>
      </section>
      <section id="meta" class="widget-container">
        <h2><?php _e( 'Meta', 'twentyten' ); ?></h2>
        <ul>
          <?php wp_register(); ?>
          <li><?php wp_loginout(); ?></li>
          <?php wp_meta(); ?>
        </ul>
      </section>
    <?php endif; // end primary widget area ?>
  <div style="clear: both"></div>
  <section class="copyright">
  <p>© 2012 <strong><?php bloginfo('name'); ?></strong><br />Powered by <a target="_blank" href="http://wordpress.org">WordPress</a> & <a target="_blank" href="http://zihua.li/colortype">Colortype</a></p>
  </section>
</aside>
