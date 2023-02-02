<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<body>
  
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php wp_head(); ?>
</head>

<header>
  <nav>
    <div class="container">
      <?php do_action( 'header_logo' ); ?>
      <div class="flex-container">
        <div class="flex-container">
          <?php
          wp_nav_menu( array(
           'theme_location'  => 'header_menu',
          ));
         ?>
        </div>
        <div class="search-container">
          <button href="#" id="menu-search-button"></button>

          <form id="menu-search-form" style="display:none" role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
          <label for="">Rechercher dans tout le site.</label>
          <input type="search" class="search-field" placeholder="Rechercher …" value="" name="s">
          <input type="submit" class="search-submit" value="Rechercher">
          </form>
        </div>

        <a id="toggle-menu-mobile" href="#">ToggleMenu</a>

      </div>
    </div>
  </nav>
  <?php
  function get_filtered_archive_title() {
  $title = the_archive_title();

  if (is_archive()) {
    $title = str_replace('Archive :', '', $title);
    return $title;
  }
  return '';
}

function title() {
  if (is_archive()) {
    $post_type = get_post_type();
    $post_type_object = get_post_type_object( $post_type );
    $title = $post_type_object->labels->name;
  } else {
    $title = get_the_title();
  }
  $title = str_replace('\&#39', '\'', $title);
  echo $title;
}
?>
  <?php if ( has_post_thumbnail() ) : ?>
          <div class="header-background" style="background-image:url('<?php the_post_thumbnail_url(); ?>');">
            <h1 class="entry-title"><?php title() ?></h1>
          </div>
        <?php else : ?>
          <div class="header-background" style="background-image:url('<?php  echo get_template_directory_uri().'/assets/img/basic_header.jpg' ?>');">
            <h1 class="entry-title"><?php title() ?></h1>
          </div>
        <?php endif; ?>
</header
<main>

