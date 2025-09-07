<?php

/**
 * Register strings for Polylang
 */

add_action('init', function () {
  if (!function_exists('pll_register_string')) {
    return;
  }

  pll_register_string('404-error', 'Error 404');
  pll_register_string('404-not-found', 'Not found');
  pll_register_string('404-content', 'The page you are looking for does not exist.');
  pll_register_string('404-cta-alt', 'Back to homepage');
  pll_register_string('404-cta', 'Go back to the home page');
  
});
