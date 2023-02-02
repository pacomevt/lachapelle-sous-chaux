
</main>
<footer>
<?php wp_nav_menu( array('theme_location'  => 'footer_menu')); ?>
<p> © 2023 Copyright Mairie de Lachapelle-sous-Chaux - Tous droits réservés I Accessibilité : Partiellement conforme, en cours d’élaboration</p>
</footer>


<script>
    ;
    document.addEventListener("DOMContentLoaded", function() {
    let menuSearchButton = document.querySelector('#menu-search-button');
    menuSearchButton.addEventListener("click", function(event) {
        event.preventDefault();
        const form = document.querySelector('#menu-search-form');
        form.style.display = form.style.display === "none" ? "block" : "none";
    });
  });
</script>
</body>
</html>