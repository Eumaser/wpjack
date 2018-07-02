<?php /* Template Name: Page - Success */ ?>
<?php get_header(); ?>
<?php $sidebar_repeater = get_field('sidebar_repeater','options'); ?>
<?php $banner_image = get_field('banner_image'); ?>
<?php $background_image = get_field('background_image'); ?>
<?php $success_content = get_field('success_content'); ?>
<?php $success_image = get_field('success_image'); ?>
<?php $article_repeater = get_field('article_repeater'); ?>


<?php $left_arrow = get_field('left_arrow'); ?>
<?php $right_arrow = get_field('right_arrow'); ?>
<?php $success_content_body = get_field('success_content_body'); ?>

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
          <div class="clear-4"></div>
          <div style="font-size: 17px;" class="text-justify">
            <?php echo $success_content; ?>
            <img src="<?php echo $success_image; ?>" class="img-responsive clear-2 clear-bot-2">
            <?php echo $success_content_body;  ?>
          </div>




  <div class="col-md-12 clear-3 hidden-xs">
    <div id="Carousel" class="carousel slide">

    <!-- Carousel items -->
    <div class="carousel-inner">

     <?php
        echo "<div class='item active'>";
        echo "<div class='row'>";
          foreach($article_repeater as $key=>$value){
            if ($key % 4 == 0 AND $key!=0){
              echo "</div>";
              echo "</div>";
              echo "<div class='item'>";
              echo "<div class='row'>";
            }
            echo "<div class='col-md-3'>";
            echo '<a href="javascript:void(0);" class="bg_transparent" data-toggle="modal" data-target="#myModal'.$key.'"><img src="'.$value[image].'" style="max-width:100%;"></a>';
            echo "</div>"; 
          }
        echo "</div>";
        echo "</div>";
      ?>

    </div><!--.carousel-inner-->
      <a data-slide="prev" href="#Carousel" class="left carousel-control"><img src="<?php echo $left_arrow; ?>"></a>
      <a data-slide="next" href="#Carousel" class="right carousel-control"><img src="<?php echo $right_arrow; ?>"></a>
    </div><!--.Carousel-->

  </div>
  
<?php foreach($article_repeater as $key=>$value){ ?>
<div id="myModal<?php echo $key; ?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-body">
        <img src="<?php echo $value['image']; ?>" class="img-responsive text-center" style="margin: auto; width: 100%;">
      </div>
    </div>

  </div>
</div>

<?php } ?>
  
  
  

  <div class="col-md-12 clear-3 visible-xs">
    <div id="Carousel2" class="carousel slide">

    <!-- Carousel items -->
    <div class="carousel-inner">

     <?php
        echo "<div class='item active'>";
        echo "<div class='row'>";
          foreach($article_repeater as $key=>$value){
            if ($key % 1 == 0 AND $key!=0){
              echo "</div>";
              echo "</div>";
              echo "<div class='item'>";
              echo "<div class='row'>";
            }
            echo "<div class='col-md-3'>";
            echo '<a href="javascript:void(0);" class="bg_transparent thumbnail" ><img src="'.$value[image].'" style="max-width:100%;" class="margin-auto"></a>';
            echo "</div>";
          }
        echo "</div>";
        echo "</div>";
      ?>

    </div><!--.carousel-inner-->
      <a data-slide="prev" href="#Carousel2" class="left carousel-control"><img src="<?php echo $left_arrow; ?>"></a>
      <a data-slide="next" href="#Carousel2" class="right carousel-control"><img src="<?php echo $right_arrow; ?>"></a>
    </div><!--.Carousel-->

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


<script type="text/javascript">
  $(document).ready(function() {
    $('#Carousel').carousel({
        interval: 5000
    })
  });

  $(document).ready(function() {
    $('#Carousel2').carousel({
        interval: 5000
    })
  });

</script>
<?php get_footer(); ?>
