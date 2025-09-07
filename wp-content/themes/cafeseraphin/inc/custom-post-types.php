<?php

// Case Studies
function cpt_cours() {
  $labels = array(
    'name'               => 'Cours',
    'singular_name'      => 'Cours',
    'menu_name'          => 'Cours',
    'name_admin_bar'     => 'Cours',
    'add_new'            => 'Ajouter un nouveau',
    'add_new_item'       => 'Ajouter un nouveau cours',
    'new_item'           => 'Nouveau cours',
    'edit_item'          => 'Modifier le cours',
    'view_item'          => 'Voir le cours',
    'all_items'          => 'Tous les cours',
    'search_items'       => 'Rechercher un cours',
    'not_found'          => 'Aucun cours trouvé',
    'not_found_in_trash' => 'Aucun cours trouvé dans la corbeille'
);

$args = array(
    'labels'             => $labels,
    'public'             => true,
    'publicly_queryable' => true,
    'show_ui'            => true,
    'show_in_menu'       => true,
    'menu_icon'          => 'dashicons-welcome-learn-more', // Icône adaptée aux cours
    'query_var'          => true,
    'rewrite'            => array( 'slug' => 'cours' ),
    'capability_type'    => 'post',
    'has_archive'        => true,
    'hierarchical'       => false,
    'menu_position'      => 20,
    'show_in_rest'       => true, // Compatible Gutenberg / API REST
    'supports'           => array( 'title',  ),
    'taxonomies'         => array( ) // Catégories & tags par défaut
);

register_post_type( 'cours', $args );
}
add_action( 'init', 'cpt_cours');
