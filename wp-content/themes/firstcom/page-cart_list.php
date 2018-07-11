<?php /* Template Name: Page - Cart List View Page */ ?>
<?php
    session_start();
    if(!isset($_SESSION['cart'])){
        $_SESSION['cart'] = array();
      //  die();
    }

    include 'objects/database.php';
    include 'objects/maid_list.php';
    $database = new Database();
    $conn = $database->getConnection();
    $maid = new MaidList($conn);
    if (!empty($_SESSION['cart'])) {
      $results = $maid->getMaidSelected($_SESSION['cart']);
    }

?>
<?php get_header();?>

<?php
  $values = get_field('maid_filter','options');

?>

<br><br>
<pre>
  <?php// print_r($results) ?>
  <?php print_r($_SESSION['cart']) ?>
  <?php
    $action =  isset($_GET['action']) ? $_GET['action'] : "";
   ?>
</pre>
<header class="cove">

  <div class="container">
    <?php if ($action=='removed'): ?>
      <div class="alert alert-success alert-dismissible" style="margin-bottom:0px; margin-top:10px">
        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        Maid Removed
      </div>
    <?php endif; ?>

    <br>
    <div class="panel panel-default">
      <div class="panel-body">
        <table class="table table-bordered">
          <thead>
            <th style="width:15%" class="text-center">Photo</th>
            <th style="width:15%" class="text-center">Ref No</th>
            <th style="width:50%" class="text-center">Details</th>
            <th class="text-center">Action</th>
          </thead>
          <tbody>
            <?php if (!empty($results) ): ?>
              <?php  while($row = $results->fetch_assoc() ) { ?>
                  <tr>
                    <td>
                      <a href="<?php echo $values[0]['maid_print'].'?mid='.$row['maid_id']  ?>" target="_blank">
                        <img src="https://www.jackfocus.com.sg/system/<?php echo $row['maid_img'] ?>" alt="" class="img-responsive" style="width:150px;height:auto">
                      </a>
                    </td>
                    <td class="text-center">
                      <h4><?php echo $row['maid_ref_no'] ?></h4>
                    </td>
                    <td>
                      <strong> <?php echo $row['maid_name'] ?> </strong>  <br>
                      <img src="https://www.jackfocus.com.sg/system/<?php echo $row['nationality_flag'] ?>" alt="" height="12" width="16"> <?php echo $row['nationality_name'] ?><br>
                      <small><strong>Age:</strong>  <?php echo $row['maid_age'] ?></small>  <br>
                      <small> <strong>Height: </strong> <?php echo (empty($row['maid_height'])?'-':$row['maid_height'].'CM' ) ?> &nbsp </small>
                      <small> <strong>Weight: </strong> <?php echo (empty($row['maid_weight'])?'-':$row['maid_weight'].'KG' ) ?><br> </small>
                      <small> <strong>Religion:  </strong> <?php echo (empty($row['maid_religion'])?'-':$row['maid_religion'] ) ?> </small> <br>
                      <small> <strong>Education:  </strong><?php echo (empty($row['maid_educt'])?'-':$row['maid_educ'] ) ?> </small> <br>
                      <small> <strong>Off-days:  </strong> <?php echo (empty($row['offday'])?'-':$row['maid_offday'] ) ?> </small> <br>
                      <small> <strong>Marital Status:  </strong> <?php echo $row['maid_mar_status'] ?> </small> <br>
                      <small>
                        <strong>Country:  </strong>
                          <?php if (empty($row['maid_his_country_1'] && $row['maid_his_country_2']) ): ?>
                            NONE
                          <?php else: ?>
                            <?php echo $row['maid_his_country_1'] ?> - <?php echo (empty($row['exp1'])  ? 'Less than a year': $row['exp1'].' year/s') ?>&nbsp
                            <?php echo $row['maid_his_country_2'] ?> - <?php echo (empty($row['exp2'])  ? 'Less than a year': $row['exp2'].' year/s') ?>&nbsp

                          <?php endif; ?>

                      </small> <br>
                      <small> <strong>Salary:  </strong> $<?php echo $row['maid_salary'] ?> </small> <br>
                      <small> <strong>Status: </strong> <?php echo ($row['status_name']=='Available' ? 'New' :$row['status_name'] ) ?></small> <br>
                      <small> <strong>Passport: </strong> <?php echo $row['maid_passport'] ?></small>
                    </td>
                    <td class="text-center" style="vertical-align:middle">

                      <a href="remove_cart/?id=<?php echo $row['maid_id'] ?>" class="btn btn-warning" class="text-center" style="vertical-align:middle">Remove</a>
                    </td>
                  </tr>
              <?php } ?>
            <?php endif; ?>

          </tbody>
        </table>
        <div class="text-right">
          <?php if (!empty($results) ): ?>
            <a href="#" class="btn btn-info">Submit</a>
          <?php endif; ?>

        </div>

      </div>
    </div>

  </div>
</header>

<?php get_footer(); ?>
