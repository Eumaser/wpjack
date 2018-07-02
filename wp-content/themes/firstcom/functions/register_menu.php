<?php
function nav_setup() {
    // Register Nav Menus (because menus)
    // Takes in an array of menus to be used in Menus.
    // Parameters: function name => function label
    register_nav_menus(array(
	   'main_nav' => __('Main Navigation'),
      'sub_menu' => __('Sub-Menu')
    ));
}
add_action( 'after_setup_theme', 'nav_setup' );
?>
