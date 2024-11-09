
<?php
/*
Template Name: Ma Wishlist
*/
get_header();

$wishlist = $_SESSION['wishlist'];
?>


    
<?php if (!empty($wishlist)): ?>
    <div class="wishlist-container">
        <?php foreach ($wishlist as $property_id): 
            $title = get_the_title($property_id);
            $image_id = get_post_thumbnail_id($property_id);
            $price = get_field('price_vate', $property_id);
            $area = get_field('area', $property_id);
            $bedrooms = get_field('bedrooms', $property_id);
            $bathrooms = get_field('bathrooms', $property_id);

            get_template_part('template-parts/cards/card-property', 'property', [
                'property_id' => $property_id,
                'image_id' => $image_id,
                'href' => get_permalink($property_id),
                'title' => $title,
                'price' => $price,
                'area' => $area,
                'bedrooms' => $bedrooms,
                'bathrooms' => $bathrooms,
                'in_wishlist' => true,
            ]);
        endforeach; ?>
    </div>
<?php else: ?>
    <p>Aucun élément dans la wishlist.</p>
<?php endif; ?>

<?php get_footer(); ?>

