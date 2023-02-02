<?php
  // Page header
  get_header();
  ?>
  <main>
  <div class="service-container">
  <?php
  // Query posts 'services_d_etat'
  $services_d_etat_query = new WP_Query( array( 'post_type' => 'services_d_etat' ) );
  
  if ( $services_d_etat_query->have_posts() ) {
    while ( $services_d_etat_query->have_posts() ) {
      $services_d_etat_query->the_post();
      ?>
      <div class="service-item">
      <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
      <ul>
      <?php if (the_field("titre")) :?>
        <li><p><?php the_field("titre") ?></p></li>
      <?php endif;?>
      <?php if (the_field("description")) :?>
        <li><p><?php the_field("description") ?></p></li>
        <?php endif;?>
      <?php if (the_field("lieu")) :?>
        <li><p><?php the_field("lieu") ?></p></li>
        <?php endif;?>
      <?php if (the_field("adresse")) :?>
        <li><p><?php the_field("adresse") ?></p></li>
        <?php endif;?>
      <?php if (the_field("ville_et_code_postal")) :?>
        <li><p><?php the_field("ville_et_code_postal") ?></p></li>
        <?php endif;?>
      <?php if (the_field("telephone")) :?>
        <li><p> Téléphone : <?php the_field("telephone") ?></p></li>
        <?php endif;?>
      <?php if (the_field("fax")) :?>
        <li><p>Fax : <?php the_field("fax") ?></p></li>
        <?php endif;?>
      <?php if (the_field("mail")) :?>
        <li><a href=<?php the_field("site_web") ?>><?php the_field("mail") ?></a></li>
        <?php endif;?>
      <?php if (the_field("site_web")) :?>
        <li><?php the_field("site_web")?></li>
        <?php endif;?>
      <?php if (the_field("infos_supplementaires")) :?>
        <li><p><?php the_field("infos_supplementaires") ?></p></li>
      <?php endif;?>
</ul>
</div>
      <?php
    }
  } else {
    echo 'No services_d_etat found';
  }
  ?>

</div>
  </main>

  <?php
  // Reset post data
  wp_reset_postdata();

  // Page footer
  get_footer();
?>