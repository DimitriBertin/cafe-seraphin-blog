<?php 

return [
  [
    'key' => 'field_tab_social',
    'label' => 'Social',
    'type' => 'tab',
    'placement' => 'top',
  ],
  [
      'key' => 'field_social_title',
      'label' => 'Title',
      'name' => 'social-title',
      'type' => 'text',
  ],
  [
      'key' => 'field_social_links',
      'label' => 'Réseaux sociaux',
      'name' => 'social_links',
      'type' => 'repeater',
      'instructions' => 'Ajoutez vos réseaux sociaux',
      'collapsed' => 'field_social_network',
      'min' => 0,
      'max' => 0,
      'layout' => 'row',
      'button_label' => 'Ajouter un réseau',
      'sub_fields' => [
          [
              'key' => 'field_social_network',
              'label' => 'Réseau',
              'name' => 'network',
              'type' => 'select',
              'choices' => [
                  'facebook' => 'Facebook',
                  'instagram' => 'Instagram',
                  'twitter' => 'Twitter',
                  'linkedin' => 'LinkedIn',
                  'youtube' => 'YouTube',
                  'tiktok' => 'TikTok',
              ],
              'default_value' => false,
              'allow_null' => false,
              'multiple' => false,
              'ui' => true,
          ],
          [
              'key' => 'field_social_url',
              'label' => 'URL',
              'name' => 'url',
              'type' => 'url',
              'placeholder' => 'https://exemple.com',
          ],
      ],
  ],
];