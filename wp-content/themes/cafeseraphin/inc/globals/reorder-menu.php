<?php
function reorder_admin_menu($menu_ord)
{
  return array(
    'index.php', // Dashboard
    'separator1', // --Space--
    'edit.php?post_type=page', // Pages
    'edit.php?post_type=update', // Posts (CPT)
    // 'edit.php', // Posts
    'edit.php?post_type=room', // Room
    'edit.php?post_type=event', // Event
    'upload.php', // Media
    'options-en', // General
    'separator2', // --Space--
    // 'edit-comments.php', // Comments
    'plugins.php', // Plugins
    // 'tools.php', // Tools
    'users.php', // Users
    // 'themes.php', // Appearance
    'options-general.php', // Settings
    'mlang_strings', // Languages
    'separator-last', // --Space--
  );
}
add_filter('custom_menu_order', 'reorder_admin_menu');
add_filter('menu_order', 'reorder_admin_menu');
