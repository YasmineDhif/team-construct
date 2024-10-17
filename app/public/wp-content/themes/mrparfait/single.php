<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mrparfait
 */

get_header();
?>

<main id="primary" class="site-main container" style="background:purple">

    <?php
    if (have_posts()) :
        while (have_posts()) :
            the_post();
    ?>
            <h1><?php echo get_the_title(); ?></h1>

            <div class="contenu_client">
                <?php
                the_content();

                get_template_part(
                    'template-parts/cards/card-property',
                    'property',
                    [
                        'image_id' => get_post_thumbnail_id(),
                        'href' => get_permalink(),
                        'title' => get_the_title(),
                        'description' => "La description",
                        'price' => get_field('price_vate', ),
                        'area' => get_field('area' ),
                        'bedrooms' => get_field('bedrooms' ),
                        'bathrooms' => get_field('bathrooms' ),
                        'in_wishlist' => true,
                    ]
                    );
                ?>
            </div>
    <?php

        endwhile; // End of the loop.
    endif;
    ?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
