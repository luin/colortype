<?php $options = get_option('colortype_theme_options'); ?>
<?php if (!$options['showlasttweet'] && $options['twitter']) : ?>
<?php
  if (!$options['twitterapi']) {
    $options['twitterapi'] = 'http://api.twitter.com/1/statuses/user_timeline/{%username%}.json?count=1&callback=?';
  }
?>
<div id="twitter">
<p><a target="_blank" href="http://twitter.com/<?php echo $options['twitter'];?>"><span class="username">@<?php echo $options['twitter'];?></span></a></p>
  <p class="body">Loading...</p>
  <script type="text/javascript">
    $(function(){
      $.getJSON('<?php echo str_replace('{%username%}', $options['twitter'], $options['twitterapi']); ?>', function(data) {
             $("#twitter .body").html(data[0].text);
      });
    });
  </script>
</div>
<?php endif; ?>
