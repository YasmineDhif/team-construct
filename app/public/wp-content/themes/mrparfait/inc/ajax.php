
<?php


add_action('init', function () {
    if (!session_id()) {
        session_start();
    }
});
function my_custom_ajax_handler() {
    // Récupérer la donnée envoyée par AJAX
    if (!isset($_POST["data_in_php"]))
		    wp_die();
		    
    $my_data_id = sanitize_text_field($_POST['data_in_php']);

    // Effectuer un traitement avec cette donnée
    $response = get_template_part('template-parts/cards/card-property', 'property', array(
        "image_id"=> get_post_thumbnail_id($my_data_id),
        "title" => $_POST["data_in_php"], 
        "href" => get_permalink($my_data_id),
        "description" => "La description",
        "price" => get_field('price_vate', $my_data_id),
        "area" => get_field('area', $my_data_id),
        "bedrooms" => get_field('bedrooms', $my_data_id),
        "bathrooms" => get_field('bathrooms', $my_data_id),
        "in_wishlist" => false,
    ));

    // Retourner la réponse au JavaScript
    echo $response;
    

    $response= $my_data_id;

    // Arrêter l'exécution du script
    wp_die();
}
add_action('wp_ajax_my_custom_action', 'my_custom_ajax_handler'); // Pour les utilisateurs connectés
add_action('wp_ajax_nopriv_my_custom_action', 'my_custom_ajax_handler'); // Pour les utilisateurs non connectés


function toggle_wishlist_handler() {
    if (!isset($_POST['item_id'])) {
        wp_send_json_error('ID de l’élément manquant');
        wp_die();
    }

    $item_id = sanitize_text_field($_POST['item_id']);
    $in_wishlist = false;

    
        // Gestion de la wishlist en session pour les utilisateurs non connectés
        if (!isset($_SESSION['wishlist'])) {
            $_SESSION['wishlist'] = [];
        }
        
        if (in_array($item_id, $_SESSION['wishlist'])) {
            $_SESSION['wishlist'] = array_diff($_SESSION['wishlist'], [$item_id]);
        } else {
            $_SESSION['wishlist'][] = $item_id;
            $in_wishlist = true;
        }
    

    wp_send_json_success(['in_wishlist' => $in_wishlist]);
    wp_die();
}
add_action('wp_ajax_toggle_wishlist', 'toggle_wishlist_handler');
add_action('wp_ajax_nopriv_toggle_wishlist', 'toggle_wishlist_handler');
?>