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

?>
  <?php
  $search = get_search_query();
  if ( has_post_thumbnail() ) :
  
  ?>
          <div class="header-background" style="background-image:url('<?php the_post_thumbnail_url(); ?>');">
            <h1 class="entry-title">Résultats pour : <?php echo $search ?></h1>
          </div>
        <?php else : ?>
          <div class="header-background" style="background-image:url('<?php  echo get_template_directory_uri().'/assets/img/basic_header.jpg' ?>');">
            <h1 class="entry-title">Résultats pour : <?php echo $search ?></h1>
          </div>
        <?php endif; ?>
</header
<main>



  <main>
    
  <div class="container my-5">


<form id="search-form" role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
<label for="">Rechercher dans tout le site.</label>
<div class="container">
<input type="search" id='form-bar' class="search-field" placeholder="Rechercher …" value="" name="s">
<input type="submit" id='form-submit' class="search-submit" value="Rechercher">
</div>
</form>
<?php





// Requête de recherche
$args = array(
  's' => $search,
  get_post_types( array( 'public' => true ) ), // Recherche dans les articles et les pages
  'posts_per_page' => -1 // Récupération de tous les articles trouvés
);
$query = new WP_Query( $args );

if ( $query->have_posts() ) { ?>
  <h2>Résultats de la recherche pour : <?php echo $search; ?></h2>
  <ul>
    <?php while ( $query->have_posts() ) {
      $query->the_post(); ?>
      <li>
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </li>
    <?php } ?>
  </ul>
  <?php wp_reset_postdata();
} else {
  echo 'Aucun résultat pour : ' . $search;
}



?>
</div>
  </main>
  <?php

get_footer();

?>