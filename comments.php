<?php // Do not delete these lines
  if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
    die('Please do not load this page directly. Thanks!');

  if(post_password_required()) : ?>
    <p class="nocomments">This post is password protected. Enter the password to view comments.</p>
<?php
    return;
  endif;
?>
<div id="comments">
  <?php if ( have_comments() ) : ?>
    <h2><?php comments_number('No Responses', 'One Response', '% Responses' );?></h2>
    <div class="navigation">
      <div class="alignleft"><?php previous_comments_link() ?></div>
      <div class="alignright"><?php next_comments_link() ?></div>
    </div>

    <ol class="commentlist">
    <?php wp_list_comments('avatar_size=48'); ?>
    </ol>

    <div class="navigation">
      <div class="alignleft"><?php previous_comments_link() ?></div>
      <div class="alignright"><?php next_comments_link() ?></div>
      <div style="clear:both"></div>
    </div>
   <?php else : // this is displayed if there are no comments so far ?>

    <?php if ( comments_open() ) : ?>
      <!-- If comments are open, but there are no comments. -->

     <?php else : // comments are closed ?>
      <!-- If comments are closed. -->

    <?php endif; ?>
  <?php endif; ?>


<?php comment_form();?>

<script type="text/javascript">
jQuery('.comment-body').mouseover(function () {
	jQuery(this).children('.reply').show();
}).mouseleave(function () {
	jQuery(this).children('.reply').hide();
});
</script>

</div>
