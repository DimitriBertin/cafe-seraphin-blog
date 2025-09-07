<?php
function getfield_wysiwyg($key, $where = '') {
  $icon = '<svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 24 24" width="16"><path d="M2.5 4v3h5v12h3V7h5V4h-13zm19 5h-9v3h3v7h3v-7h3V9z" fill="currentColor" /></svg>';

  $fields = [
    [
      'key' => $key.'_wysiwyg-content',
      'label' => '',
      'name' => 'content',
      'type' => 'wysiwyg',
      'media_upload' => 0,
      'tabs' => 'visual',
      'acfe_wysiwyg_min_height' => 70,
      'acfe_wysiwyg_max_height' => '',
      'acfe_wysiwyg_valid_elements' => '',
      'acfe_wysiwyg_custom_style' => '',
      'acfe_wysiwyg_disable_wp_style' => 0,
      'acfe_wysiwyg_autoresize' => 1,
      'acfe_wysiwyg_disable_resize' => 1,
      'acfe_wysiwyg_remove_path' => 1,
      'acfe_wysiwyg_menubar' => 0,
      'acfe_wysiwyg_transparent' => 0,
      'acfe_wysiwyg_merge_toolbar' => 0,
      'acfe_wysiwyg_custom_toolbar' => 0,
      'acfe_wysiwyg_auto_init' => 0,
      'acfe_wysiwyg_height' => 70,
      'acfe_wysiwyg_toolbar_buttons' => array(),
    ],
  ];
  

  return [
    'key' => $key. '_layout_wysiwyg',
    'label' => $icon . ' Contenu',
    'name' => '_wysiwyg',
    'display' => 'block',
    'sub_fields' => $fields,
  ];
};