<?php get_header(); ?>
<?php get_template_part('twitter'); ?>
<div id="posts">
  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
      <?php get_template_part('content', 'page'); ?>
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
