<?php 

return [
  [
    'key' => 'field_tab_footer',
    'label' => 'Footer',
    'type' => 'tab',
    'placement' => 'top',
  ],
  [
    'key' => 'field_tab_footer-bottom-menu',
    'label' => 'Footer bottom menu',
    'name' => 'footer-bottom-nav',
    'type' => 'repeater',
    // 'instructions' => 'Add link',
    'min' => 0,
    'max' => 0,
    'layout' => 'row',
    'button_label' => 'Add link',
    'sub_fields' => [
      [
        'key' => 'field_tab_footer-bottom-link',
        'label' => 'Link',
        'name' => 'link',
        'type' => 'link',
      ]
    ],
  ],
];