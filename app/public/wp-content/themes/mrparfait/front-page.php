<?php
get_header();
?>

<main id="primary" class="site-main container debug-container">
    <h1>Ceci est le template de ma page d'accueil</h1>
    <?php
    while (have_posts()) :
        the_post();
        the_content();

    endwhile; // End of the loop.
    ?>

</main><!-- #main -->


<?php
get_footer();
