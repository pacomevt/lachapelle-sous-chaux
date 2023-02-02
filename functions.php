<?php

// Enregistrer des scripts et styles
    function loading_scripts_and_styles() {
        wp_enqueue_script( 'jquery', 'https://code.jquery.com/jquery-3.2.1.slim.min.js', array(), '3.2.1', true );
        wp_enqueue_script( 'bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js', array( 'jquery' ), null, true );
        wp_enqueue_style( 'bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css');
        wp_enqueue_style( 'style', get_stylesheet_uri() );
        wp_enqueue_style( 'custom-style', get_template_directory_uri() . '/style.css');
    }
    add_action('wp_enqueue_scripts', 'loading_scripts_and_styles');


remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'start_post_rel_link');
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'adjacent_posts_rel_link');

// Permettre les images mises en avant
add_theme_support( 'post-thumbnails' );

// Ajouter des tailles d'images personnalisées
add_image_size( 'thumbnail-large', 800, 600, true );

require_once get_template_directory() . '/menu_header/menu_header.php';

// Enregistrer les menus de navigation
register_nav_menus( array(
  'header_menu' => 'Header Menu',
  'footer_menu' => 'Footer Menu',
) );


// Limiter la longueur de l'excerpt à 55 mots
function custom_excerpt_length( $length ) {
  return 55;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Ajout de la fonction pour ajouter un logo personnalisé au header
function add_custom_logo() {
    echo '<a href="' . get_site_url() . '"><img src="' . get_template_directory_uri() . '/assets/logo/LSC-CARRE.png" alt="Logo de Lachappelle-sous-chaux" /></a>';
  }
  
  // Ajout de l'action pour afficher le logo dans le header
  add_action( 'header_logo', 'add_custom_logo' );



// require_once 'widgets/newsletteWidget.php';
function montheme_register_widget() {
  register_sidebar(
    [
      'id' => 'newsletter',
      'name' =>  'Newsletter Accueil'
    ],
  );
}
add_action('widgets_init', 'montheme_register_widget');
add_filter('show_admin_bar', '__return_false');


function add_menu_link_attributes( $atts, $item, $args ) {
  if ( $args->theme_location == 'header_menu' && in_array('menu-item-has-children', $item->classes) ) {
    $atts['href'] = '#';
  }
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_link_attributes', 10, 3 );


function my_search_form( $form ) {
  $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
  <div><label class="screen-reader-text" for="s">' . __( 'Rechercher :' ) . '</label>
  <input type="text" value="' . get_search_query() . '" name="s" id="s" />
  <input type="submit" id="searchsubmit" value="'. esc_attr__( 'Rechercher' ) .'" />
  </div>
  </form>';

  return $form;
}
add_filter( 'get_search_form', 'my_search_form' );
