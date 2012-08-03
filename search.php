<?php get_header(); ?>
<?php get_template_part('twitter'); ?>
<div id="posts">
  <div id="archives">
    <h2 class="archive-title"><?php printf( __( 'Search Results for: %s', 'twentyeleven' ), '<span>' . get_search_query() . '</span>' ); ?></h2>
  </div>
  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
      <?php get_template_part('content', 'search'); ?>
    <?php endwhile; ?>
  <?php else: ?>
    <p>Sorry, no posts matched your criteria.</p>
  <?php endif; ?>
</div>
<?php if(function_exists('wp_pagenavi')): ?>
  <?php wp_pagenavi() ?>
<?php else: ?>
  <div class="pagination-older"><?php next_posts_link('Older Entries &gt;'); ?></div>
  <div class=" pagination-newer"><?php previous_posts_link('&lt; Newer Entries'); ?></div>
<?php endif; ?>
<?php get_footer(); ?>
