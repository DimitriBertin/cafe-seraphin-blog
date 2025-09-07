<?php

function ACF_hide($exceptions = []) {
  return array(
    'the_content',
    'excerpt',
    'custom_fields',
    'discussion',
    'comments',
    'revisions',
    'slug',
    'author',
    'format',
    'featured_image',
    'tags',
  );
}

function ACF_constuct_tabs($key, $blocks) {
  $fields = array();
  
  foreach($blocks as $name => $block) {
    $fields[] = array(
      'key' => $key.'_'.$name,
      'label' => $block['title'],
      'name' => '',
      'type' => 'tab',
      'placement' => 'top',
    );

    if (!empty($block['fields']) && is_array($block['fields'])) {
      foreach ($block['fields'] as $field) {
          $fields[] = $field;
      }
    }
  }
  
  return $fields;
}


function ACF_icon_left() {
  return get_template_directory_uri().'/public/icons/icon-align-left.svg';
}

function ACF_icon_right() {
  return get_template_directory_uri().'/public/icons/icon-align-right.svg';
}

function ACF_icon_center() {
  return get_template_directory_uri().'/public/icons/icon-align-center.svg';
}

function ACF_icon_top() {
  return get_template_directory_uri().'/public/icons/icon-top.svg';
}

function ACF_icon_middle() {
  return get_template_directory_uri().'/public/icons/icon-center.svg';
}

function ACF_icon_bottom() {
  return get_template_directory_uri().'/public/icons/icon-bottom.svg';
}
