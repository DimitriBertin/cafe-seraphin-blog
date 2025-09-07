<?php

/**
 * Preload fonts from the /static/fonts/ folder and add them to the <head> tag
 */

function gg_preload_fonts()
{
  $font_dir = get_template_directory_uri() . '/static/fonts/';
  $font_files = scandir(get_template_directory() . '/static/fonts/');

  foreach ($font_files as $font_file) {
    $file_parts = pathinfo($font_file);
    $font_extension = $file_parts['extension'];

    if (in_array($font_extension, array('woff', 'woff2', 'ttf', 'otf'))) {
      $font_name = $file_parts['filename'];
      echo '<link rel="preload" href="' . $font_dir . $font_file . '" as="font" type="font/' . $font_extension . '" crossorigin="anonymous">' . "\n";
    }
  }
}
// add_action('wp_head', 'gg_preload_fonts', 1);
