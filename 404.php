<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<header>
  <nav>
    <div class="container">
      <?php do_action( 'header_logo' ); ?>

      <div>
        <?php wp_nav_menu( array('theme_location'  => 'header_menu')); ?>
      </div>
      
      <a id="toggle-menu-mobile" href="#">ToggleMenu</a>

    </div>
  </nav>

          <div class="header-background" style="background-image:url('<?php  echo get_template_directory_uri().'/assets/img/basic_header.jpg' ?>');">
            <h1 class="entry-title">Oups, ette page n'existe pas</h1>
            <h4 style ='color:white'>( Erreur 404 )</h4>
          </div>
</header
<main>

