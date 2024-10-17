<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mrparfait
 */

?>

<footer id="colophon" class="site-footer">
    <h1>Footer titre temporaire</h1>

    <?php
    wp_nav_menu([
        'theme_location' => 'menu-footer',
        'menu_class' => 'menu',
        'container' => 'nav',
        'container_class' => 'menu-footer'
    ]);

    ?>

</footer><!-- #colophon -->
</div><!-- #page -->

<!-- Start wp footer -->
<?php wp_footer(); ?>
<!-- End wp footer -->

</body>

</html>