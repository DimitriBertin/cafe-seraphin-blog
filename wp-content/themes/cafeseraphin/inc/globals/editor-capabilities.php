<?php

/**
 * Remove capabilities from Editor role
 */

function gg_change_editor_capabilities()
{
  $editor = get_role('editor');

  // remove ability to add or delete posts and pages
  $editor->add_cap('list_users');
  $editor->add_cap('edit_users');
  $editor->add_cap('create_users');
  $editor->add_cap('delete_users');
  $editor->add_cap('publish_posts');
  $editor->add_cap('delete_posts');
  $editor->add_cap('delete_others_posts');
  $editor->add_cap('create_pages');
  $editor->add_cap('publish_pages');
  $editor->add_cap('delete_pages');
  $editor->add_cap('delete_others_pages');

  // remove ability to edit theme options
  $editor->remove_cap('edit_theme_options');
}
add_action('init', 'gg_change_editor_capabilities');

// tie together the publish_pages and create_pages
function gg_joint_publish_pages_cap()
{
  global $wp_post_types;
  if (!current_user_can('publish_pages')) {
    // unset($wp_post_types['page']->cap->create_posts);
    // unset($wp_post_types['page']->cap->edit_attributes);
  }
}
add_action('init', 'gg_joint_publish_pages_cap');

// remove page attributes meta box
function gg_remove_page_attributes_meta_box()
{
  if (!current_user_can('publish_pages')) {
    remove_meta_box('pageparentdiv', 'page', 'side');
  }
}
add_action('admin_menu', 'gg_remove_page_attributes_meta_box');

/**
 * Filtering the user Delete & Edit link, making it only visible for 'editor' users when the target user is not an 'administrator'
 */
function gg_filter_user_row_actions($actions, $user_object)
{
  if (current_user_can('editor') && !current_user_can('administrator')) {
    // get role of user being edited
    $user = new WP_User($user_object->ID);
    if (in_array('administrator', $user->roles) || in_array('editor', $user->roles)) {
      unset($actions['delete']);
      unset($actions['edit']);
    }
  }
  return $actions;
}
add_filter('user_row_actions', 'gg_filter_user_row_actions', 10, 2);

/**
 * Hide 'administrator' users alltogether from the list of users for 'editor' users
 */
function gg_exclude_admin_users($query)
{
  if (current_user_can('editor') && !current_user_can('administrator')) {
    global $wpdb;
    // Remove 'administrator' from the query of listing users
    $query->query_where = str_replace(
      'WHERE 1=1',
      "WHERE 1=1 AND {$wpdb->users}.ID NOT IN (
        SELECT {$wpdb->usermeta}.user_id FROM $wpdb->usermeta
        WHERE {$wpdb->usermeta}.meta_key = '{$wpdb->prefix}capabilities'
        AND {$wpdb->usermeta}.meta_value LIKE '%administrator%'
      )",
      $query->query_where
    );
  }
}
add_action('pre_user_query', 'gg_exclude_admin_users');

// Hide .subsubsub on users.php
function gg_hide_subsubsub()
{
  if (current_user_can('editor') && !current_user_can('administrator')) {
    if (str_contains($_SERVER['REQUEST_URI'], 'users.php')) {
      echo '<style>.subsubsub{display:none;}</style>';
    }
  }
}
add_action('admin_head', 'gg_hide_subsubsub');

/**
 * Remove unnecessary roles
 */

remove_role('subscriber');
remove_role('contributor');
remove_role('author');

/**
 * Adding a custom role called 'User' (same as Editor)
 */
add_role('user', 'User', array(
  'delete_others_pages' => false,
  'delete_others_posts' => true,
  'delete_pages' => false,
  'delete_posts' => true,
  'delete_private_pages' => true,
  'delete_private_posts' => true,
  'delete_published_pages' => true,
  'delete_published_posts' => true,
  'edit_others_pages' => true,
  'edit_others_posts' => true,
  'edit_pages' => true,
  'edit_posts' => true,
  'edit_private_pages' => true,
  'edit_private_posts' => true,
  'edit_published_pages' => true,
  'edit_published_posts' => true,
  'manage_categories' => true,
  'manage_links' => true,
  'moderate_comments' => true,
  'publish_pages' => false,
  'publish_posts' => true,
  'read' => true,
  'read_private_pages' => true,
  'read_private_posts' => true,
  'unfiltered_html' => true,
  'upload_files' => true,
));

/**
 * 
 */
function change_role_name()
{
  global $wp_roles;

  if (!isset($wp_roles)) {
    $wp_roles = new WP_Roles();
  }

  $wp_roles->roles['administrator']['name'] = 'Operator';
  $wp_roles->role_names['administrator'] = 'Operator';

  $wp_roles->roles['editor']['name'] = 'Admin';
  $wp_roles->role_names['editor'] = 'Admin';
}
add_action('init', 'change_role_name');
