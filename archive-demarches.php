<?php
  // Page header
  get_header();

?>

<main>
  <?php 
  $posts = new WP_Query( array( 'post_type' => 'demarches' ) );

  if ( $posts->have_posts() ) {
    while ( $posts->have_posts() ) {
      $posts->the_post();
      ?>
      <div class="demarche-container">
      <h4><a href="#"><?php the_title(); ?></a></h4>
        <div class='demarche-text'>
          <p><?php the_content(); ?></p>
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

<script>
  document.addEventListener("DOMContentLoaded", function() {
    var toggleContents = document.querySelectorAll(".demarche-container h4 a");
    toggleContents.forEach(function(toggleContent) {
      toggleContent.addEventListener("click", function(event) {
        event.preventDefault();
        var demarcheText = this.parentElement.nextElementSibling;
        demarcheText.style.display = demarcheText.style.display === "none" ? "block" : "none";
      });
    });
    var textsContent = document.querySelectorAll(".demarche-container > div");
    textsContent.forEach(text => {
        console.log(text)
        text.style.display = 'none';
    })
  });

</script>
