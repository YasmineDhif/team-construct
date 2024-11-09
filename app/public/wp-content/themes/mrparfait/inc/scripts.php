<?php

/**
 * Charge les scripts et les styles du thème
 */
function mrparfait_scripts() {
    wp_enqueue_style('mrparfait-base', get_stylesheet_uri(), array(), _S_VERSION);
   /* $filetime = filemtime(get_template_directory() . '/css/theme.css');
    wp_enqueue_style('mrparfait-theme', get_template_directory_uri() . '/css/theme.css', array(),  $filetime);*/

    $filetime = filemtime(get_template_directory() . '/dist/styles/main.min.css');
    wp_enqueue_style('mrparfait-dist', get_template_directory_uri() . '/dist/styles/main.min.css', array(),  $filetime);

    wp_enqueue_script('mrparfait-js', get_template_directory_uri() . '/dist/scripts/main.min.js', array("jquery"),"1.0", true);
    wp_localize_script('mrparfait-js', 'my_ajax_object', array(
        'ajax_url' => admin_url('admin-ajax.php'),
     ));

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'mrparfait_scripts');