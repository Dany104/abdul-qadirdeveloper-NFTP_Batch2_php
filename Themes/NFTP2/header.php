<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="<?php bloginfo("stylesheet_directory"); ?>/assets/styles/nftpstyles.css" rel="stylesheet">
</head>
<body>
    <?php wp_body_open(); ?>
    <!-- <?php echo get_stylesheet_uri(); ?>
    <br>
    <?php echo get_stylesheet_directory_uri(); ?>
    <br/>
    <?php echo get_stylesheet_directory(); ?>
    <br>
    <?php echo get_stylesheet(); ?> -->
    <?php wp_nav_menu( [ 
      'theme_location' => 'header-menu',
      'container'=>'nav',
      'container_class'      => 'site-header sticky-top py-1',
      'items_wrap'           => '<div id="%1$s" class="%2$s container d-flex flex-column flex-md-row justify-content-between">%3$s</ul>',
    ] ); ?>