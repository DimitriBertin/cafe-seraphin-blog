<?php 

function ad_enqueue_scripts()
{
  global $theme_version;
  // $vite_dev_flag = get_template_directory() . '/.vite-dev';
  // $is_DEV = file_exists($vite_dev_flag);
  // $dev_server = getenv('VITE_DEV_SERVER') ?: 'http://localhost:5173';
  
  $production = get_field('production', 'options');
  wp_enqueue_script('youtube-api', 'https://www.youtube.com/iframe_api', array(), $theme_version, true);

  wp_enqueue_script('app', get_template_directory_uri() . '/dist/app.js', array(), $theme_version, true);
  wp_localize_script('app', 'ajax', [
    'url' => admin_url('admin-ajax.php'),
    'nonce'    => wp_create_nonce('my_nonce')
  ]);

}

add_action('wp_enqueue_scripts', 'ad_enqueue_scripts');

function ad_enqueue_styles()
{
  global $theme_version;
    // wp_enqueue_style('fonts', get_template_directory_uri() . '/public/fonts.css', array(), $theme_version, 'all');
    wp_enqueue_style('app', get_template_directory_uri() . '/dist/app.css', array(), $theme_version, 'all');
  // }
}

add_action('wp_enqueue_scripts', 'ad_enqueue_styles');


// 
function custom_acf_admin_styles() {
    global $theme_version;

  wp_enqueue_style(
      'acf-custom-admin-style',
      get_template_directory_uri() . '/inc/admin.css',
      [],
      '1.0'
  );
  wp_enqueue_script('my-acf-js', get_template_directory_uri().'/inc/acf-toggle.js', [], null, true);

  wp_enqueue_script('iconpicker', get_template_directory_uri() . '/' .'inc/iconpicker.js' , $theme_version, true);
  $icons_json_url = get_template_directory_uri() . '/inc/material-icons.json';
  wp_localize_script('iconpicker', 'MaterialIconsData', [
      'jsonUrl' => $icons_json_url,
  ]);

}
add_action('acf/input/admin_enqueue_scripts', 'custom_acf_admin_styles');

add_filter('acf/fields/wysiwyg/toolbars', function($toolbars) {
  add_editor_style('inc/wysiwyg.css');
  return $toolbars;
});


function custom_enqueue_fa() {
  wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css' );
}
add_action( 'wp_enqueue_scripts', 'custom_enqueue_fa' );

function font_enqueue_admin_styles() {
  wp_enqueue_style(
    'admin-google-font',
    'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,100,0,0&display=swap',
    false
  );

}

add_action('admin_enqueue_scripts', 'font_enqueue_admin_styles');
