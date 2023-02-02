<?php

get_header();

while ( have_posts() ) :
  the_post();
  ?>

  <main>
    
  <div class="container my-5">

<?php the_content(); ?>
</div>
  </main>
  <?php
endwhile;

get_footer();

?>