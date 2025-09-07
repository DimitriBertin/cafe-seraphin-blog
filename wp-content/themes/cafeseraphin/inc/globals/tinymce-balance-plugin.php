<?php
function balance_text_plugin($plugin_array)
{
  $plugin_array['balance_text'] =
    get_stylesheet_directory_uri() . '/inc/globals/tinymce-balance-plugin/plugin.js';
  return $plugin_array;
}
function balance_text_buttons($buttons)
{
  // Find position of alignment buttons
  $pos = array_search('aligncenter', $buttons);

  // If found, insert our button after it
  if ($pos !== false) {
    array_splice($buttons, $pos + 1, 0, 'balance-text');
  } else {
    // Fallback: add it after basic formatting
    $basic_formatting = array('bold', 'italic', 'underline');
    foreach ($basic_formatting as $format) {
      $format_pos = array_search($format, $buttons);
      if ($format_pos !== false) {
        array_splice($buttons, $format_pos + 1, 0, 'balance-text');
        return $buttons;
      }
    }

    // Last resort: add to beginning
    array_unshift($buttons, 'balance-text');
  }

  return $buttons;
}
function balance_text_init()
{
  $screen = get_current_screen();
  if ($screen->base !== 'post') return;
  add_filter('mce_external_plugins', 'balance_text_plugin');
  add_filter('mce_buttons', 'balance_text_buttons');
}
add_action('current_screen', 'balance_text_init');