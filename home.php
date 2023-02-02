<?php
/*
Template Name: Homepage
*/
get_header();
?>

<style>
  h1 {color: black;}
</style>
<main class="main-accueil">
  <div class="actualites-group-container">
  <?php 
  $posts = new WP_Query( array( 'post_type' => 'actualite' ) );
  if ( $posts->have_posts() ) {
    echo '<h2>ACTUALITÉS</h2>';
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
  </div>


<?php 
 $args = array (
            'numberposts' => -1,
            'post_type' =>  'events',
            'post_status' => 'publish'
        );
        $events = get_posts( $args );
        foreach($events as $post) :
            setup_postdata( $post );?>


      <div><?php the_content(); ?></div>
  <?php endforeach; wp_reset_postdata(  )?>
  

<?php
  the_content();
?>



</main>


<?php
get_footer();
?>