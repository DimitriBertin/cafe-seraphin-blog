<?php
function getfield_space($key = 'field_', $where = '') {


  $icon = '<svg style="vertical-align: bottom;" stroke="currentColor" fill="none" stroke-width="0" viewBox="0 0 24 24" height="16px" width="16px" xmlns="http://www.w3.org/2000/svg"><path d="M5 5V9H19V5H17V7H7V5H5Z" fill="currentColor"></path><path d="M5 19V15H19V19H17V17H7V19H5Z" fill="currentColor"></path><path d="M7 11H17V13H7V11Z" fill="currentColor"></path></svg>';

  $fields = [
    [
      'key' => $key.'_space-margin',
      'label' => 'Vertical margin',
      'name' => 'my',
      'type' => 'range',
      'required' => 1,
      'conditional_logic' => 0,
      'default_value' => 1,
      'min' => 1,
      'max' => 5,
      'step' => 1,
      'instructions' => '1: small ( = 24px ) / 5: big (= 116px)'
    ],
  ];
  
  $layout = [
    'key' => 'layout-space',
    'label' => $icon . ' Space',
    'name' => '_space',
    'display' => 'block',
    'sub_fields' => $fields,
  ];

  return $layout;
};