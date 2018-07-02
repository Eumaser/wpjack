<?php
/*
    add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
    
    $page_title - The title to use on the page when the user clicks the link.
    $menu_title - The title of the menu.
    $capability - The capability of the user to display the menu.
    $menu_slug - The slug used for the menu.
    $function - This is the callback function to display the linked to page.
*/

function register_my_custom_menu_page(){
    add_menu_page( 'Custom Title Page', 'Custom Title', '', '/functions/custom_menu.php', '', plugins_url( '/img/custom_menu_icon.png' ));
}

add_action( 'admin_menu', 'register_my_custom_menu_page' );
?>