<?php
function getfield_video($key = 'field_', $where = '') {
  $icon = '<svg style="vertical-align: bottom;" xmlns="http://www.w3.org/2000/svg" enable-background="new 0 0 24 24" height="16" viewBox="0 0 24 24" width="16"><path d="M20,4H4C2.9,4,2,4.9,2,6v12c0,1.1,0.9,2,2,2h16c1.1,0,2-0.9,2-2V6C22,4.9,21.1,4,20,4z M9.5,16.5v-9l7,4.5L9.5,16.5z" fill="currentColor"/></svg>';

  $fields = [
    [
      'key' => $key.'_video-isUrl',
      'label' => 'Video source',
      'name' => 'isUrl',
      'type' => 'true_false',
      'ui' => 1,
      'ui_on_text' => 'URL',
      'ui_off_text' => 'File',
      'default_value' => 0,
    ],
    [
      'key' => $key.'_video-video',
      'label' => 'Select a video file',
      'instructions' => 'Optimally less than 10 MB<br/>Supported formats: mp4, webm',
      'name' => 'video',
      'type' => 'file',
      'return_format' => 'array',
      'mime_types' => 'mp4,webm,ogg',
      'required' => 1,
      'conditional_logic' => [
        [
          [
            'field' => $key.'_video-isUrl',
            'operator' => '==',
            'value' => 0,
          ]
        ]
      ]
    ],
    [
      'key' => $key.'_video-url',
      'label' => 'Video URL',
      'instructions' => 'Supported services: YouTube, Vimeo',
      'name' => 'url',
      'type' => 'url',
      'required' => 1,
      'conditional_logic' => [
        [
          [
            'field' => $key.'_video-isUrl',
            'operator' => '==',
            'value' => 1,
          ]
        ]
      ]
    ],
    [
      'key' => $key.'_video-poster',
      'label' => 'Cover image (optional)',
      'instructions' => 'This is the image that will be displayed before the video is played.',
      'name' => 'poster',
      'type' => 'image',
      'preview_size' => 'thumbnail',
    ],
    [
      'key' => $key.'_video-advanced-settings',
      'label' => '',
      'name' => 'advanced',
      'type' => 'group',
      'layout' => 'block',
      'acfe_group_modal' => 1,
      // 'acfe_group_modal_close' => 1,
      'acfe_group_modal_button' => 'Advanced settings',
      'acfe_group_modal_size' => 'small',
      'sub_fields' => [
        $where != 'columnThird' ? [
          'key' => $key.'_video-width-isFull',
          'label' => 'Stretch to container width?',
          'instructions' => 'Note: only works if width is set to 100%',
          'name' => 'isFull',
          'type' => 'true_false',
          'default_value' => 0,
          'ui' => 1,
          'ui_on_text' => 'Yes',
          'ui_off_text' => 'No',
        ] : [],
        [
          'key' => $key.'_video-controls',
          'label' => 'Controls',
          'name' => 'controls',
          'type' => 'true_false',
          'default_value' => 1,
          'ui' => 1,
          'ui_on_text' => 'Show',
          'ui_off_text' => 'Hide',
          'conditional_logic' => [
            [
              [
                'field' => $key.'_video-isUrl',
                'operator' => '!=',
                'value' => 1,
              ]
            ]
          ]
        ],
        [
          'key' => $key.'_video-loop',
          'label' => 'Loop',
          'name' => 'loop',
          'type' => 'true_false',
          'default_value' => 0,
          'ui' => 1,
          'ui_on_text' => 'Enabled',
          'ui_off_text' => 'Disabled',
          'conditional_logic' => [
            [
              [
                'field' => $key.'_video-isUrl',
                'operator' => '!=',
                'value' => 1,
              ]
            ]
          ]
        ],
        [
          'key' => $key.'_video-autoplay',
          'label' => 'Autoplay',
          'instructions' => 'Note: Enabling autoplay will disable the <span style="color:black">Cover image</span> option and force <span style="color:black">Muted</span> to be enabled.',
          'name' => 'autoplay',
          'type' => 'true_false',
          'default_value' => 0,
          'ui' => 1,
          'ui_on_text' => 'Enabled',
          'ui_off_text' => 'Disabled',
          'conditional_logic' => [
            [
              [
                'field' => $key.'_video-isUrl',
                'operator' => '!=',
                'value' => 1,
              ]
            ]
          ]
        ],
        [
          'key' => $key.'_video-muted',
          'label' => 'Muted',
          'name' => 'muted',
          'type' => 'true_false',
          'default_value' => 0,
          'ui' => 1,
          'ui_on_text' => 'Muted',
          'ui_off_text' => 'Unmuted',
          'conditional_logic' => [
            [
              [
                'field' => $key.'_video-autoplay',
                'operator' => '==',
                'value' => 0,
              ],
              [
                'field' => $key.'_video-isUrl',
                'operator' => '!=',
                'value' => 1,
              ]
            ],
          ],
        ],
        [
          'key' => $key.'_video-aspect',
          'label' => 'Aspect Ratio',
          'name' => 'aspect',
          'type' => 'select',
          'choices' => [
            '16/9' => '16:9 - horizontal video',
            '9/16' => '9:16 - vertical video',
            '2/1' => '2:1 - horizontal widescreen',
            '21/9' => '21:9 - cinema',
            '1/1' => '1:1 - square',
            '4/5' => '4:5 - instagram',
            '4/3'  => '4:3 - landscape photo',
            '3/2' => '3:2 - landscape photo',
            '3/4' => '3:4 - portrait photo',
          ],
          'default_value' => '16/9',
        ],
        [
          'key' => $key.'_video-fit',
          'label' => 'Fit',
          'name' => 'fit',
          'type' => 'true_false',
          'default_value' => 1,
          'ui' => 1,
          'ui_on_text' => 'Cover',
          'ui_off_text' => 'Contain',
          'conditional_logic' => [
            [
              [
                'field' => $key.'_video-aspect',
                'operator' => '!=',
                'value' => 'auto',
              ],
              [
                'field' => $key.'_video-isUrl',
                'operator' => '!=',
                'value' => 1,
              ]
            ],
          ],
        ],
      ],
    ],
  ];
  
  $layout = [
    'key' => 'layout-video',
    'label' => $icon . ' Video',
    'name' => '_video',
    'display' => 'block',
    'sub_fields' => $fields,
  ];

  return $layout;
};