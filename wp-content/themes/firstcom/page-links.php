<?php /* Template Name: Page - Links */ ?>
<?php get_header(); ?>
<?php $banner_image = get_field('banner_image'); ?>
<?php $background_image = get_field('background_image'); ?>
<?php $links_repeater = get_field('links_repeater'); ?>
<?php $sidebar_repeater = get_field('sidebar_repeater','options'); ?>


<?php $banner_title = get_field('banner_title'); ?>
<?php $banner_description = get_field('banner_description'); ?>
<?php $page_title = get_field('page_title'); ?>
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
        <h1 class="text-uppercase "><?php echo $page_title; ?></h1>
         <div class="about-border"></div>
         <div class="clear-2"></div>
           <div class="col-md-12">
          <?php foreach($links_repeater as $value){?>
            <div class="col-md-4 text-center">
              <a href="<?php echo $value['link']; ?>" target="_blank"><img src="<?php echo $value['image']; ?>" class="img-responsive"></a>
              <h4 style="font-size: 17px;"><strong><?php echo $value['name']; ?></strong></h4>
            </div>
          <?php } ?>
          </div>
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
