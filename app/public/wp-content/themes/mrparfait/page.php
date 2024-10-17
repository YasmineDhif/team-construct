<?php
get_header();
?>

<main id="primary" class="site-main container">

    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
    ?>
            <h1><?php echo get_the_title(); ?></h1>

            <div class="contenu_client">
                <?php
                the_content();
                ?>
            </div>
    <?php

        endwhile; // End of the loop.
    endif;
    ?>

</main><!-- #main -->



<?php
get_footer();
