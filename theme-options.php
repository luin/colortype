<?php

add_action( 'admin_init', 'theme_options_init' );
add_action( 'admin_menu', 'theme_options_add_page' );

/**
 * Init plugin options to white list our options
 */
function theme_options_init(){
	register_setting( 'colortype_options', 'colortype_theme_options', 'theme_options_validate' );
}

/**
 * Load up the menu page
 */
function theme_options_add_page() {
	add_theme_page('Theme Options', 'Theme Options', 'edit_theme_options', 'theme_options', 'theme_options_do_page' );
}

/**
 * Create the options page
 */
function theme_options_do_page() {
  global $select_options, $radio_options;

  if ( ! isset( $_REQUEST['settings-updated'] ) )
    $_REQUEST['settings-updated'] = false;

  ?>
  <script src="<?php get_stylesheet_directory() ?>/scripts/izzyColor.js"></script>
  <div class="wrap">
    <?php screen_icon(); echo "<h2>" . get_current_theme() . ' Theme Options' . "</h2>"; ?>

    <?php if ( false !== $_REQUEST['settings-updated'] ) : ?>
    <div class="updated fade"><p><strong>Options saved</strong></p></div>
    <?php endif; ?>

    <form method="post" action="options.php">
      <?php settings_fields( 'colortype_options' ); ?>
      <?php $options = get_option( 'colortype_theme_options' ); ?>

      <table class="form-table">

        <?php
        /**
         * A colortype checkbox option
         */
        ?>
        <tr><td colspan="2" style="color: #999;">You can pick a color from <a href="http://www.colorpicker.com" target="_blank">http://www.colorpicker.com</a></td></tr>
        <tr valign="top"><th scope="row">Theme color</th>
          <td>
            <input type="text" class="regular-text" id="colortype_theme_options[maincolor]" name="colortype_theme_options[maincolor]" value="<?php esc_attr_e( $options['maincolor'] ? $options['maincolor'] : '#d3513c'); ?>" />
          </td>
        </tr>
        <tr><td colspan="2" style="color: #999;">You can hide the 'About me' widget in the sidebar.</td></tr>
        <tr valign="top"><th scope="row">Hide "About me"</th>
          <td>
            <input id="colortype_theme_options[about-me]" name="colortype_theme_options[about-me]" type="checkbox" value="1" <?php checked( '1', $options['about-me'] ); ?> />
          </td>
        </tr>
        <tr valign="top"><th scope="row">Hide Sidebar menu</th>
          <td>
            <input id="colortype_theme_options[menu]" name="colortype_theme_options[menu]" type="checkbox" value="1" <?php checked( '1', $options['menu'] ); ?> />
          </td>
        </tr>
        <tr><td colspan="2" style="color: #999;">You can upload an image via "<a href="<?php bloginfo('wpurl'); ?>/wp-admin/media-new.php">Upload New Media</a>" and copy the image url to the input box.<br />The optimum width of the avatar is 250px.</td></tr>
        <tr valign="top"><th scope="row">Avatar url</th>
          <td>
            <input type="text" class="regular-text" id="colortype_theme_options[avatar]" name="colortype_theme_options[avatar]" value="<?php esc_attr_e($options['avatar']); ?>" />
          </td>
        </tr>
        <tr valign="top"><th scope="row">Bio</th>
          <td>
          <textarea style="width: 300px; height: 80px;" name="colortype_theme_options[bio]" id="colortype_theme_options[bio]"><?php esc_attr_e($options['bio']); ?></textarea>
          </td>
        </tr>
        <tr><td colspan="2" style="color: #999;">These options will let you setup the social icons at the bottom of the 'About me' section in the sidebar. <br />You can enter the username of your profiles to have the icons show up.</td></tr>
        <tr valign="top"><th scope="row">Use gray icons</th>
          <td>
            <input id="colortype_theme_options[gray-icon]" name="colortype_theme_options[gray-icon]" type="checkbox" value="1" <?php checked( '1', $options['gray-icon'] ); ?> />
          </td>
        </tr>
        <tr valign="top"><th scope="row">Twitter username</th>
          <td>
            <input type="text" id="colortype_theme_options[twitter]" name="colortype_theme_options[twitter]" value="<?php esc_attr_e($options['twitter']); ?>" />
            <div>
              <span> &nbsp;Hide last tweet: </span>
              <input id="colortype_theme_options[showlasttweet]" name="colortype_theme_options[showlasttweet]" type="checkbox" value="1" <?php checked( '1', $options['showlasttweet'] ); ?> />
            </div>
          </td>
        </tr>
        <tr valign="top"><th scope="row">Facebook username</th>
          <td>
            <input type="text" id="colortype_theme_options[facebook]" name="colortype_theme_options[facebook]" value="<?php esc_attr_e($options['facebook']); ?>" />
          </td>
        </tr>
        <tr valign="top"><th scope="row">Google+ ID</th>
          <td>
            <input type="text" id="colortype_theme_options[google]" name="colortype_theme_options[google]" value="<?php esc_attr_e($options['google']); ?>" />
          </td>
        </tr>
        <tr valign="top"><th scope="row">Flickr username</th>
          <td>
            <input type="text" id="colortype_theme_options[flickr]" name="colortype_theme_options[flickr]" value="<?php esc_attr_e($options['flickr']); ?>" />
          </td>
        </tr>
        <tr valign="top"><th scope="row">Github username</th>
          <td>
            <input type="text" id="colortype_theme_options[github]" name="colortype_theme_options[github]" value="<?php esc_attr_e($options['github']); ?>" />
          </td>
        </tr>
        <tr valign="top"><th scope="row">Dribbble username</th>
          <td>
            <input type="text" id="colortype_theme_options[dribbble]" name="colortype_theme_options[dribbble]" value="<?php esc_attr_e($options['dribbble']); ?>" />
          </td>
        </tr>
        <tr valign="top"><th scope="row">Jiepang URL</th>
          <td>
            http://jiepang.com/<input type="text" id="colortype_theme_options[jiepang]" name="colortype_theme_options[jiepang]" value="<?php esc_attr_e($options['jiepang']); ?>" />
          </td>
        </tr>
        <tr valign="top"><th scope="row">Fanfou username</th>
          <td>
            <input type="text" id="colortype_theme_options[fanfou]" name="colortype_theme_options[fanfou]" value="<?php esc_attr_e($options['fanfou']); ?>" />
          </td>
        </tr>
        <tr valign="top"><th scope="row">Weibo username</th>
          <td>
            <input type="text" id="colortype_theme_options[weibo]" name="colortype_theme_options[weibo]" value="<?php esc_attr_e($options['weibo']); ?>" />
          </td>
        </tr>
        <tr valign="top"><th scope="row">Douban username</th>
          <td>
            <input type="text" id="colortype_theme_options[douban]" name="colortype_theme_options[douban]" value="<?php esc_attr_e($options['douban']); ?>" />
          </td>
        </tr>
        <tr valign="top"><th scope="row">Hide RSS icon</th>
          <td>
            <input id="colortype_theme_options[rss]" name="colortype_theme_options[rss]" type="checkbox" value="1" <?php checked( '1', $options['rss'] ); ?> />
          </td>
        </tr>
        <tr><td colspan="2" style="color: #999;">The custom api url should have a same result as the default api</td></tr>
        <tr valign="top"><th scope="row">Custom Twitter API</th>
          <td>
            <input type="text" class="regular-text" id="colortype_theme_options[twitterapi]" name="colortype_theme_options[twitterapi]" value="<?php esc_attr_e($options['twitterapi'] ? $options['twitterapi'] : 'http://api.twitter.com/1/statuses/user_timeline/{%username%}.json?count=1&callback=?'); ?>" />
          </td>
        </tr>
        <tr><td colspan="2" style="color: #999;">You can enter your custom CSS to override the default CSS.</td></tr>
        <tr valign="top"><th scope="row">Custom CSS</th>
          <td>
          <textarea style="width: 300px; height: 80px;" name="colortype_theme_options[css]" id="colortype_theme_options[css]"><?php esc_attr_e($options['css']); ?></textarea>
          </td>
        </tr>
        <tr><td colspan="2" style="color: #999;">The following code will be appended before &lt;/body&gt;.<br />You can insert the Google Analytics code here.</td></tr>
        <tr valign="top"><th scope="row">Custom Footer</th>
          <td>
          <textarea style="width: 300px; height: 80px;" name="colortype_theme_options[footer]" id="colortype_theme_options[footer]"><?php esc_attr_e($options['footer']); ?></textarea>
          </td>
        </tr>
        <tr><td colspan="2" style="color: #999;">The following code will be appended before &lt;/head&gt;.</td></tr>
        <tr valign="top"><th scope="row">Custom Header</th>
          <td>
          <textarea style="width: 300px; height: 80px;" name="colortype_theme_options[header]" id="colortype_theme_options[header]"><?php esc_attr_e($options['header']); ?></textarea>
          </td>
        </tr>
        <tr valign="top"><th scope="row"><input type="submit" class="button-primary" value="<?php _e( 'Save Options', 'colortypetheme' ); ?>" /></th>
          <td>
          </td>
        </tr>
      </table>
    </form>
    <h2 style="margin-top: 50px">Get support</h2>
    <p>Colortype homepage: <a target="_blank" href="http://zihua.li/colortype">http://zihua.li/colortype</a></p>
    <p>Github: <a target="_blank" href="https://github.com/luin/colortype">https://github.com/luin/colortype</a></p>
    <p>Feel free to contact me via email <a href="mailto:i@zihua.li">i@zihua.li</a> if you have any questions or suggestions about this theme.</p>
  </div>
  <?php
  }

/**
* Sanitize and validate input. Accepts an array, return a sanitized array.
*/
function theme_options_validate( $input ) {
  global $select_options, $radio_options;

  // Our checkbox value is either 0 or 1
  if ( ! isset( $input['option1'] ) )
    $input['option1'] = null;
  $input['option1'] = ( $input['option1'] == 1 ? 1 : 0 );

  // Say our text option must be safe text with no HTML tags
  $input['maincolor'] = wp_filter_nohtml_kses( $input['maincolor'] );

  return $input;
}

// adapted from http://planetozh.com/blog/2009/05/handling-plugins-options-in-wordpress-28-with-register_setting/
