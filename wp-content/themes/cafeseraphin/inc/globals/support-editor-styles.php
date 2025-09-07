<?php

/**
 * Editor Style Support
 */
add_theme_support('editor-styles');
add_editor_style('dist/editor-style.css');

// function gg_add_editor_style_to_pages() {
//   global $post;
//   if(isset($post->ID) && $post->ID !== 0){
//     $post_type = get_post_type( $post->ID );
//     if($post_type == 'page'){
//       add_editor_style('dist/app.min.css');
//     }
//   }
// }
// add_action( 'init', 'gg_add_editor_style_to_pages' );