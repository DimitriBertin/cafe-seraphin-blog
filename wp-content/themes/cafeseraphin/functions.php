<?php

if (!defined('ABSPATH')) {
  exit; // Exit if accessed directly.
}

// Get variales of the theme
$theme = wp_get_theme();
$theme_version = $theme->get('Version');


// add_action('acf/init', function() {
//     acf_update_setting('google_api_key', 'AIzaSyBWu5xbsals2Em65j1aZfmqY0cBj2A3_Wg');
// });

// // REQUIRE GLOBALS INCLUDES FILES FOR WORDPRESS => 
// require_once get_template_directory() . '/inc/globals/__useTokens.php';
foreach (glob(get_template_directory() . '/inc/globals/*.php') as $file) {
  require_once $file;
}

// // REQUIRE INCLUDES FILES 
foreach (glob(get_template_directory() . '/inc/*.php') as $file) {
  require_once $file;
}

// foreach (glob(get_template_directory() . '/inc/fields/*.php') as $file) {
//   require_once $file;
// }

// add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );
