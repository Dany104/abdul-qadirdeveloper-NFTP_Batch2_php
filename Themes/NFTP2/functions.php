<?php
if ( ! function_exists( 'register_my_menus' ) ) {
function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'footer-menu' => __( 'Footer Menu' ),
      'features-footer-menu' => __( 'features Footer Menu' ),
      'resources-footer-menu' => __( 'Resources Footer Menu' ),
      'learning-footer-menu' => __( 'Learning Footer Menu' ),
      'about-footer-menu' => __( 'About Footer Menu' )
     )
   );
 }
 add_action( 'init', 'register_my_menus' );
}

 if ( ! function_exists( 'nftp2_sidebars' ) ) {

  // Register Sidebars
  function nftp2_sidebars() {
  
    $args = array(
      'id'            => 'sidebar-right-section',
      'name'          => __( 'rightside widgets section', 'nftp2' ),
      'description'   => __( 'Section Widgets.', 'nftp2' ),
      'before_title'  => '<h3 class="widget-title">',
      'after_title'   => '</h3>',
      'before_widget' => '<section id="%1$s" class="widget %2$s">',
      'after_widget'  => '</section>',
    );
    register_sidebar( $args );
  
  }
  add_action( 'widgets_init', 'nftp2_sidebars' );
  
  }
 // There are 2 types of hooks
 // 1. Action Hook
 // 2. Filter Hook



?>