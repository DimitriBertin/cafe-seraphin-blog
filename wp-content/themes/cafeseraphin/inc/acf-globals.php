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
