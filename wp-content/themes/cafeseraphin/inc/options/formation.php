<?php
return [
  [
    'key' => 'field_tab_formation',
    'label' => 'Formation',
    'type' => 'tab',
    'placement' => 'top',
  ],
  [
      'key' => 'global_formation_title',
      'label' => 'Title',
      'instructions' => 'Nos prochaines formations live + online',
      'name' => 'formation-title',
      'type' => 'text',
  ],
  [
      'key' => 'global_formation_content',
      'label' => 'Formation description',
      'instructions' => 'Vous ne pouvez pas assister aux formations live ? ...',
      'name' => 'formation-content',
      'type' => 'textarea',
      'rows' => 2,
      'new_lines' => 'br'
  ],
  [
      'key' => 'global_formation_no-event',
      'label' => 'No formation content',
      'name' => 'formation-none',
      'type' => 'textarea',
      'rows' => 2,
      'new_lines' => 'br'
  ],
  [
      'key' => 'global_formation_link-contact',
      'label' => 'Link to contact',
      'name' => 'formation-contact-link',
      'type' => 'link',
  ],
  [
      'key' => 'global_formation_flexible',
      'label' => 'Formation content',
      'name' => 'formation-flexible-layout',
      'type' => 'flexible_content',
      'acfe_flexible_async' => [
        0 => 'layout',
      ],
      'acfe_flexible_add_actions' => [
        0 => 'toggle',
        1 => 'copy',
      ],
      'min' => 4,
      'max' => 4,
      'layouts' => [
        getfield_contact('global_formation_contact'),
        getfield_testimonials(('global_formation_testimonial')),
        [
          'key' => 'global_formation_faq',
          'label' => '<svg style="vertical-align: bottom" stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 384 512" height="14px" width="14px" xmlns="http://www.w3.org/2000/svg"><path d="M202.021 0C122.202 0 70.503 32.703 29.914 91.026c-7.363 10.58-5.093 25.086 5.178 32.874l43.138 32.709c10.373 7.865 25.132 6.026 33.253-4.148 25.049-31.381 43.63-49.449 82.757-49.449 30.764 0 68.816 19.799 68.816 49.631 0 22.552-18.617 34.134-48.993 51.164-35.423 19.86-82.299 44.576-82.299 106.405V320c0 13.255 10.745 24 24 24h72.471c13.255 0 24-10.745 24-24v-5.773c0-42.86 125.268-44.645 125.268-160.627C377.504 66.256 286.902 0 202.021 0zM192 373.459c-38.196 0-69.271 31.075-69.271 69.271 0 38.195 31.075 69.27 69.271 69.27s69.271-31.075 69.271-69.271-31.075-69.27-69.271-69.27z"></path></svg> FAQ',
          'name' => 'faq',
          'display' => 'block',
          'sub_fields' => [
            [
              'key' => 'global_formation_faq-title',
              'label' => 'Title',
              'name' => 'title',
              'type' => 'text',
            ],
            [
              'key' => 'global_formation_faq-flexible',
              'label' => 'Accordeons',
              'name' => 'accordeon',
              'type' => 'flexible_content',
              'layouts' => [
                getfield_accordeon('global_formation_faq-flexible_col'),
              ],
              'button_label' => 'Add accordeon',
            ]
          ],
        ],
        [
          'key' => 'global_formation_people',
          'label' => '<svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="16px" width="16px" xmlns="http://www.w3.org/2000/svg"><path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M32 192 256 64l224 128-224 128L32 192z"></path><path fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M112 240v128l144 80 144-80V240m80 128V192M256 320v128"></path></svg> Teachers',
          'name' => 'teacher',
          'display' => 'block',
          'sub_fields' => [
            [
              'key' => 'global_formation_teacher-title',
              'label' => 'Title',
              'name' => 'title',
              'type' => 'text',
            ],
            [
              'key' => 'global_formation_teacher-flexible',
              'label' => '',
              'name' => 'teachers',
              'type' => 'flexible_content',
              'layouts' => [
                getfield_teacher('global_formation_teacher-flexible')
              ],
              'button_label' => 'Add teacher',
            ],

          ]
        ]
      ],
      'button_label' => 'Add section',
  ],
  [
      'key' => 'global_formation_related-title',
      'label' => 'Related title',
      'name' => 'related-formation-title',
      'type' => 'text',
  ],
  [
    
      'key' => 'global_formation_related-link',
      'label' => 'Related link',
      'name' => 'related-formation-link',
      'type' => 'link',
  ],
];