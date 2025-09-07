<?php

/**
 * Remove admin color scheme
 */
function admin_color_scheme()
{
  global $_wp_admin_css_colors;
  $_wp_admin_css_colors = array();
}
add_action('admin_head', 'admin_color_scheme');
