<?php /* Template Name: Page - Home */ ?>

<?php get_header(); ?>
<?php $wc_image_bg = get_field('welcome_home_background_image'); ?>
<?php $service_image_bg = get_field('service_background_image'); ?>
<?php $maid_image_bg = get_field('maid_background_image'); ?>
<?php $wc_image = get_field('welcome_home_image'); ?>

<?php $profile_text = get_field('profile_text'); ?>
<?php $welcome_text = get_field('welcome_text'); ?>
<?php $welcome_message = get_field('welcome_message'); ?>
<?php $find_out_more_button_text = get_field('find_out_more_button_text'); ?>
<?php $read_more_button_text = get_field('read_more_button_text'); ?>
<?php $service_repeater = get_field('service_repeater'); ?>
<?php $maid_repeater = get_field('maid_repeater'); ?>


<?php $maid_search_link = get_field('maid_search_link'); ?>
<?php $page_link_provide = get_field('page_link_provide'); ?>
<?php $page_link_about = get_field('page_link_about'); ?>

<div class="slider">
    <?php echo do_shortcode(get_field('slider_shortcode')); ?>
</div>

<div class="cover" style="background-image: url(<?php echo $wc_image_bg; ?>);">
  <div class="container">
    <div class="col-md-12 clear-7 clear-bot-7">
      <div class="col-md-6">


        <h3 class="color-orange font-damion">- <?php echo $profile_text; ?> -</h3>
        <h1 class="text-uppercase font-poppins clear-5px"><?php echo $welcome_text; ?></h1>
        <div style="border-bottom: 1px solid #E54D32; width: 5%;"></div>
        <h5 class="font-roboto clear-8">
          <?php echo $welcome_message; ?>
        </h5>

        <a href="<?php echo $page_link_about; ?>" class="btn btn-default btn-lg btn-rounded clear-4 font-poppins clear-bot-20"><?php echo $find_out_more_button_text; ?></a>

      </div>
      <div class="col-md-6">
        <img src="<?php echo $wc_image; ?>" class="img-responsive">
      </div>
    </div>
  </div>
</div>

<div class="row no-margin-sides">
  <div class="col-md-12 no-padding-sides">



    <!-- Desktop View -->

    <div class="col-md-6 cover-50 text-center hidden-xs" style="background-image: url(<?php echo $service_image_bg; ?>);">
      <div class="clear-8 hidden-sm"></div>

      <?php foreach($service_repeater as $value){?>
        <h4 class="font-damion color-orange">- <?php echo $value['service_header']; ?> -</h4>
        <h3 class="text-uppercase font-poppins clear-5px"><?php echo $value['service_title']; ?></h3>
        <div class="home-border"></div>
        <h5 class="color-home-services"><?php echo $value['service_message']; ?></h5>
      <?php } ?>
      <a href="http://jackfocus.com.sg/boarding/" class="btn btn-default btn-sm btn-rounded clear-2 font-poppins"><?php echo $read_more_button_text; ?></a>

      <div class="clear-bot-8"></div>
    </div>


    <div class="col-md-6 cover-50 text-center hidden-xs" style="background-image: url(<?php echo $maid_image_bg; ?>);">
      <div class="clear-8 hidden-sm"></div>

      <?php foreach($maid_repeater as $value){?>
        <h4 class="font-damion color-orange">- <?php echo $value['maid_header']; ?> -</h4>
        <h3 class="text-uppercase font-poppins clear-5px"><?php echo $value['maid_title']; ?></h3>
        <div class="home-border"></div>
        <h5 class="color-home-services"><?php echo $value['maid_message']; ?></h5>
      <?php } ?>
      <a href="<?php echo $maid_search_link; ?>" class="btn btn-default btn-sm btn-rounded clear-2 font-poppins"><?php echo $find_out_more_button_text; ?></a>

      <div class="clear-bot-8"></div>
    </div>



    <!-- Mobile View -->

    <div class="col-md-6 cover text-center visible-xs no-clear" style="background-image: url(<?php echo $service_image_bg; ?>);">

      <?php foreach($service_repeater as $value){?>
        <h4 class="font-damion color-orange padding-20 no-clear">- <?php echo $value['service_header']; ?> -</h4>
        <h3 class="text-uppercase font-poppins clear-5px"><?php echo $value['service_title']; ?></h3>
        <div class="home-border"></div>
        <h5><?php echo $value['service_message']; ?></h5>
      <?php } ?>
      <a href="#" class="btn btn-default btn-sm btn-rounded clear-2 font-poppins"><?php echo $read_more_button_text; ?></a>
      <div class="clear-bot-8"></div> vvf vv
    </div>

    <div class="col-md-6 cover text-center visible-xs no-clear" style="background-image: url(<?php echo $maid_image_bg; ?>);">
      <?php foreach($maid_repeater as $value){?>
      <h4 class="font-damion color-orange padding-20 no-clear">- <?php echo $value['maid_header']; ?> -</h4>
      <h3 class="text-uppercase font-poppins clear-5px"><?php echo $value['maid_title']; ?></h3>
      <div class="home-border"></div>
      <h5><?php echo $value['maid_message']; ?></h5>
      <?php } ?>
      <a href="#" class="btn btn-default btn-sm btn-rounded clear-2 font-poppins"><?php echo $find_out_more_button_text; ?></a>

      <div class="clear-bot-8"></div>
    </div>


  </div>
</div>



<?php get_footer(); ?>
