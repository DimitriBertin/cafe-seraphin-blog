<?php
function getfield_image($key, $where) {
  $icon = '<svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 24 24" width="16"><path d="M21 19V5c0-1.1-.9-2-2-2H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2zM8.5 13.5l2.5 3.01L14.5 12l4.5 6H5l3.5-4.5z" fill="currentColor" /></svg>';

  $fields = [
    [
      'key' => $key.'_image-image',
      'label' => '',
      'name' => 'image',
      'type' => 'image',
      'preview_size' => 'thumbnail',
      'required' => 1,
    ],
    [
      'key' => $key.'_image-width',
      'label' => 'Width',
      'name' => 'width',
      'type' => 'range',
      'required' => 1,
      'default_value' => 100,
      'min' => 1,
      'max' => 100,
      'step' => 1,
    ],
    [
      'key' => $key.'_image-alignment',
      'label' => 'Alignment',
      'instructions' => 'Note: only works if width is lower than 100%',
      'name' => 'alignment',
      'aria-label' => '',
      'type' => 'acfe_image_selector',
      'instructions' => '',
      'required' => 1,
      'choices' => [
        'left' => ACF_icon_left(),
        'center' => ACF_icon_center(),
        'right' => ACF_icon_right(),
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
      'conditional_logic' => [
        [
          [
            'field' => $key.'_image-width',
            'operator' => '<',
            'value' => 100,
          ],
        ]
      ]
    ],
    [
      'key' => $key.'_image-caption',
      'label' => 'Caption',
      'name' => 'caption',
      'type' => 'text',
    ],
  ];

  
  $layout = [
    'key' => $key.'_layout-image',
    'label' => $icon . ' Image',
    'name' => '_image',
    'display' => 'block',
    'sub_fields' => $fields,
  ];

  return $layout;
};