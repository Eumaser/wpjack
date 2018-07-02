
<div class="cover" style="background-image: url(<?php the_field('footer_awards_background', 'option'); ?>);">
	<div class="container text-center">
		<div class="col-md-12 clear-4 clear-bot-4">
			<h3 class="font-damion color-orange">- Awards -</h3>
			<h1 class="no-clear text-uppercase font-poppins">Our Achievements</h1>
			<?php
				$values = get_field('awards_repeater','options');
				if($values){
					foreach($values as $value){?>
					<div class="col-md-5ths clear-bot-2">
						<img src="<?php echo $value['image']; ?>" class="img-responsive margin-auto">
					</div>
					<?php
					}
				}
			?>
		</div>
	</div>
</div>
<div class="cover" style="background-color: #333333;">
	<div class="container">
		<div class="col-md-12 clear-4">
			<?php
				$values = get_field('venue_image_repeater','options');
				if($values){
					echo "<h1 style='color:#fff;' class='col-xs-12 text-center'>Singapore</h1><p>&nbsp;";
					
					if(get_field("singapore_link","options"))
					echo "<br/><a href='".get_field("singapore_link","options")."' class='text-center' style='color:#FFF;display:block;margin:auto; position: relative; top:-16px;' > ".get_field("singapore_link","options")." </a>";
					
					echo "</p>";
					
					foreach($values as $value){?>
					<div class="col-md-3 clear-bot-2">
						<img src="<?php echo $value['image']; ?>" class="img-responsive margin-auto">
						<div class="margin-auto padding-sides-40">
							<h5 class="color-white"><strong><?php echo $value['title']; ?></strong></h5>
							<h5 class="color-white"><strong><?php echo $value['sub-title']; ?></strong></h5>
							<h5 class="color-white"><?php echo $value['agency']; ?></h5>
							<h5 class="color-white"><i><?php echo $value['licence_number']; ?></i></h5>
							<h5 class="color-white padding-20 padding-bot-20"><strong><?php echo $value['branch']; ?></strong></h5>
							<h5 class="color-white"><?php echo $value['road']; ?></h5>
							<h5 class="color-white"><?php echo $value['number']; ?></h5>
							<h5 class="color-white"><?php echo $value['location']; ?></h5>
							<h5 class="color-white padding-bot-20"><?php echo $value['country']; ?></h5>
							<h5 class="color-white"><?php echo $value['tel']; ?></h5>
							<h5 class="color-white"><?php echo $value['fax']; ?></h5>
						</div>
					</div>
					
					
					<?php
					}
				}
			?>
		</div>
		<div class="col-md-12 clear-4">
			<?php
				$values = get_field('venue_image_repeater_malaysia','options');
				if($values){
					echo "<h1 style='color:#fff;' class='col-xs-12 text-center'>Malaysia</h1><p>&nbsp;";
					
					if(get_field("malaysia_link","options"))
					echo "<br/><a href='".get_field("malaysia_link","options")."' class='text-center' style='color:#FFF;display:block;margin:auto; position: relative; top:-16px;' >".get_field("malaysia_link","options")." </a>";
					
					echo "</p>";
					
					foreach($values as $value){?>
					<div class="col-md-3 clear-bot-2">
						<img src="<?php echo $value['image']; ?>" class="img-responsive margin-auto">
						<div class="margin-auto padding-sides-40">
							<h5 class="color-white"><strong><?php echo $value['title']; ?></strong></h5>
							<h5 class="color-white"><strong><?php echo $value['sub-title']; ?></strong></h5>
							<h5 class="color-white"><?php echo $value['agency']; ?></h5>
							<h5 class="color-white"><i><?php echo $value['licence_number']; ?></i></h5>
							<h5 class="color-white padding-20 padding-bot-20"><strong><?php echo $value['branch']; ?></strong></h5>
							<h5 class="color-white"><?php echo $value['road']; ?></h5>
							<h5 class="color-white"><?php echo $value['number']; ?></h5>
							<h5 class="color-white"><?php echo $value['location']; ?></h5>
							<h5 class="color-white padding-bot-20"><?php echo $value['country']; ?></h5>
							<h5 class="color-white"><?php echo $value['tel']; ?></h5>
							<h5 class="color-white"><?php echo $value['fax']; ?></h5>
						</div>
					</div>
					
					
					<?php
					}
				}
			?>
		</div>
	</div>
	
</div>
<footer>
	<div class="container">
		<div class="pull-left">
			© <?php the_field('copyright', 'option'); ?>
		</div>
		<div class="pull-right hidden-xs">
			<img src="<?php the_field('fcs_logo', 'option'); ?>"> Web Design by <a href="https://www.firstcom.com.sg/" target="_blank">Firstcom Solutions</a>
		</div>
		<div class="pull-left visible-xs">
			<img src="<?php the_field('fcs_logo', 'option'); ?>"> Web Design by <a href="https://www.firstcom.com.sg/" target="_blank">Firstcom Solutions</a>
		</div>
	</div>
</footer>
<?php wp_footer(); ?>
</body>


</html>
