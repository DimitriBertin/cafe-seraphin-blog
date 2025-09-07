<?php 
add_action('acf/init', function() {
  if( function_exists('acf_add_options_page') ) {
      // 1. Ajouter la page d'options
      acf_add_options_page([
          'page_title' => 'Options du site',
          'menu_title' => 'General Options',
          'menu_slug'  => 'site-options',
          'capability' => 'edit_posts',
          'redirect'   => false,
      ]);
  }

  $global_options = require get_template_directory() . '/inc/options/global.php';
  $header_options = require get_template_directory() . '/inc/options/header.php';
  // $menu_options = require get_template_directory() . '/inc/options/menu.php';
  $footer_options = require get_template_directory() . '/inc/options/footer.php';
  // $contact_options = require get_template_directory() . '/inc/options/contact.php';
  // $social_options = require get_template_directory() . '/inc/options/social.php';
  // $cta_footer_options = require get_template_directory() . '/inc/options/cta-footer.php';
  // $page_options = require get_template_directory() . '/inc/options/page.php';
  // $formation_options = require get_template_directory() . '/inc/options/formation.php';

  // CONTACT 
  // 404
  // MENU 
  // NEWSLETTER
  // CTA FOOTER
  $fields = array_merge(
    $global_options,
    $header_options,
    // $menu_options,
    // $cta_footer_options,
    $footer_options,
    // $social_options,
    // $contact_options,
    // $page_options,
    // $formation_options,
    // $page_options,
  );

  acf_add_local_field_group([
      'key' => 'group_site_options',
      'title' => 'Options du site',
      'fields' => $fields,
      'location' => [
          [
              [
                  'param' => 'options_page',
                  'operator' => '==',
                  'value' => 'site-options',
              ],
          ],
      ],
  ]);
});