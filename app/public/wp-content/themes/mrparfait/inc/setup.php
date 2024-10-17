<?php

/*
 Charge les fonctions de base de thèmes de WordPress 
*/

if (!defined('_S_VERSION')) {
    // Replace the version number of the theme on each release.
    define('_S_VERSION', '1.0.0');
}

/*
 * Définit les paramètres par défaut du thème et enregistre le support de diverses fonctionnalités WordPress.
 */

function mrparfait_setup() {
    /*
        * Rend le thème disponible pour la traduction.
        * Les traductions peuvent être déposées dans le répertoire /languages/.
        * Si vous créez un thème basé sur mrparfait, utilisez la fonction de recherche et de remplacement
        * pour changer 'mrparfait' par le nom de votre thème dans tous les fichiers de modèle.
	*/

    load_theme_textdomain('mrparfait', get_template_directory() . '/languages');

    // Ajoute des liens RSS pour les articles et les commentaires dans l'en-tête du site.
    add_theme_support('automatic-feed-links');

    /*
        * Laisse WordPress gérer le titre du document.
        * En ajoutant la prise en charge du thème, nous déclarons que ce thème n'utilise pas de
        * balise <title> codée en dur dans l'en-tête du document, et nous attendons de WordPress qu'il le fasse pour nous.
	*/
    add_theme_support('title-tag');

    /*
        * Ajoute la prise en charge des images mises en avant sur les articles et les pages.
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
	*/
    add_theme_support('post-thumbnails');

    //Ce thème utilise wp_nav_menu()avec l'emplacement suivant.
    register_nav_menus(
        array(
            'menu-main' => "Menu principal",
            'menu-footer' => "Menu footer",
        )
    );

    /*
        * Change la balise de recherche, le formulaire de commentaire et les commentaires
        * pour générer du HTML5 valide.
	*/
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );
}
add_action('after_setup_theme', 'mrparfait_setup');
