<?php get_header(); ?>
<?php get_template_part('twitter'); ?>
<div id="posts">
  <div id="archives">
    <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
    <?php if (is_category()) : ?>
      <h2 class="archive-title"> &#8216;<?php single_cat_title(); ?>&#8217; Category</h2>
    <?php elseif( is_tag() ) : ?>
      <h2 class="archive-title">Posts Tagged &#8216;<?php single_tag_title(); ?>&#8217;</h2>
    <?php elseif (is_day()) : ?>
      <h2 class="archive-title"><?php the_time('F jS, Y'); ?></h2>
    <?php elseif (is_month()) : ?>
      <h2 class="archive-title"><?php the_time('F, Y'); ?></h2>
    <?php elseif (is_year()) : ?>
      <h2 class="archive-title"><?php the_time('Y'); ?></h2>
    <?php elseif (is_author()) : ?>
      <h2 class="archive-title">Author Archive</h2>
    <?php elseif (isset($_GET['paged']) && !empty($_GET['paged'])) : ?>
      <h2 class="archive-title">Blog Archives</h2>
    <?php endif; ?>
  </div>
  <?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
      <?php get_template_part('content'); ?>
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
