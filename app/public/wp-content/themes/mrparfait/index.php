<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package mrparfait
 */

get_header();
?>

<main id="primary" class="site-main" style="min-height:75vh">
    <h1>Ceci est le template de mon blog (index)</h1>

    <?php
    if (have_posts()) :
    ?>
        <ul class="list-cards">

            <?php
            /* Start the Loop */
            while (have_posts()) :
                the_post();
            ?>
                <li>
                    <article>
                        <?php the_post_thumbnail('large'); ?>
                        <div class="content">
                            <?php the_date() ?>
                            <h4><?php the_title() ?></h4>
                            <?php the_excerpt() ?>
                            <a href="<?php echo get_permalink() ?>">
                                En savoir plus
                            </a>
                        </div>
                    </article>

                </li>

            <?php
            endwhile;
            ?>
        </ul>
    <?php
        //next/previous
        the_posts_navigation();

        //1,2,3
        echo "<div class='pagination-number'>" . paginate_links() . "</div>";
    else :

        echo "Pas d'articles";

    endif;
    ?>

</main><!-- #main -->

<?php
get_sidebar();
get_footer();
