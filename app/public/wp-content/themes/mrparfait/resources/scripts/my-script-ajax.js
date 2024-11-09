jQuery(document).ready(function($) {
    $('#my-button').on('click', function(e) {
        e.preventDefault(); // Empêche l'action par défaut du bouton

        $.ajax({
            url: my_ajax_object.ajax_url, // L'URL vers admin-ajax.php
            type: 'POST',
            data: {
                action: 'my_custom_action', // L'action à exécuter côté PHP
                data_in_php: data_id // Les données à envoyer au serveur
            },
            success: function(response) {
                // Affiche la réponse envoyée par PHP
                console.log('Réponse du serveur:', response);
                $('#result').html(response);
            }
        });
    });
});
jQuery(document).ready(function($) {
    $('.wishlist-button').on('click', function(e) {
        e.preventDefault();
        var $button = $(this);
        var data_id = $button.data('id');

        $.ajax({
            url: my_ajax_object.ajax_url,
            type: 'POST',
            data: {
                action: 'toggle_wishlist',
                item_id: data_id
            },
            success: function(response) {
                if (response.success) {
                    $button.toggleClass('active');
                } else {
                    alert('Erreur lors de l’ajout à la wishlist.');
                }
            },
            error: function() {
                console.error('Erreur AJAX');
            }
        });
    });
});

