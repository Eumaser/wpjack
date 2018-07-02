<?php /* Template Name: Page - Training */ ?>
<?php get_header();
  $page_id  = get_page_by_title('Training')->ID;
  $content_id = get_post()->ID;
  if(empty($page_id)){
    $page_id = 173;
  }
  if($content_id == $page_id){
    $content_id = 1;
  }
?>

<?php $sidebar_repeater = get_field('sidebar_repeater','options'); ?>
<?php $banner_image = get_field('banner_image', 173); ?>
<?php $background_image = get_field('background_image', 173); ?>


<?php
  $query = new WP_Query(array(
    'post_type'   => 'helpers_training',
    'post_status'   => 'publish',
    'orderby'     => 'ID',
    'order'     => 'ASC'
    )
  );
?>

<?php $banner_title = get_field('banner_title', 173); ?>
<?php $banner_description = get_field('banner_description', 173); ?>
<?php $page_title = get_field('page_title', 173); ?>
<header class="cover" style="background-image: url(<?php echo $banner_image; ?>);">
  <div class="container">
    <div class="col-md-12 text-center clear-8 clear-bot-8">
      <h1 class="color-white text-uppercase"><strong><?php echo $banner_title; ?></strong></h3>
      <h4 class="color-white"><i><?php echo $banner_description; ?></i></h4>
    </div>
  </div>
</header>



<div class="cover" style="background-image: url(<?php echo $background_image; ?>);">
  <div class="container">
    <div class="col-md-12 clear-bot-5">
      <div class="col-md-9 clear-2">
        <h1 class="text-uppercase"><?php echo $page_title; ?></h1>
        <div class="about-border"></div>


        <?php
          if ($query->have_posts()) {
            while ($query->have_posts()) {
              $query->the_post();
              $post       = $query->post;
              $post_id    = $post->ID;
              $title      = $post->post_title;
              $post_link  = get_permalink($post_id);
              $active   = ' ';
              if ($post_id == $content_id || $content_id == 1) {
                $active   = 'active';
                $content_id = 0;
              }?>

              <a href="<?php echo $post_link; ?>" class="btn btn-default btn-lg btn-location clear-4 font-poppins"><h5 style="margin-top: 0px; margin-bottom: 0px;"><?php echo $title; ?></h5></a>

          <?php
            }
          }
          wp_reset_query();
        ?>



        <?php
          $post_id = '';
          if(is_single()){
            $post_id = array(get_post()->ID);
          }

          $query = new WP_Query(array(
            'post_type'   => 'helpers_training',
            'showposts'   => 1,
            'post_status'   => 'publish',
            'orderby'     => 'ID',
            'order'     => 'ASC',
            'post__in'    => $post_id
            )
          );

          while ($query->have_posts()){
            $query->the_post();
            $post = $query->post;
            $title = $post->post_title;
            $post_id = $post->ID;
            $images = get_field('house_images_repeater', $post_id);
            $description = get_field('description', $post_id);
        ?>


        <h4 class="clear-3"><strong><?php echo $title; ?></strong></h4>
        <h5 class="clear-3"><?php echo $description; ?></h5>
        <div class="scrollable clear-2 margin-auto">
          <div class="ms-lightbox-template gallery-border" style="margin-left: 0px; margin-right: 0px; padding-left: 0px; padding-right: 0px;">
            <div class="master-slider ms-skin-default" id="masterslider">

              <?php
                if($images){
                  foreach ($images as $image) {?>
                <div class="ms-slide">
                  <img  src="../../masterslider/style/blank.gif" data-src="<?php echo $image['url']; ?>"/>
                  <img class="ms-thumb" src="<?php echo $image['sizes']['thumbnail']; ?>" alt="thumb" />
                  <a href="<?php echo $image['url']; ?>" class="ms-lightbox" rel="prettyPhoto[gallery1]"> </a>
                </div><?php
                  }
                }
              ?>
            </div>
          </div>
        </div>

        <?php
          }
          wp_reset_query();
        ?>


      </div>
      <div class="col-md-3 clear-4">
        <?php foreach($sidebar_repeater as $value){?>
          <a href="<?php echo $value['page_link']; ?>"><img src="<?php echo $value['image']; ?>" class="img-responsive margin-auto clear-5"></a>
        <?php } ?>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>
