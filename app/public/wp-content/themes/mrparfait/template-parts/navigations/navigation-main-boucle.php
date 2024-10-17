<?php
$menus_locations = get_nav_menu_locations();

$menu_items = wp_get_nav_menu_items($menus_locations['menu-main']);


if (!empty($menu_items)) :
    echo '<nav>';
    echo '<ul>';
    foreach ($menu_items as $item) :
        echo '<li>';
        echo '<a href="' . $item->url . '">' . $item->title . '</a>';
        echo '</li>';
    endforeach;
    echo '</ul>';
    echo '</nav>';
endif;
