<?php
/*
* Agregar tamaño de imágenes
*/

add_theme_support( 'post-thumbnails' );
add_image_size( 'slider', 1000, 400, true );

/**
 * Registrar dos menus para cabecera y footer.
 * 
 */

function register_my_menus() {
  register_nav_menus(
    array(
      'Principal' => __( 'Principal' )
    )
  );
}
add_action( 'init', 'register_my_menus' );

/**
 * Registrar dos menus para cabecera y footer.
 * 
 */

function codex_custom_init() {
  register_post_type(
    'historias', array(
      'labels' => array('name' => 'Historias', 'singular_name' => 'Historia'),
      'public' => TRUE,
    'rewrite' => array( 'slug' => 'historias' ),
    'has_archive' => TRUE,
    'supports' => array( 'title', 'editor', 'author', 'comments', 'thumbnail'),
    )
  );

}
add_action( 'init', 'codex_custom_init' );

function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
?>