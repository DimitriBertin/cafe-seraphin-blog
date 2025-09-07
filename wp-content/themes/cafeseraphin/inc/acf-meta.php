<?php


// ADD SEO PER PAGE
if( function_exists('acf_add_local_field_group') ):
  $location = ['page', 'post'];
  
  $locations = [];

  foreach($location as $value) {
    $locations[] =  array(
      array(
        'param' => 'post_type',
        'operator' => '==',
        'value' => $value,
      )
    );
  }

  $args = array(
    'key' => 'group_seo_meta',
    'title' => 'SEO',
    'fields' => array(
      array(
        'key' => 'field_seo_title',
        'label' => 'Meta Title',
        'name' => 'seo_title',
        'type' => 'text',
        'instructions' => 'Titre affiché dans l’onglet du navigateur et dans les résultats Google.',
      ),
      array(
        'key' => 'field_seo_description',
        'label' => 'Meta Description',
        'name' => 'seo_description',
        'type' => 'textarea',
        'rows' => 2,
        'instructions' => 'Résumé de la page pour les moteurs de recherche.',
      ),
      array(
        'key' => 'field_seo_image',
        'label' => 'Image Open Graph (réseaux sociaux)',
        'name' => 'seo_image',
        'type' => 'image',
        'return_format' => 'url',
        'preview_size' => 'medium',
        'instructions' => 'Image utilisée lors du partage sur les réseaux sociaux.',
      ),
    ),
    'location' => $locations,
    'menu_order' => 0,
    'position' => 'normal',
    'style' => 'default',
    'label_placement' => 'top',
    'instruction_placement' => 'label',
    'hide_on_screen' => ACF_hide()
  );

  acf_add_local_field_group($args);

  
endif; 

