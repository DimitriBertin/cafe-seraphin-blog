<?php
return [
  [
    'key' => 'field_tab_general',
    'label' => 'General',
    'type' => 'tab',
    'placement' => 'top',
  ],
  [
    'key' => 'field_logo',
    'label' => 'Logo',
    'name' => 'logo',
    'type' => 'image',
    // 'return_format' => 'url',
    'preview_size' => 'medium',
    'library' => 'all',
  ],

  [
    'key' => 'field_ga',
    'label' => 'Google analytics',
    'name' => 'ga',
    'type' => 'text',
    'maxlength' => 255,
    'placeholder' => 'ga-',
  ],
  [
    'key' => 'field_google_maps',
    'label' => 'Google maps',
    'name' => 'google_maps',
    'type' => 'text',
    'maxlength' => 255,
    'placeholder' => '',
  ],
];