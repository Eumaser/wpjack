<?php /* Template Name: Page - Services */ ?>
<?php get_header();
  $page_id  = get_page_by_title('Services')->ID;
  $content_id = get_post()->ID;
  if(empty($page_id)){
    $page_id = 168;
  }
  if($content_id == $page_id){
    $content_id = 1;
  }
?>

<?php $banner_image = get_field('banner_image', 168); ?>
<?php $background_image = get_field('background_image', 168); ?>
<?php $sidebar_repeater = get_field('sidebar_repeater','options'); ?>
<?php $administrative_repeater = get_field('administrative_repeater'); ?>
<?php $administrative_title = get_field('administrative_title'); ?>
<?php $foreign_domestic_title = get_field('foreign_domestic_title'); ?>
<?php $foreign_domestic_repeater = get_field('foreign_domestic_repeater'); ?>
<?php $local_domestic_title = get_field('local_domestic_title'); ?>
<?php $local_domestic_repeater = get_field('local_domestic_repeater'); ?>
<?php $logistics = get_field('logistics'); ?>
<?php $logistics_repeater = get_field('logistics_repeater'); ?>
<?php $image_repeater = get_field('image_repeater'); ?>

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
        <h1 class="text-uppercase"><?php echo $page_title; ?></h1>
        <div class="about-border"></div>
        <div class="col-md-12 no-padding-sides clear-5">
          <div class="col-md-6 no-padding-sides">
          <h4><strong><?php echo $administrative_title; ?></strong></h4>
          <ul class="padding-left-15">
            <?php foreach($administrative_repeater as $value){?>
              <li><?php echo $value['benefits']; ?></li>
            <?php } ?>
          </ul>
          <h4 class="clear-8"><strong><?php echo $foreign_domestic_title; ?></strong></h4>
          <ul class="padding-left-15">
            <?php foreach($foreign_domestic_repeater as $value){?>
              <li><?php echo $value['benefits']; ?></li>
            <?php } ?>
          </ul>
          <h4 class="clear-8"><strong><?php echo $local_domestic_title; ?></strong></h4>
          <ul class="padding-left-15">
            <?php foreach($local_domestic_repeater as $value){?>
              <li><?php echo $value['benefits']; ?></li>
            <?php } ?>
          </ul>
          <h4 class="clear-8"><strong><?php echo $logistics; ?></strong></h4>
          <ul class="padding-left-15">
            <?php foreach($logistics_repeater as $value){?>
              <li><?php echo $value['benefits']; ?></li>
            <?php } ?>
          </ul>
          </div>
          <div class="col-md-6">
            <?php foreach($image_repeater as $value){?>
              <img src="<?php echo $value['image']; ?>" class="img-responsive clear-3">
            <?php } ?>
          </div>
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
