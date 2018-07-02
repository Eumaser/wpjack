<?php /* Template Name: Page - Contact */ ?>

<?php get_header(); ?>



<?php $banner_image = get_field('banner_image'); ?>
<?php $background_image = get_field('background_image'); ?>
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
        <h1 class="text-uppercase"><?php echo $page_title; ?></h1>
         <div class="about-border"></div>
         <div class="clear-5"></div>


        <h4><strong>Kindly furnish us with your particulars for our Customer Service Officer to contact you in the nearest time. (Field marked <span class="color-red">*</span> are compulsory)</strong></h4>
         <?php echo do_shortcode(get_field('contact_form_shortcode')); ?>
        <!-- <form class="form-horizontal" action="/action_page.php">

          <div class="form-group">
            <label class="control-label col-sm-3 text-left" for="Name">Name: <span class="color-red">*</span></label>
            <div class="col-sm-9">
              <input type="text" class="form-control" id="Name" name="your-name">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3 text-left" for="email">Email: <span class="color-red">*</span></label>
            <div class="col-sm-9">
              <input type="email" class="form-control" id="email" name="your-email">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3 text-left" for="email">Contact No.: <span class="color-red">*</span></label>
            <div class="col-sm-9">
              <input type="tel" class="form-control" id="tel" name="your-tel">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3 text-left" for="location">Preferred Location:</label>
            <div class="col-sm-9">
              <select class="form-control" id="sel1" name="your-location">
                <option value="No Preference" selected>No Preference</option>
                <option value="Bukit Timah">Bukit Timah</option>
                <option value="Katong">Katong</option>
                <option value="Hougang">Hougang</option>
                <option value="Yishun">Yishun</option>
              </select>
            </div>
          </div>

          <div class="clear-5"></div>
          <h4><strong>Kindly specify the requirements of your maid by filling the form below...</strong></h4>

          <div class="form-group">
            <label class="control-label col-sm-3 text-left" for="location">Maid Nationality:</label>
            <div class="col-sm-9">
              <select class="form-control" id="sel1" name="maid-nationality">
                <option value="No Preference" selected>No Preference</option>
                <option value="Filipino">Filipino</option>
                <option value="Indonesian">Indonesian</option>
                <option value="Cambodian">Cambodian</option>
                <option value="Filipino">Filipino</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3 text-left" for="location">Age Group:</label>
            <div class="col-sm-9">
              <select class="form-control" id="sel1" name="maid-age">
                <option value="No Preference" selected>No Preference</option>
                <option value="18-21">18-21</option>
                <option value="22-28">22 - 28</option>
                <option value="29-35">29-35</option>
                <option value="35+">35+</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3 text-left" for="location">Education Level:</label>
            <div class="col-sm-9">
              <select class="form-control" id="sel1" name="maid-education">
                <option value="No Preference" selected>No Preference</option>
                <option value="Primary">Primary</option>
                <option value="Secondary">Secondary</option>
                <option value="Bachelor's Degree">Bachelor's Degree</option>
                <option value="Master's Degree">Master's Degree</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-3 text-left" for="location">Marital Status:</label>
            <div class="col-sm-9">
              <select class="form-control" id="sel1" name="maid-marital">
                <option value="No Preference" selected>No Preference</option>
                <option value="Married">Married</option>
                <option value="Single">Single</option>
                <option value="Widowed">Widowed</option>
                <option value="It's Complicated">It's Complicated</option>
              </select>
            </div>
          </div>


          <div class="clear-5"></div>
          <h4><strong>What is your main purpose in employing  a maid?</strong></h4>
          <div class="form-group">
            <div class="col-sm-12">
              <label class="checkbox-inline">
                <input type="checkbox" value="Infant Care">Infant Care
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" value="Child Care">Child Care
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" value="Elderly Care">Elderly Care
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" value="Household Chores">Household Chores
              </label>
              <br>
              <label class="checkbox-inline">
                <input type="checkbox" value="Cooking">Cooking
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" value="Elderly Care">Elderly Care
              </label>
              <label class="checkbox-inline">
                <input type="checkbox" value="Others">Others
              </label>
            </div>
          </div>
          <h4 class="clear-2">Others... kindly specify below</h4>

          <textarea class="form-control" rows="7" id="comment" name="maid-comment"></textarea>

          <div class="clear-2"></div>
          <div class="form-group">
            <div class="col-sm-12">
              <button type="submit" class="btn btn-default btn-lg btn-rounded clear-4 font-poppins">Submit</button>
            </div>
          </div>
        </form> -->

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
