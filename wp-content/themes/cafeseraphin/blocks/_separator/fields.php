<?php
function getfield_separator($key = 'field_', $where = '') {
  global $enabledFeatures;

  $colors = [];
  if ($enabledFeatures['separator']['color']['primary'] == true) {
    $colors['primary'] = 'Primary';
  }
  if ($enabledFeatures['separator']['color']['secondary'] == true) {
    $colors['secondary'] = 'Secondary';
  }
  if ($enabledFeatures['separator']['color']['tertiary'] == true) {
    $colors['tertiary'] = 'Tertiary';
  }

  $icon = '<svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" height="16" viewBox="0 0 24 24" width="16"><path d="M19 13H5v-2h14v2z" fill="currentColor" /></svg>';
  
  $flags = ['columnThird', 'accordeon', 'columnSection'];

  $fields = [
    [
      'key' => $key.'_separator-margin',
      'label' => 'Vertical margin',
      'name' => 'my',
      'type' => 'range',
      'required' => 1,
      'conditional_logic' => 0,
      'default_value' => 1,
      'min' => 1,
      'max' => 3,
      'step' => 1,
      'conditional_logic' => [
        [
          [
            'field' => $key.'_separator-full-width-type',
            'operator' => '==',
            'value' => 'block',
          ],
        ],
      ],
    ],
    [
      'key' => $key.'_separator-advanced-settings',
      'label' => '',
      'name' => 'advanced',
      'type' => 'group',
      'layout' => 'block',
      'acfe_group_modal' => 1,
      // 'acfe_group_modal_close' => 1,
      'acfe_group_modal_button' => 'Advanced settings',
      'acfe_group_modal_size' => 'small',
      'sub_fields' => [
        [
          'key' => $key.'_separator-width',
          'label' => 'Width',
          'name' => 'width',
          'type' => 'range',
          'required' => 1,
          'default_value' => 100,
          'min' => 1,
          'max' => 100,
          'step' => 1,
        ],
        !in_array($where, $flags) ? [
          'key' => $key.'_separator-full-width-type',
          'label' => 'Full width type',
          'instructions' => 'Note: only works if width is set to 100%',
          'name' => 'fullWidthType',
          'type' => 'radio',
          'layout' => 'horizontal',
          'required' => 1,
          'default_value' => 'block',
          'choices' => [
            'block' => 'Containing block',
            'container' => 'Section paddings',
            'screen' => 'Full screen',
          ],
          'conditional_logic' => [
            [
              [
                'field' => $key.'_separator-width',
                'operator' => '==',
                'value' => 100,
              ],
            ],
          ],
          'wrapper' => [
            'class' => 'in-group-hidden in-accordeon-hidden in-column-hidden',
          ],
        ] : [],
        [
          'key' => $key.'_separator-alignment',
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
                'field' => $key.'_separator-width',
                'operator' => '<',
                'value' => 100,
              ],
            ]
          ]
        ],
        [
          'key' => $key.'separator-color',
          'label' => 'Color',
          'name' => 'color',
          'type' => 'radio',
          'required' => 1,
          'choices' => $colors,
          'default_value' => 'primary',
          'layout' => 'horizontal',
          'return_format' => 'value',
        ],
      ],
    ],
  ];
  
  $layout = [
    'key' => 'layout-separator',
    'label' => $icon . ' Separator',
    'name' => '_separator',
    'display' => 'block',
    'sub_fields' => $fields,
  ];

  return $layout;
};