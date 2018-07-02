<?php
/*
Author: Firstcom Solutions
URL: http://firstcom.com.sg/
*/

/***********************************************************
    LOAD WEBSITE CSS AND JS
    Load the theme's stylesheet and scripts
    ***********************************************************/

// Replaces WP default jQuery with Google CDN version
    if(!is_admin()){
        wp_deregister_script('jquery');
        wp_register_script('jquery', ("http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"), false, '2.1.3');
        wp_enqueue_script('jquery');
    }

// Register Custom Script
// Parameters: wp_enqueue_script(name handler, url path, dependencies, version number, placement);
// replace 'jquery' with any dependency the script requires, or simply put false if it's stand-alone
// if the last parameter is true, the script will be placed in wp_footer(), otherwise it's placed in wp_head()
// Register Custom Style
// Parameters: wp_enqueue_style(name handler, url path, dependencies, version number);
    function custom_scripts_and_styles() {
        $path = get_stylesheet_directory_uri();


    // Font: Open Sans
        wp_enqueue_style( 'Open Sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700', false, false );

    // Normalize.css
        wp_enqueue_style( 'normalize', $path.'/bower_components/normalize.css/normalize.css', false, false );

    //Bootstrap
        wp_enqueue_style( 'bootstrap', $path.'/components/bootstrap/css/bootstrap.css', false, false );
        wp_enqueue_script( 'bootstrap', $path.'/components/bootstrap/js/bootstrap.min.js', array( 'jquery' ), false, true );


    // Font: Open Sans
        wp_enqueue_style( 'Open Sans', 'http://fonts.googleapis.com/css?family=Open+Sans:400,700', false, false );

    // Normalize.css
        wp_enqueue_style( 'normalize', $path.'/bower_components/normalize.css/normalize.css', false, false );

    //Bootstrap
        wp_enqueue_style( 'bootstrap', $path.'/components/bootstrap/css/bootstrap.css', false, false );
        wp_enqueue_script( 'bootstrap', $path.'/components/bootstrap/js/bootstrap.min.js', array( 'jquery' ), false, true );

    // Fancybox
    //wp_enqueue_style( 'fancybox', $path.'/bower_components/fancybox/source/jquery.fancybox.css', false, false );
    //wp_enqueue_script( 'fancybox', $path.'/bower_components/fancybox/source/jquery.fancybox.pack.js', array( 'jquery' ), false, true );

    // jPages
    //wp_enqueue_style( 'jpages', $path.'/bower_components/jPages/css/jPages.css', false, false );
    //wp_enqueue_script( 'jpages', $path.'/bower_components/jPages/js/jPages.min.js', array( 'jquery' ), false, true );

    // jQuery UI: Accordion, Tabs, etc
    //wp_enqueue_script( 'jquery-ui', $path.'/bower_components/jquery-ui/jquery-ui.min.js', array( 'jquery' ), false, true );

    // Mmenu
    //wp_enqueue_style( 'mmenu', $path.'/bower_components/jQuery.mmenu/dist/css/jquery.mmenu.all.css', false, false );
    //wp_enqueue_script( 'mmenu', $path.'/bower_components/jQuery.mmenu/dist/js/jquery.mmenu.min.all.js', array( 'jquery' ), false, true );

    // Malihu Custom Scrollbar
    //wp_enqueue_style( 'malihu-custom-scrollbar', $path.'/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.min.css', false, false );
    //wp_enqueue_script( 'malihu-custom-scrollbar', $path.'/bower_components/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js', array( 'jquery' ), false, true );

    // Magnific Popup
    //wp_enqueue_style( 'magnific-popup', $path.'/bower_components/magnific-popup/dist/magnific-popup.css', false, false );
    //wp_enqueue_script( 'magnific-popup', $path.'/bower_components/magnific-popup/dist/jquery.magnific-popup.min.js', array( 'jquery' ), false, true );

    // Masonry
    //wp_enqueue_script( 'masonry', $path.'/bower_components/masonry/dist/masonry.pkgd.min.js', array( 'jquery' ), false, true );

    // Master Slider
    wp_enqueue_style( 'masterslider', $path.'/components/masterslider/style/masterslider.css', false, false );
    wp_enqueue_style( 'masterslider-skin', $path.'/components/masterslider/skins/default/style.css', false, false );
    wp_enqueue_script( 'masterslider', $path.'/components/masterslider/masterslider.min.js', array( 'jquery' ), false, true );

    //Pretty Photo
    wp_enqueue_style( 'prettyphoto', $path.'/components/masterslider/prettyphoto/css/prettyphoto.css', false, false );
    wp_enqueue_style( 'prettyphoto-skin', $path.'/components/masterslider/prettyphoto/style/ms-lightbox.css', false, false );
    wp_enqueue_script( 'prettyphoto', $path.'/components/masterslider/prettyphoto/js/jquery.prettyPhoto.js', array( 'jquery' ), false, true );


    // Mixitup
    //wp_enqueue_script( 'mixitup', $path.'/bower_components/mixitup/build/jquery.mixitup.min.js', array( 'jquery' ), false, true );
    //wp_enqueue_script( 'mixitup-pagination', $path.'/components/mixitup-pagination/build/jquery.mixitup-pagination.min.js', array( 'jquery' ), false, true );

    // Parallax
    //wp_enqueue_script( 'parallax', $path.'/bower_components/parallax/deploy/jquery.parallax.min.js', array( 'jquery' ), false, true );

    // Skrollr
    //wp_enqueue_script( 'skrollr', $path.'/bower_components/skrollr/dist/skrollr.min.js', array( 'jquery' ), false, true );

    // Slick
    //wp_enqueue_style( 'slick', $path.'/bower_components/slick.js/slick/slick.css', false, false );
    //wp_enqueue_script( 'slick', $path.'/bower_components/slick.js/slick/slick.min.js', array( 'jquery' ), false, true );

    // WOW + Animate
    //wp_enqueue_style( 'animate', $path.'/bower_components/animate.css/animate.min.css', false, false );
    //wp_enqueue_script( 'wow', $path.'/bower_components/WOW/dist/wow.min.js', array( 'jquery' ), false, true );


    // Default Style
        wp_enqueue_style( 'style', get_stylesheet_uri(), false, false );

    // Default Script
        wp_enqueue_script( 'script', $path.'/main.js', array( 'jquery' ), false, true );
    }
    add_action( 'wp_enqueue_scripts', 'custom_scripts_and_styles', 20 );



/***********************************************************
    ADD ADMIN AND LOGIN CSS

    Add a custom stylesheet for admin and login panel.
    ***********************************************************/

    require_once( 'functions/add_admin_and_login_css.php' );



/***********************************************************
    ADD ADMIN MENU

    Add a new custom menu inside the admin panel.
    ***********************************************************/

//require_once( 'functions/add_admin_menu.php' );



/***********************************************************
    ADD OPTION MENU

    Add a new option menu inside the admin panel.
    Only works if you have ACF PRO installed.
    ***********************************************************/

    require_once( 'functions/add_option_menu.php' );



/***********************************************************
    ADD CUSTOM DASHBOARD

    Add a new custom dashboard widget inside the admin
    panel.
    ***********************************************************/

//require_once( 'functions/add_custom_dashboard.php' );



/***********************************************************
    CLEAN WP HEAD

    Clean up the output of wp_head().
    ***********************************************************/

    require_once( 'functions/clean_wp_head.php' );



/***********************************************************
    REGISTER MENU

    Registers a menu for a theme to use.
    ***********************************************************/

    require_once( 'functions/register_menu.php' );



/***********************************************************
    WHITE LABEL

    Rebrand the whole admin panel by editing or removing
    any mention of WordPress. The change of login
    panel logo is handled with ADD ADMIN AND LOGIN CSS
    as a custom CSS.
    Will also cleans up the admin panel a bit.
    ***********************************************************/

    require_once( 'functions/white_label.php' );



/***********************************************************
    THUMBNAIL SIZE OPTIONS

    Adds a new thumbnail size option whenever you
    uploaded a new image to WP. To generate new
    thumbnail for existing images, use
    Regenerate Thumbnails plugin.
    ***********************************************************/

//add_image_size( 'new-thumbnail', 300, 150, true );



/***********************************************************
    REMOVE TOP ADMIN BAR

    Remove the top admin bar while you are inside the
    actual website. It does not remove the top admin
    bar inside the admin panel.
    ***********************************************************/

    add_filter( 'show_admin_bar', '__return_false' );

/***********************************************************
    ADDS SUB MENU CAPABILITIES


    Allows you to get sub menu items based on the parent or
    siblings in their wp_nav_menu. You no longer need to
    create new menu to get parts of the main menu.

    How to use: Add sub_menu variable as true in wp_nav_menu

    wp_nav_menu(array(
        'theme_location' => 'main_nav',
        'sub_menu' => true
    ));
    ***********************************************************/

    require_once( 'functions/sub_menu.php' );



/***********************************************************
    PLUGIN SPECIFIC CONFIGURATION
    ***********************************************************/

// Ultimate Addons for Visual Composer: Removes update notification
    const ULTIMATE_USE_BUILTIN = true;

// Visual Composer: Removes "VC teaser" metaboxes from page, post, and other custom post types
    function remove_visual_composer_meta_boxes() {
        global $post;
        remove_meta_box('vc_teaser', $post->posttype, 'side');
    }
    if (is_admin()) {
     add_action( 'do_meta_boxes', 'remove_visual_composer_meta_boxes', 99);
 }
// Revolution Slider: Removes metaboxes from page, post, ACF and other custom post types
 function remove_revolution_slider_meta_boxes() {
    global $post;
    remove_meta_box('mymetabox_revslider_0', $post->posttype, 'normal');
}
if (is_admin()) {
	add_action( 'do_meta_boxes', 'remove_revolution_slider_meta_boxes', 99);
}
// WordPress SEO by Yoast: Removes metaboxes from page, post, and other custom post types
/*function remove_wordpress_seo_meta_boxes() {
    global $post;
    remove_meta_box('wpseo_meta', $post->posttype, 'normal');
}
if (is_admin()) {
	add_action( 'do_meta_boxes', 'remove_wordpress_seo_meta_boxes', 99);
}*/
// WordPress SEO by Yoast: Removes the columns in page/post listing
add_filter( 'wpseo_use_page_analysis', '__return_false' );
// WPML: Removes "Multilingual Content Setup" metaboxes from page, post, and other custom post types
function remove_wpml_metabox() {
    global $post;
    remove_meta_box('icl_div_config', $post->posttype, 'normal');
}
if (is_admin()) {
	add_action( 'do_meta_boxes', 'remove_wpml_metabox', 99);
}
// Remove Update Function for backend
// add_action('after_setup_theme','remove_core_updates');
// function remove_core_updates()
// {
//    if(! current_user_can('update_core')){return;}
//    add_action('init', create_function('$a',"remove_action( 'init', 'wp_version_check' );"),2);
//    add_filter('pre_option_update_core','__return_null');
//    add_filter('pre_site_transient_update_core','__return_null');
// }
// remove_action('load-update-core.php','wp_update_plugins');
// add_filter('pre_site_transient_update_plugins','__return_null');

/***********************************************************
    CUSTOM FUNCTIONS
    Add any custom functions for your theme below.
    ***********************************************************/

    function debug( $x ){
        echo '<pre>';
        var_dump($x);
        echo '</pre>';
}



function my_login_logo_one() { 
?> 
<style type="text/css"> 
body.login div#login h1 a {background-size: contain !important;} 
</style>
<?php 
} add_action( 'login_enqueue_scripts', 'my_login_logo_one' );
