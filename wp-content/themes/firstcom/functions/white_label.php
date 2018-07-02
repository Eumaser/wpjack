<?php
// Customise the footer of admin area
function change_admin_footer () {
	echo 'Content Management System developed by <a href="http://firstcom.com.sg/" target="_blank">Firstcom Solutions</a>.';
}
add_filter('admin_footer_text', 'change_admin_footer');

// Remove the version in the footer of admin area for everyone except admin
function remove_admin_footer() {
    if ( ! current_user_can('manage_options') ) {
        remove_filter( 'update_footer', 'core_update_footer' ); 
    }
}
add_action('admin_menu','remove_admin_footer');

// Remove links in admin bar
function remove_admin_bar_link() {
    global $wp_admin_bar;
    // wp logo
    $wp_admin_bar->remove_menu('wp-logo');
    // visit site under home
    $wp_admin_bar->remove_menu('view-site');
    // comment
    $wp_admin_bar->remove_menu('comments');
    // new content
    $wp_admin_bar->remove_menu('new-content');
}
add_action('wp_before_admin_bar_render', 'remove_admin_bar_link');

// Change admin page title and remove wordpress
function my_admin_title($admin_title, $title)
{
    return get_bloginfo('name').' &bull; '.$title;
}
add_filter('admin_title', 'my_admin_title', 10, 2);

// Add favicon to login and admin panel
function add_favicon() {
    echo '<link rel="shortcut icon" href="' . get_stylesheet_directory_uri() . '/functions/admin/favicon.ico" />';
}
add_action('login_head', 'add_favicon');
add_action('admin_head', 'add_favicon');

// Remove admin profile color picker
remove_action( 'admin_color_scheme_picker', 'admin_color_scheme_picker' );
?>