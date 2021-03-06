<?php
/*** ADD SCRIPTS AND STYLES ***/
function rw_scripts() {
  // styles
  wp_enqueue_style( 'fonts', 'https://fonts.googleapis.com/css?family=Cormorant+Garamond:300,300i|Open+Sans:300,700' );
  wp_enqueue_style( 'main-style', get_template_directory_uri() . '/main.css' );
  //wp_enqueue_style( 'main-style', get_stylesheet_uri() );

  // scripts
  wp_enqueue_script( 'main-script', get_template_directory_uri() . '/inc/script.js', array('jquery'), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'rw_scripts' );

/*** ADD MENUS ***/
add_action( 'init', 'register_my_menu' );
function register_my_menu() {
  register_nav_menu( 'primary-menu', __( 'Primary Menu' ) );
  //register_nav_menu( 'footer-menu', __( 'Footer Menu' ) );
}

/*** IMAGE SIZES ***/
add_theme_support('post-thumbnails');
add_image_size('Homepage Thumbnail',265,9999);
add_image_size('Homepage Mobile Thumbnail',210,210,true);
add_image_size('Mobile Max',668,668);
add_image_size('XLarge',2000,2000);
add_image_size('Large',1600,99999);
add_image_size('Med',1200,99999);
add_image_size('Small',800,99999);

function addMedium() {
    $labels = array(
        'name'              => 'Media',
        'singular_name'     => 'Medium',
        'search_items'      => 'Search Media',
        'all_items'         => 'All Media',
        'parent_item'       => 'Parent Medium',
        'parent_item_colon' => 'Parent Medium:',
        'edit_item'         => 'Edit Medium',
        'update_item'       => 'Update Medium',
        'add_new_item'      => 'Add New Medium',
        'new_item_name'     => 'New Medium Name',
        'menu_name'         => 'Medium',
    );

    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
        'query_var' => 'true',
        'rewrite' => 'true',
        'show_admin_column' => 'true',
    );

    register_taxonomy( 'medium', 'attachment', $args );
}
add_action( 'init', 'addMedium' );



// CONTACT FORM SHORTCODE
function contactform_func( $atts , $content = null ) {
  global $post;
  include('inc/contact.php');
  return $form;
}
function register_shortcodes(){
  add_shortcode ('contact','contactform_func' );
}
add_action( 'init', 'register_shortcodes');
?>
