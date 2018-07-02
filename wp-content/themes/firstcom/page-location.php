<?php /* Template Name: Page - Location */ ?>
<?php get_header();
	$page_id  = get_page_by_title('Locations')->ID;
	$content_id = get_post()->ID;
	if(empty($page_id)){
		$page_id = 95;
	}
	if($content_id == $page_id){
		$content_id = 1;
	}
?>

<?php $banner_image = get_field('banner_image', 95); ?>
<?php $background_image = get_field('background_image', 95); ?>
<?php $sidebar_repeater = get_field('sidebar_repeater','options'); ?>
<?php $bukit_timah_repeater = get_field('bukit_timah_repeater'); ?>
<?php $katong_repeater = get_field('katong_repeater'); ?>
<?php $hougang_repeater = get_field('hougang_repeater'); ?>
<?php $yishun_repeater = get_field('yishun_repeater'); ?>
<?php $malaysia_repeater = get_field('malaysia_repeater'); ?>
<?php $bukit_timah_google_map_code = get_field('bukit_timah_google_map_code'); ?>
<?php $katong_google_map_code = get_field('katong_google_map_code'); ?>
<?php $hougang_google_map_code_ = get_field('hougang_google_map_code_'); ?>
<?php $yishun_google_map_code = get_field('yishun_google_map_code'); ?>
<?php $malaysia_google_map_code = get_field('malaysia_google_map_code'); ?>
<?php $malaysia_google_map_code_2 = get_field('malaysia_google_map_code_2'); ?>
<?php $bukit_timah_branch_image = get_field('bukit_timah_branch_image'); ?>
<?php $katong_branch_image_ = get_field('katong_branch_image_'); ?>
<?php $hougang_branch_image = get_field('hougang_branch_image'); ?>
<?php $yishun_branch_image = get_field('yishun_branch_image'); ?>
<?php $malaysia_branch_image = get_field('malaysia_branch_image'); ?>

<?php $banner_title = get_field('banner_title', 95); ?>
<?php $banner_description = get_field('banner_description', 95); ?>
<?php $page_title = get_field('page_title', 95); ?>
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
				<div class="clear-2"></div>
				
				<a href="javascript:void(0);" class="btn btn-default btn-lg btn-location clear-4 font-poppins bukit">Bukit Timah</a>
				<a href="javascript:void(0);" class="btn btn-default btn-lg btn-location clear-4 font-poppins katong">Katong</a>
				<a href="javascript:void(0);" class="btn btn-default btn-lg btn-location clear-4 font-poppins hougang">Hougang</a>
				<a href="javascript:void(0);" class="btn btn-default btn-lg btn-location clear-4 font-poppins yishun">Yishun</a>
				<br/>
				<a href="javascript:void(0);" class="btn btn-default btn-lg btn-location clear-4 font-poppins malaysia">Malaysia</a>
				
				<div class="clear-5"></div>
				
				<div class="col-md-12 bukit_div">
					<h2>Singapore</h2>
					<?php
						if(get_field("singapore_link","options"))
						echo "<br/><a href='".get_field("singapore_link","options")."' class=' ' style='color:#333;display:block;margin:auto; position: relative; top:-16px;' > ".get_field("singapore_link","options")." </a>";
					?> 
					<img src="<?php echo $bukit_timah_branch_image; ?>" class="img-responsive">
					<div class="clear-5"></div>
					<div class="col-md-4 no-padding-sides">
						<?php foreach($bukit_timah_repeater as $value){ ?>
							
							<h5 class="no-clear color-orange font-poppins"><strong><?php echo $value['title']; ?></strong></h5>
							<h5 class="color-orange font-poppins"><strong><?php echo $value['sub-title']; ?></strong></h5>
							<h5><?php echo $value['agency']; ?></h5>
							<h5><i><?php echo $value['licence_number']; ?></i></h5>
							<h4 class="padding-20 padding-bot-20"><strong><?php echo $value['branch']; ?></strong></h4>
							<h5><?php echo $value['road_name']; ?></h5>
							<h5><?php echo $value['number']; ?> </h5>
							<h5><?php echo $value['location']; ?> </h5>
							<h5><?php echo $value['country']; ?></h5>
							<h5 class="padding-20"><?php echo $value['tel']; ?></h5>
							<h5><?php echo $value['fax']; ?></h5>
						<?php } ?>
					</div>
					<div class="col-md-8 no-padding-sides">
						<div class="google-maps">
							<?php echo $bukit_timah_google_map_code; ?>
						</div>
					</div>
				</div>
				
				
				<div class="katong_div col-md-12">
					<img src="<?php echo $katong_branch_image_; ?>" class="img-responsive">
					<div class="clear-5"></div>
					<div class="col-md-4 no-padding-sides">
						<?php foreach($katong_repeater as $value){ ?>
							
							<h5 class="no-clear color-orange font-poppins"><strong><?php echo $value['title']; ?></strong></h5>
							<h5 class="color-orange font-poppins"><strong><?php echo $value['sub-title']; ?></strong></h5>
							<h5><?php echo $value['agency']; ?></h5>
							<h5><i><?php echo $value['licence_number']; ?></i></h5>
							<h4 class="padding-20 padding-bot-20"><strong><?php echo $value['branch']; ?></strong></h4>
							<h5><?php echo $value['road_name']; ?></h5>
							<h5><?php echo $value['number']; ?> </h5>
							<h5><?php echo $value['location']; ?> </h5>
							<h5><?php echo $value['country']; ?></h5>
							<h5 class="padding-20"><?php echo $value['tel']; ?></h5>
							<h5><?php echo $value['fax']; ?></h5>
						<?php } ?>
					</div>
					<div class="col-md-8 no-padding-sides">
						<div class="google-maps">
							<?php echo $katong_google_map_code; ?>
						</div>
					</div>
				</div>
				
				<div class="hougang_div col-md-12">
					<img src="<?php echo $hougang_branch_image; ?>" class="img-responsive">
					<div class="clear-5"></div>
					<div class="col-md-4 no-padding-sides">
						<?php foreach($hougang_repeater as $value){ ?>
							
							<h5 class="no-clear color-orange font-poppins"><strong><?php echo $value['title']; ?></strong></h5>
							<h5 class="color-orange font-poppins"><strong><?php echo $value['sub-title']; ?></strong></h5>
							<h5><?php echo $value['agency']; ?></h5>
							<h5><i><?php echo $value['licence_number']; ?></i></h5>
							<h4 class="padding-20 padding-bot-20"><strong><?php echo $value['branch']; ?></strong></h4>
							<h5><?php echo $value['road_name']; ?></h5>
							<h5><?php echo $value['number']; ?> </h5>
							<h5><?php echo $value['location']; ?> </h5>
							<h5><?php echo $value['country']; ?></h5>
							<h5 class="padding-20"><?php echo $value['tel']; ?></h5>
							<h5><?php echo $value['fax']; ?></h5>
						<?php } ?>
					</div>
					<div class="col-md-8 no-padding-sides">
						<div class="google-maps">
							<?php echo $hougang_google_map_code_; ?>
						</div>
					</div>
				</div>
				
				<div class="yishun_div col-md-12">
					<img src="<?php echo $yishun_branch_image; ?>" class="img-responsive">
					<div class="clear-5"></div>
					<div class="col-md-4 no-padding-sides">
						<?php foreach($yishun_repeater as $value){ ?>
							
							<h5 class="no-clear color-orange font-poppins"><strong><?php echo $value['title']; ?></strong></h5>
							<h5 class="color-orange font-poppins"><strong><?php echo $value['sub-title']; ?></strong></h5>
							<h5><?php echo $value['agency']; ?></h5>
							<h5><i><?php echo $value['licence_number']; ?></i></h5>
							<h4 class="padding-20 padding-bot-20"><strong><?php echo $value['branch']; ?></strong></h4>
							<h5><?php echo $value['road_name']; ?></h5>
							<h5><?php echo $value['number']; ?> </h5>
							<h5><?php echo $value['location']; ?> </h5>
							<h5><?php echo $value['country']; ?></h5>
							<h5 class="padding-20"><?php echo $value['tel']; ?></h5>
							<h5><?php echo $value['fax']; ?></h5>
						<?php } ?>
					</div>
					<div class="col-md-8 no-padding-sides">
						<div class="google-maps">
							<?php echo $yishun_google_map_code; ?>
						</div>
					</div>
				</div>
                
				<div class="malaysia_div col-md-12">
					<h2>Malaysia</h2>
					<?php
						if(get_field("malaysia_link","options"))
						echo "<br/><a href='".get_field("malaysia_link","options")."' class=' ' style='color:#333;display:block;margin:auto; position: relative; top:-16px;' > ".get_field("malaysia_link","options")." </a>";
					?> 
					<img src="<?php echo $malaysia_branch_image; ?>" class="img-responsive">
					<div class="clear-5"></div>
					<!-- <div class="col-md-4 no-padding-sides"> -->
					<?php foreach($malaysia_repeater as $value){ ?>
						<div class="col-md-4 no-padding-sides">
							<h5 class="no-clear color-orange font-poppins"><strong><?php echo $value['title']; ?></strong></h5>
							<h5 class="color-orange font-poppins"><strong><?php echo $value['sub-title']; ?></strong></h5>
							<h5><?php echo $value['agency']; ?></h5>
							<h5><i><?php echo $value['licence_number']; ?></i></h5>
							<h4 class="padding-20 padding-bot-20"><strong><?php echo $value['branch']; ?></strong></h4>
							<h5><?php echo $value['road_name']; ?></h5>
							<h5><?php echo $value['number']; ?> </h5>
							<h5><?php echo $value['location']; ?> </h5>
							<h5><?php echo $value['country']; ?></h5>
							<h5 class="padding-20"><?php echo $value['tel']; ?></h5>
							<h5><?php echo $value['fax']; ?></h5>
						</div>
						<div class="col-md-8 no-padding-sides">
							<div class="google-maps">
								<?php echo $value['map']; ?>
							</div>
						</div>
					<?php } ?>
					<!-- </div> 
						<div class="col-md-8 no-padding-sides">
						<div class="google-maps">
						<?php echo $malaysia_google_map_code; ?>
						</div>
						</div>
					-->
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
