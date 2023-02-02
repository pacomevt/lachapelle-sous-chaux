<?php
  // Page header
  get_header();

?>

<main>
  <?php 
  $posts = new WP_Query( array( 'post_type' => 'actualite' ) );

  if ( $posts->have_posts() ) {
    while ( $posts->have_posts() ) {
      $posts->the_post();
      ?>
      <div class="article-container">
        <div class="article-img" style="background-image:url('<?php the_post_thumbnail_url(); ?>');"></div>
        <div class='article-text'>
          <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
          <p><?php the_excerpt(); ?></p>
        </div>
      </div>
      <?php
    }
  } else {
    echo 'No posts';
  }
  ?>

</main>
<?php
  // Reset post data
  wp_reset_postdata();

  // Page footer
  get_footer();
?>