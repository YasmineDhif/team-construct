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

//on récupère la requête maqique de wp
global $wp_query;

//On récupère les variables de la requete
$query_vars = $wp_query->query_vars;

var2console($query_vars);

//On ajoute des paramètres à la requête (ici: on veut afficher les post 33 et 32)
//$query_vars["post__in"] = array(33,32);
//if(issets)
//$query_vars["s"]= "Bien";
/*$query_vars["meta_keys"]="price-vate";
$query_vars["meta_value"]="500000"*/

/*
$query_vars["meta_query"] = array(
    array(
        "key" => "price_vate",
        "value" => array(100000, 200000),
        "type" => "numeric",
        "compare" => "BETWEEN"
    )

);
*/



//On peut également ordonner l'affichage, par défaut c'est en DESC dans WP

/* $query_vars["meta_key"] = "price_vate";
$query_vars["orderby"] = "meta_value_num";
$query_vars["order"] = "ASC";
var2console($query_vars);*/


if (isset($_GET['search_model']) && !empty($_GET['search_model'])) {
    $query_vars["s"] = trim($_GET['search_model']);
}

if (isset($_GET['search_price_order']) && !empty($_GET['search_price_order'])) {
    $query_vars["meta_key"] = "price_vate";
    $query_vars["orderby"] = "meta_value_num";
    $query_vars["order"] = $_GET['search_price_order'];
}

if (isset($_GET['search_style']) && !empty($_GET['search_style'])) {
    $query_vars["tax_query"] = array(
        array(
            "taxonomy" => "style",
            "field" => "slug",
            "terms" => $_GET['search_style']
        )
    );
}
//On crée une nouvelle requête avec les paramètres modifiés

$wp_query = new WP_Query($query_vars);
$styles = get_terms(array(
    "taxonomy" => "style",
    "hide_empty" => true
));

?>

<main id="primary" class="site-main" style="min-height:75vh">
    <h1>Ceci est le template de mon archive (archive.php)</h1>


<form method="GET" style= "min-height: 75vh">
<?php
            $selectedAsc = false;
            if (isset($_GET['search_price_order']) && $_GET['search_price_order'] == "ASC") {
                $selectedAsc = "selected";
            }
            $selectedDesc = false;
            if (isset($_GET['search_price_order']) && $_GET['search_price_order'] == "DESC") {
                $selectedDesc = "selected";
            }
            ?>

            <?php get_template_part(
                'template-parts/form/select',
                'select',
                array(
                    "name" => "search_price_order",
                    "options" => array(
                        array(
                            "value" => "ASC",
                            "title" => "Prix croissant",
                            "selected" => $selectedAsc
                        ),

                        array(
                            "value" => "DESC",
                            "title" => "Prix décroissant",
                            "selected" => $selectedDesc
                        )
                    ),
                )
            )
            ?>

            <?php $value = false;
            if (isset($_GET['search_model'])) {
                $value = trim($_GET['search_model']);
            } ?>

            <?php get_template_part(
                'template-parts/form/input',
                'input',
                array(
                    "name" => "search_model",
                    "type" => "text",
                    "placeholder" => "Rechercher un modèle",
                    "value" => $value
                )
            )
            ?>



            <?php

            $options = array();
            $options[0] = array(
                "value" => "",
                "title" => "Types",
                "selected" => false,
            );
            foreach ($styles as $key => $style):
                $options[$key + 1]["value"] = $style->slug;
                $options[$key + 1]["title"] = $style->name;
                $options[$key + 1]["selected"] = false;
                if (isset($_GET['search_style']) && $_GET['search_style'] == $style->slug) {
                    $options[$key + 1]["selected"] = true;
                }
            endforeach;
            ?>

            <?php get_template_part(
                'template-parts/form/select',
                'select',
                array(
                    "name" => "search_style",
                    "options" => $options
                )
            )
            ?>




            <button type="submit">Rechercher</button>
        </div>
    </form>


    <?php
    if (have_posts()) :
    ?>
        <ul class="list-cards">

            <?php
            /* Start the Loop */
            while (have_posts()) :
                the_post();
            
                 get_template_part(
        'template-parts/cards/card-property',
        'property',
        [
            'image_id' => get_post_thumbnail_id(),
            'href' => get_permalink(),
            'title' => get_the_title(),
            'description' => "La description",
            'price' => get_field('price_vate' ),
            'area' => get_field('area'),
            'bedrooms' => get_field('bedrooms'),
            'bathrooms' => get_field('bathrooms'),
            'in_wishlist' => true,
        ]
    );

            
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
