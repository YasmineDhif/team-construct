<h3>Formulaire</h3>
    <?php get_template_part(
        'template-parts/forms/input',
        'input',
        array(
            "label" => "Nom",
            "labelinfo" => "Requis",
            "type" => "text",
            "placeholder" => "Nom"
        )
    )
    ?>
    <?php get_template_part(
        'template-parts/forms/input',
        'input',
        array(
            "label" => "Prénom",
            "labelinfo" => "Requis",
            "type" => "text",
            "placeholder" => "Prénom"
        )
    )
    ?>
    <?php get_template_part(
        'template-parts/forms/input',
        'input',
        array(
            "label" => "Email",
            "labelinfo" => "Requis",
            "type" => "email",
            "placeholder" => "Email"
        )
    )
    ?>
    <?php get_template_part(
        'template-parts/forms/input',
        'input',
        array(
            "label" => "Mot de passe",
            "labelinfo" => "Requis",
            "type" => "password",
            "placeholder" => "Mot de passe"
        )
    )
    ?>
    <?php get_template_part(
        'template-parts/forms/input',
        'input',
        array(
            "label" => "Téléphone",
            "value" => "+32",
            "type" => "tel",
            "placeholder" => "Téléphone"
        )
    )
    ?>

    