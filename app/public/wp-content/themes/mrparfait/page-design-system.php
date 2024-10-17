<?php
/*
Template Name: Design System
*/
get_header(); ?>

<div class="design-system-content">
    <h1>Design System</h1>
    <p>Ceci est la page du Design System.</p>

    <h2>Exemple de titre H2</h2>
    <h3>Titres</h3>
    <h1>H1 - Titre Principal</h1>
    <h2>H2 - Sous-titre</h2>
    <h3>H3 - Titre de section</h3>
    <h4>H4 - Sous-section</h4>
    <h5>H5 - Titre mineur</h5>
    <h6>H6 - Titre le plus petit</h6>

    <h3>Paragraphes</h3>
    <p>Voici un exemple de paragraphe. Il devrait refléter la police et la taille définies pour les textes du site.</p>

    <h3>Liens</h3>
    <p><a href="#">Ceci est un lien de test</a></p>

    <h3>Listes</h3>
    <ul>
        <li>Premier élément de la liste</li>
        <li>Deuxième élément de la liste</li>
        <li>Troisième élément de la liste</li>
    </ul>

    <ol>
        <li>Premier élément de liste ordonnée</li>
        <li>Deuxième élément de liste ordonnée</li>
        <li>Troisième élément de liste ordonnée</li>
    </ol>

    <?php get_template_part('template-parts/button'); ?>
    <?php get_template_part('template-parts/button'); ?>

    <h1>Mes Boutons</h1>
    <h2>Mes boutons primaires</h2>
    <div class="bouton">
        <button class="btn">mon bouton "button"</button>
        <br/>
        <input class="btn" type="submit" value="mon bouton 'input'">
        <br/>
        <a href="#" class="btn">Mon bouton 'a'</a>
        <br/>
    </div>

    <?php get_template_part('template-parts/form/input'); ?>

    <?php
    $id_bien = 19;
    $biens = array(19, 26, 30);
    ?>
    <h1>Card</h1>
    <?php
    get_template_part(
        'template-parts/cards/card-property',
        'property',
        [
            'image_id' => get_post_thumbnail_id($id_bien),
            'href' => get_permalink($id_bien),
            'title' => get_the_title($id_bien),
            'description' => "La description",
            'price' => get_field('price_vate', $id_bien),
            'area' => get_field('area', $id_bien),
            'bedrooms' => get_field('bedrooms', $id_bien),
            'bathrooms' => get_field('bathrooms', $id_bien),
            'in_wishlist' => true,
        ]
    );
    ?>

    <h1>Liste de cards</h1>
    <div class="list-cards">
        <?php foreach ($biens as $id_bien) : ?>
            <?php
            get_template_part(
                'template-parts/cards/card-property',
                'property',
                [
                    'image_id' => get_post_thumbnail_id($id_bien),
                    'href' => get_permalink($id_bien),
                    'title' => get_the_title($id_bien),
                    'description' => "La description",
                    'price' => get_field('price_vate', $id_bien),
                    'area' => get_field('area', $id_bien),
                    'bedrooms' => get_field('bedrooms', $id_bien),
                    'bathrooms' => get_field('bathrooms', $id_bien),
                    'in_wishlist' => true,
                ]
            );
            ?>
        <?php endforeach; ?>
    </div>

</div>

<?php get_footer(); ?>
