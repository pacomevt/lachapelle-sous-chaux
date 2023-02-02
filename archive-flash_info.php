<?php
  // Page header
  get_header();

?>

<main>
  <?php 
  $posts = new WP_Query( array( 'post_type' => 'flash_info' ) );

  if ( $posts->have_posts() ) {
    while ( $posts->have_posts() ) {
      $posts->the_post();
      ?>
      <div class="article-container">
        <div class='article-text'>
          <h4><a download href='<?php echo the_field("pdf") ?>'><?php the_title(); ?></a></h4>
          <iframe class="pdf-iframe" src='<?php echo the_field("pdf")?>' frameborder="0"></iframe>
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