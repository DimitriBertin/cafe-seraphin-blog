<?php

/**
 * Remove help tabs
 */
function contextual_help_list_remove()
{
  global $current_screen;
  $current_screen->remove_help_tabs();
}
add_filter('contextual_help_list', 'contextual_help_list_remove');

/**
 * Remove Excerpt Learn More Link
 */

function remove_excerpt_link()
{
  echo '<style>
  .editor-post-excerpt .components-external-link {
    display: none;
  }
  </style>';
}
add_action('admin_head', 'remove_excerpt_link');
