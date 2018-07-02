<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" type="image/x-icon">
    <title><?php wp_title('-','true','right'); ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
</head>

<body <?php body_class(); ?>>
         <?php
      $values = get_field('maid_search_float','options');
      if($values){
        foreach($values as $value){?>
        <a href="<?php echo $value['page_link']; ?>" class="contact-mobile ">
          <img src="<?php echo $value['image']; ?>">
        </a><?php
        }
      }?>
    <header style="background-image: url(<?php the_field('header_background', 'option'); ?>);" class="padding-bottom-30 hidden-xs hidden-sm"> 

      <div class="container">
        <div class="col-md-3">
          <a id="logo" href="<?php echo home_url(); ?>" class="navbar-brand">
              <img src="<?php the_field('logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>" class="img-responsive">
          </a>
        </div>
        <div class="col-md-9 text-right clear-2">
          <nav>
            <?php
            $options = array(
                'sort_column' => 'menu_order',
                'theme_location' => 'main_nav',
                'container' => false,
                'items_wrap' => '<ul class="menu list-inline padding-side-8">%3$s</ul>'
                );
                wp_nav_menu($options); ?>
          </nav>
        </div>
      </div>
    </header>

<?php

$menu_name = 'sub_menu';
$locations = get_nav_menu_locations();
$menu = wp_get_nav_menu_object( $locations[ $menu_name ] );
$menuitems = wp_get_nav_menu_items( $menu->term_id, array( 'order' => 'DESC' ) );

$count = 0;
$submenu = false;

$subMenu = array();
$menuCat = array();
foreach( $menuitems as $item ){
  $title = $item->title;
  $id = $item->post_name;
  $link = $item->url;


  if($item->menu_item_parent == 434){
    $subMenu[] = array(
        'id' => $id,
        'sub_title' => $title,
        'sub_link' => $link,
    );

  }else{
    $menuCat[] = array(
        'id' => $id,
        'title' => $title,
        'link' => $link,
    );
  }


}


/*echo "<pre>"; print_r($menuitems); echo "</pre>";*/

?>

    <nav class="navbar navbar-default visible-xs visible-sm" style="margin-bottom: 0px;">
      <div class="container">
        <div class="navbar-header" style="margin-top: 20px;">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a href="<?php echo home_url(); ?>">
              <img src="<?php the_field('logo', 'option'); ?>" alt="<?php bloginfo('name'); ?>" class="img-responsive">
          </a>
        </div>
        <div id="navbar1" class="navbar-collapse collapse">
          <ul class="nav navbar-nav">

            <?php

            foreach( $menuCat as $cat){

                if($cat['id'] != 434){?>
                <li><a href="<?php echo $cat['link']; ?>"><?php echo $cat['title']; ?></a></li>
            <?php
                }else{ ?>

                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $cat['title']; ?> <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <?php foreach( $subMenu as $sub){ ?>
                        <li><a href="<?php echo $sub['sub_link']; ?>"><?php echo $sub['sub_title']; ?></a></li>
                    <?php } ?>

                  </ul>
                </li>

            <?php
                }
            }

            ?>


           <!-- <li><a href="<?php echo $link; ?>"><?php echo $title; ?></a></li>-->

            <!--<li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Dropdown <span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">Separated link</a></li>
                <li role="separator" class="divider"></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>-->
          </ul>
        </div>
      </div>
    </nav>

