<?php
function heading_highlight_plugin($plugin_array)
{
  $plugin_array['heading_highlight'] =
    get_stylesheet_directory_uri() . '/inc/globals/tinymce-mark-plugin/plugin.js';
  return $plugin_array;
}
function heading_highlight_buttons($buttons)
{
  // Find position of 'bullist' (bullet list) button
  $pos = array_search('bullist', $buttons);

  // If found, insert our button before it
  if ($pos !== false) {
    array_splice($buttons, $pos, 0, 'heading-highlight');
  } else {
    // Fallback: add it after bold, italic, underline
    $basic_formatting = array('bold', 'italic', 'underline');
    foreach ($basic_formatting as $format) {
      $format_pos = array_search($format, $buttons);
      if ($format_pos !== false) {
        array_splice($buttons, $format_pos + 1, 0, 'heading-highlight');
        return $buttons;
      }
    }

    // Last resort: add to beginning
    array_unshift($buttons, 'heading-highlight');
  }

  return $buttons;
}
function heading_highlight_init()
{
  $screen = get_current_screen();
  if ($screen->base !== 'post') return;
  add_filter('mce_external_plugins', 'heading_highlight_plugin');
  add_filter('mce_buttons', 'heading_highlight_buttons');
}
add_action('current_screen', 'heading_highlight_init');