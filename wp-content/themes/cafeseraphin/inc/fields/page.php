<?php

if( function_exists('acf_add_local_field_group') ):
  $key = 'field_page';

  $blocks = array(
    'main' => [
      'title' => 'Content',
      'fields' => [
        [
          'key' => $key.'_main-flexible',
          'label' => '',
          'name' => 'main',
          'type' => 'flexible_content',
          'acfe_flexible_async' => [
            0 => 'layout',
          ],
          'acfe_flexible_add_actions' => [
            0 => 'toggle',
            1 => 'copy',
          ],
          'layouts' => [
            getfield_wysiwyg($key, ''),
            getfield_image($key, ''),
          ],
          'button_label' => 'Ajouter un element',
        ],
      ]
    ],
    'sidebar' => [
      'title' => 'Sidebar',
      'fields' => [
        [
          'key' => $key.'_sidebar-message',
          'label' => '',
          'name' => '',
          'type' => 'message',
          'message' => 'La sidebar est la partie droite du site. Sur toutes les pages tu peux l\'activer ou la desactiver pour ajouter ou pas du contenu. Si elle est desactivé par default le contenu est centré au milieu...',
        ],
        [
          'key' => $key.'_sidebar-enabled',
          'label' => 'Activé ?',
          'name' => 'has-sidebar',
          'type' => 'true_false',
          'default_value' => 0,
          'ui' => 1,
        ],
        [
          'key' => $key.'_sidebar-flexible',
          'label' => '',
          'name' => 'sidebar-layout',
          'type' => 'flexible_content',
          'acfe_flexible_async' => [
            0 => 'layout',
          ],
          'acfe_flexible_add_actions' => [
            0 => 'toggle',
            1 => 'copy',
          ],
          'layouts' => [
            getfield_wysiwyg($key.'_sidebar_', ''),
            getfield_image($key.'_sidebar_', ''),
          ],
          'button_label' => 'Ajouter un element',
          'conditional_logic' => [
            [
              [
                'field' => $key.'_sidebar-enabled',
                'operator' => '==',
                'value' => 1,
              ],
            ]
          ]
        ],
      ]
    ],
  );

  $fields = ACF_constuct_tabs($key, $blocks);

  $args = array(
    'key' => $key,
    'title' => 'Content',
    'fields' => $fields,
    'location' => array(
      array(
        array(
          'param' => 'post_type',
          'operator' => '==',
          'value' => 'page',
        ),
      ),
    ),
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => ACF_hide()
  );

  acf_add_local_field_group($args);
endif;


