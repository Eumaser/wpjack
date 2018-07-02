<?php
// To use external css, replace with code below
// echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/functions/admin/wp-admin.css"/>';
function custom_admin_style() {
    echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/functions/admin/scheme.css"/>';
}

// To use external css, replace with code below
// echo '<link rel="stylesheet" type="text/css" href="'.get_stylesheet_directory_uri().'/functions/admin/wp-login.css"/>';
function custom_login_style() {
echo '<style>

.login h1 a {
    background-image: url('.get_stylesheet_directory_uri().'/functions/admin/logo.png);
    width: 319px;
    height: 99px;
    background-size: auto;
    margin-bottom:0;
}

body.login{
    background-color: #E0E0E0;
}

.login form{
    margin-bottom: 15px;
}

.wp-core-ui .button-primary{
    background-color: #00838F;
    border-color: #00838F;
}

.wp-core-ui .button-primary.focus, .wp-core-ui .button-primary.hover, .wp-core-ui .button-primary:focus, .wp-core-ui .button-primary:hover{
    background-color: #006064;
    border-color: #006064;
}

.login #nav{
    margin-top: 0;
}

</style>';
}

add_action('admin_head', 'custom_admin_style');
add_action('login_head', 'custom_login_style');
?>