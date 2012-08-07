      </div>
    </div>
    <?php wp_footer() ?>
    <?php $options = get_option('colortype_theme_options'); ?>
    <?php if ($options['footer']) echo $options['footer']; ?>
  </body>
</html>
