<?php
  // Page header
  get_header();

  // Query posts 'services_d_etat'
  $services_d_etat_query = new WP_Query( array( 'post_type' => 'events' ) );

  if ( $services_d_etat_query->have_posts() ) {
    while ( $services_d_etat_query->have_posts() ) {
      $services_d_etat_query->the_post();
      ?>
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <?php the_content(); ?>
      <?php
    }
  } else {
    echo 'No services_d_etat found';
  }

  // Reset post data
  wp_reset_postdata();

  // Page footer
  get_footer();
?>