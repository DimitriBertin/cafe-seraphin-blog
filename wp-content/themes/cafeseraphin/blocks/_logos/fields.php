<?php
function getfield_logos($key = 'field_', $where = '') {
  $icon = '<svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="16" viewBox="0 0 24 24" width="16"><g><g><rect fill="currentColor" height="8" width="8" x="3" y="3"/><rect fill="currentColor" height="8" width="8" x="3" y="13"/><rect fill="currentColor" height="8" width="8" x="13" y="3"/><rect fill="currentColor" height="8" width="8" x="13" y="13"/></g></g></svg>';

  $fields = [
    [
      'key' => $key.'_logos-alignment',
      'label' => '',
      'name' => 'alignment',
      'aria-label' => '',
      'type' => 'acfe_image_selector',
      'instructions' => '',
      'required' => 1,
      'choices' => [
        'left' => ACF_icon_left(),
        'center' => ACF_icon_center(),
      ],
      'default_value' => 'left',
      'image_size' => 'thumbnail',
      'width' => '32',
      'height' => '32',
      'border' => 1,
      'return_format' => 'value',
      'allow_null' => 0,
      'multiple' => 0,
      'layout' => 'horizontal',
    ],
    [
      'key' => $key.'logos-mode',
      'label' => 'View',
      'name' => 'view',
      'type' => 'true_false',
      'message' => '',
      'default_value' => 0,
      'ui' => 1,
      'ui_on_text' => 'Slider',
      'ui_off_text' => 'Grid',
    ],
    [
      'key' => $key.'_logos-repeater',
      'label' => '',
      'name' => 'logos',
      'type' => 'repeater',
      'layout' => 'table',
      'button_label' => 'Add Logo',
      'wrapper' => [
        'class' => 'logos',
      ],
      'min' => 1,
      'sub_fields' => [
        [
          'key' => $key.'_logos-image',
          'label' => 'Image',
          'name' => 'image',
          'type' => 'image',
          'required' => true,
          'preview_size' => 'thumbnail',
          'library' => 'all',
          'mime_types' => 'jpg,jpeg,png,svg,webp',
        ],
        [
          'key' => $key.'_logos-link',
          'label' => 'Link (optional)',
          'name' => 'link',
          'type' => 'link',
        ],
        [
          'key' => $key.'_logos-scale',
          'label' => 'Control scale',
          'name' => 'scale',
          'type' => 'range',
          'required' => 1,
          'conditional_logic' => 0,
          'default_value' => 0,
          'min' => -6,
          'max' => 6,
          'step' => 1,
        ],
      ],
    ]
  ];
  
  $layout = [
    'key' => 'layout-logos',
    'label' => $icon . ' Logos',
    'name' => '_logos',
    'display' => 'block',
    'sub_fields' => $fields,
  ];

  return $layout;
};