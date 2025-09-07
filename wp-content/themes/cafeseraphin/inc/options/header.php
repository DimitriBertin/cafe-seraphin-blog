<?php 
return [
  [
    'key' => 'field_tab_header',
    'label' => 'Header',
    'type' => 'tab',
    'placement' => 'top',
  ],
  [
    'key' => 'field_tab_header-menu',
    'label' => 'Header Top menu',
    'name' => 'primary-nav',
    'type' => 'repeater',
    // 'instructions' => 'Add link',
    'collapsed' => 'field_tab_header-link',
    'min' => 0,
    'max' => 0,
    'layout' => 'row',
    'button_label' => 'Add link',
    'sub_fields' => [
      [
        'key' => 'field_tab_header-link_type',
        'label' => 'Type',
        'name' => 'menu_type',
        'type' => 'true_false',
        'default_value' => 0,
        'ui' => 1,
        'ui_on_text' => 'Link',
        'ui_off_text' => 'Submenu',
      ],
      [
        'key' => 'field_tab_header-link_title',
        'label' => 'Button Title',
        'instructions' => 'Add a button title to open / close navigation',
        'name' => 'submenu_title',
        'required' => 1,
        'type' => 'text',
        'conditional_logic' => [
          [
            [
              'field' => 'field_tab_header-link_type',
              'operator' => '==',
              'value' => 1,
            ],
          ]
        ]
      ],
      [
        'key' => 'field_tab_header-submenu_items',
        'label' => 'Links',
        'name' => 'submenu',
        'type' => 'repeater',
        'min' => 0,
        'max' => 0,
        'layout' => 'row',
        'button_label' => 'Add link',
        'sub_fields' => [
          [
            'key' => 'field_tab_header-submenu_link',
            'label' => 'Link',
            'name' => 'sublink',
            'type' => 'link',
          ],
          [
            'key' => 'field_tab_header-submenu_image',
            'label' => 'Image',
            'name' => 'image',
            'type' => 'image',
            'preview_size' => 'medium',
            'library' => 'all',
            'mime_types' => 'jpg,jpeg,png,svg,webp',
          ]
        ],
        'conditional_logic' => [
          [
            [
              'field' => 'field_tab_header-link_type',
              'operator' => '==',
              'value' => 1,
            ],
          ]
        ]
      ],
      [
        'key' => 'field_tab_header-link',
        'label' => 'Link',
        'name' => 'link',
        'type' => 'link',
        'conditional_logic' => [
          [
            [
              'field' => 'field_tab_header-link_type',
              'operator' => '==',
              'value' => 0,
            ],
          ]
        ]
      ]
    ],
  ]
];