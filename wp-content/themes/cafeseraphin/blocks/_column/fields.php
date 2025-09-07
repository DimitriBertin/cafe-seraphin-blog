<?php
function getfield_column($key) {
  $icon = '<svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 20 20" height="16" viewBox="0 0 20 20" width="16"><path d="M2,6.5h3v7H2V6.5z M15,6.5v7h3v-7H15z M6,5h8v10H6V5z"/></svg>';

  $child_key = $key.'_columnn';
  $where = 'column';

  $fields = [
    [
      'key' => $key.'_column-flexible',
      'label' => '',
      'name' => '_column_content',
      'type' => 'flexible_content',
      'acfe_flexible_async' => [
        0 => 'layout',
      ],
      'acfe_flexible_add_actions' => [
        0 => 'toggle',
        1 => 'copy',
      ],
      'layouts' => [
        getfield_wysiwyg($child_key, $where),
        getfield_button($child_key, $where),
        getfield_label($child_key, $where),
        getfield_image($child_key, $where),
        getfield_icon($child_key, $where),
        getfield_quote($child_key, $where),
        getfield_keyNumbers($child_key, $where),
        getfield_logos($child_key, $where),
        getfield_video($child_key, $where),
        getfield_testimonials($child_key, $where),
        // getfield_group($child_key, $where),
        getfield_accordeon($child_key, $where),
        getfield_separator($child_key, $where),
        getfield_space($child_key, $where),
        getfield_listContent($child_key, $where),
        getfield_offer($child_key, $where),
        getfield_listContentIcon($child_key, $where),
      ],
      'min' => 1,
      'max' => '',
      'button_label' => 'Add item',
    ],
    [
      'key' => $key.'_column-advanced-settings',
      'label' => '',
      'name' => '_column_advanced',
      'type' => 'group',
      'layout' => 'block',
      'acfe_group_modal' => 1,
      // 'acfe_group_modal_close' => 1,
      'acfe_group_modal_button' => 'Advanced settings',
      'acfe_group_modal_size' => 'small',
      'sub_fields' => [
        [
          'key' => $key.'_column-size',
          'label' => 'Column size',
          'name' => 'isFull',
          'type' => 'true_false',
          'default_value' => 0,
          'ui' => 1,
          'ui_on_text' => 'Full row',
          'ui_off_text' => 'Inherit',
        ],
        [
          'key' => $key.'_column-inline',
          'label' => 'Display element',
          'name' => 'inline',
          'type' => 'true_false',
          'default_value' => 0,
          'ui' => 1,
          'ui_on_text' => 'Inline',
          'ui_off_text' => 'Row',
        ],
        
      ],
    ],
  ];
  
  $columnLayout = [
    'key' => $key.'_layout-column',
    'label' => $icon . ' Column',
    'name' => '_column',
    'display' => 'block',
    'sub_fields' => $fields,
  ];

  return $columnLayout;
};