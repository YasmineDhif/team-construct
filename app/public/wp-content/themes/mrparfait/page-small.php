<?php
/* Template Name: Small container */
get_header();
?>

<main id="primary" class="bg-grey site-main container container-small">
    <h1>Ceci est le template de ma page par défaut</h1>

    <?php
    while (have_posts()) :
        the_post();
        the_content();

    endwhile; // End of the loop.
    ?>

</main><!-- #main -->

<div class="admin">
    Mon texte est dans le code
</div>


<?php
get_footer();
