<?php
  session_start();
  $_SESSION['cart']=isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
  //$_SESSION['cart']=!empty($_SESSION['cart']) ? $_SESSION['cart'] : array();
 ?>
<?php /* Template Name: Page - Maid Search */ ?>

<?php get_header();?>
<?php
  include 'objects/database.php';
  include 'objects/maid_list.php';

  $database = new Database();
  $conn = $database->getConnection();
  $mlist = new MaidList($conn);

  $result =$mlist->getMaidList();

  //dropdown list of statuses
  //$nsql = "SELECT status_id, status_name FROM status only available and transfer ";
  $nsql = "SELECT status_id, status_name FROM status WHERE status_id IN (1,8)";
  $status_list = $conn->query($nsql);

  //nationality dropdown only active
  $nationsql = "SELECT nationality_id, nationality_name FROM nationality WHERE active = '1' ";
  $nation_list = $conn->query($nationsql);

  //nationality dropdown all records
  $nationall = "SELECT nationality_id, nationality_name FROM nationality";
  $nationall_list = $conn->query($nationall);


  //dropdown selection for age range search filter
  $age_range = [
    0=>'No Preference',
    1=>'21 to 25',
    2=>'26 to 30',
    3=>'31 to 35',
    4=>'36 to 40',
    5=>'41 and above',
  ];

  $marital_list = [
    'Married'=>'Married',
    'Single'=>'Single',
    'Divorced'=>'Divorced',
    'Widowed'=>'Widowed',
  ];

  $exp_list = [
    0=>'No Preference',
    1=>'Less than one year',
    2=>'1 - 2 years',
    3=>'3 - 4 years',
    4=>'5 - 6 years',
    5=>'7 years and above',
  ];

  $i = 1;
    $values = get_field('maid_filter','options');
  //post
  //$where = "WHERE m.active = '1' ";
  $refnp = $name = $srange = $status = $marital_stats = $limits = $country_all = $years_exp = '';
  $nation = [];
  $nation_stat = [];
  if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $where = "WHERE m.active = '1' AND m.status_id IN (1,8)";
  //  print_r($_POST);die();
    if (!empty($_POST["refno"])) {
      $refnp = test_input($_POST["refno"]);
      $where .= "AND m.maid_ref_no = '$refnp' ";
    }
    if (!empty($_POST["maid_name"])) {
      $name = test_input($_POST["maid_name"]);
      $where .= "AND m.maid_name LIKE '%$name%' ";
    }
    if (!empty($_POST["age_range"])) {
    //  $name = test_input($_POST["maid_name"]);
      $srange = $_POST["age_range"];
      $where .= rangeLimit($srange);

    //  $where .= "AND m.maid_age BETWEEN '%$name%' ";
    }

    if (!empty($_POST["statuses"])) {
      $status = $_POST["statuses"];
      $where .= "AND m.status_id = '$status' " ;
      if ($status == 8) {
        $limit = "LIMIT 8";
      }
    }

    if (!empty($_POST["marital"])) {
      $marital_stats = $_POST["marital"];
      $where .= "AND m.maid_mar_status = '$marital_stats' " ;
    }

    if (!empty($_POST["nation"])) {
      foreach($_POST['nation'] as $selected) {
        $nation_stat[] = $selected;
      }
      $all = implode(',', $nation_stat);
      $where .= "AND m.nationality_id IN ($all) " ;
    }

    //experience
    if (!empty($_POST["experience"])) {
      $years_exp = $_POST["experience"];
      $where .= yearsExp($years_exp);
    //  print_r($where);die();
      //$where .= "AND m.maid_mar_status = '$marital_stats' " ;
    }

    if (!empty($_POST['nation_all']) ) {
      $country_all = $_POST['nation_all'];
      $where .= "AND (m.maid_his_country_1 = '$country_all' OR m.maid_his_country_2 = '$country_all')" ;
    }



    $sql = "SELECT m.maid_id, m.maid_name,m.active, m.maid_img, m.maid_ref_no, m.maid_arrival,
          m.nationality_id, m.maid_age, m.maid_height, m.maid_weight, m.maid_religion,
          m.maid_educ, m.offday, m.maid_mar_status, m.maid_salary, m.status_id, m.maid_passport,
          m.maid_his_country_1,m.maid_his_country_2,TIMESTAMPDIFF(YEAR, m.maid_his_frm_1, m.maid_his_to_1) as exp1,TIMESTAMPDIFF(YEAR, m.maid_his_frm_2, m.maid_his_to_2) as exp2,
          n.nationality_name, n.nationality_flag,s.status_name FROM maid as m
          LEFT JOIN nationality as n ON m.nationality_id = n.nationality_id
          LEFT JOIN status as s ON m.status_id = s.status_id
          $where $limit";
    //print_r($sql);die();
    $result = $conn->query($sql);
  //  print_r($result->fetch_assoc());die();

  }



 ?>
<pre>
  <?php print_r($_SESSION['cart']) ?>
</pre>

<?php
  $action =  isset($_GET['action']) ? $_GET['action'] : "";

 ?>

<?php $cart_count=count($_SESSION['cart']);  ?>
<?php   //unset($_SESSION["cart"]); ?>

<header class="cover">

	<div class="container" style="background-color:white">
		<!---<div class="col-md-12 col-xs-12 clear-8 clear-bot-8 table-responsive">--->
		<div class="col-md-12 col-xs-12  table-responsive">
            <?php if ($action=='added'): ?>
              <div class="alert alert-success alert-dismissible" style="margin-bottom:0px; margin-top:10px">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                Added Maid.
              </div>
            <?php endif; ?>
        <br>
          <a href="cart_list" class="btn btn-default">Cart <span class="badge" id="comparison-count"><?php echo $cart_count; ?></span>  </a>
        <br><br>
        <div class="panel panel-default">
          <div class="panel-body">
            <form class=""  method="post">

              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <div class="col-lg-3 form-group">
                      <label>Nationality</label>
                    </div>
                    <div class="col-lg-3 form-group">
                      <?php  while($row = $nation_list->fetch_assoc() ) { ?>

                        <?php $test = in_array($row['nationality_id'],$nation_stat) ?>

                        <?php if ($test): ?>
                          <input type="checkbox" name="nation[]" value=" <?php  echo $row['nationality_id'] ?>" checked> <?php echo $row['nationality_name'] ?><br>
                        <?php else: ?>
                          <input type="checkbox" name="nation[]" value=" <?php  echo $row['nationality_id'] ?>" > <?php echo $row['nationality_name'] ?><br>

                        <?php endif; ?>
                      <?php } ?>
                    </div>
                    <div class="col-lg-3 form-group">
                      <label>Experience in Years</label>
                    </div>
                    <div class="col-lg-3 form-group">
                      <select class="form-control" name="experience">
                        <?php foreach ($exp_list as $k => $v): ?>
                          <?php if ($k == $years_exp): ?>
                              <option value="<?php echo $k ?>" selected><?php echo $v ?></option>
                          <?php else: ?>
                              <option value="<?php echo $k ?>"><?php echo $v ?></option>
                          <?php endif; ?>

                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div style="clear:both"></div>

                  <div class="form-group">
                    <div class="col-lg-3 form-group">
                      <label>Marital Status</label>
                    </div>
                    <div class="col-lg-3 form-group">
                        <select class="form-control" name="marital">
                            <option value="">No Preference</option>
                            <?php foreach ($marital_list as $key => $value): ?>
                                <?php if ($key == $marital_stats): ?>
                                  <option  value="<?php echo $key ?>" selected><?php echo $value ?></option>
                                <?php endif; ?>
                                  <option  value="<?php echo $key ?>"><?php echo $value ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-lg-3 form-group">
                      <label>Country Experience : </label>
                    </div>
                    <div class="col-lg-3 form-group">
                      <select class="form-control" name="nation_all">
                          <option value="">No Preference</option>
                          <?php  while($row = $nationall_list->fetch_assoc() ) { ?>

                            <?php if ($row['nationality_name'] == $country_all ): ?>
                              <option  value="<?php echo $row['nationality_name'] ?>" selected><?php echo $row['nationality_name'] ?></option>
                            <?php else: ?>
                              <option  value="<?php echo $row['nationality_name'] ?>"><?php echo $row['nationality_name'] ?></option>
                            <?php endif; ?>
                          <?php } ?>
                      </select>
                    </div>
                  </div>

                  <div style="clear:both"></div>

                  <div class="form-group">
                    <div class="col-lg-3 form-group">
                      <label>Status</label>
                    </div>
                    <div class="col-lg-3 form-group">
                      <select class="form-control" name="statuses">
                        <?php  while($row = $status_list->fetch_assoc() ) { ?>
                          <?php if ($row['status_id']==$status): ?>
                            <option value="<?php echo $row['status_id'] ?>" selected><?php echo ($row['status_name'] == 'Available' ? 'New': $row['status_name']) ?></option>
                          <?php else: ?>
                            <option value="<?php echo $row['status_id'] ?>"><?php echo ($row['status_name'] == 'Available' ? 'New': $row['status_name']) ?></option>

                          <?php endif; ?>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="col-lg-3 form-group">
                        <label>Age Range</label>
                    </div>
                    <div class="col-lg-3 form-group">
                      <select class="form-control" name="age_range">
                        <?php foreach ($age_range as $key => $value): ?>
                            <?php if ($key == $srange): ?>
                              <option value="<?php echo $key ?>" selected><?php echo $value ?></option>
                            <?php else: ?>
                              <option value="<?php echo $key ?>"><?php echo $value ?></option>

                            <?php endif; ?>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>

                  <div style="clear:both"></div>

                  <div class="form-group">
                    <div class="col-lg-3 form-group">
                      <label for="">Ref No</label>
                    </div>
                    <div class="col-lg-3 form-group">

                      <input type="text" name="refno" value="<?php echo $refno ?>"class="form-control">
                    </div>
                    <div class="col-lg-3 form-group">
                      <label for="">Name</label>
                    </div>
                    <div class="col-lg-3 form-group">
                      <input type="text" name="maid_name" value="<?php echo $name ?>" class="form-control">
                    </div>
                  </div>


                </div>

              </div>
              <div class="form-group">
                <input type="submit" name="submit" value="Search" class="btn btn-primary" />

              </div>
            </form>


          </div>
        </div>

        <table class="table table-striped table-hover">
          <thead>

              <th style="width:10%">Photo</th>
              <th style="width:10%">Ref No</th>
              <th style="width:30%">Detail</th>
              <th style="width:10%">Photo</th>
              <th style="width:10%">Ref No </th>
              <th style="width:30%">Detail </th>

          </thead>
          <tbody>
            <?php if ($result->num_rows > 0): ?>
              <?php  while($row = $result->fetch_assoc() ) { ?>
                  <?php if ($i%2 ==1 ): ?>
                      <tr>
                        <td>
                          <a href="<?php echo $values[0]['maid_print'].'?mid='.$row['maid_id']  ?>" target="_blank">
                            <img src="https://www.jackfocus.com.sg/system/<?php echo $row['maid_img'] ?>" alt="" class="img-responsive" style="width:150;height:110">
                          </a>
                        </td>
                        <td>
                          <h4> <?php echo $row['maid_ref_no'] ?></h4>

                          <a href="add_cart/?id=<?php echo $row['maid_id'] ?>" class="btn btn-default add-cart">Add</a>

                          <?php $data = get_field('maid_search_float','options'); ?>
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

                  <?php else: ?>


                      <td>
                        <a href="<?php echo $values[0]['maid_print'].'?mid='.$row['maid_id']  ?>" target="_blank">
                          <img src="https://www.jackfocus.com.sg/system/<?php echo $row['maid_img'] ?>" alt="" class="img-responsive" style="width:150;height:110">
                        </a>
                      </td>
                      <td>
                        <h4> <?php echo $row['maid_ref_no'] ?></h4>
                        <?php $data = get_field('maid_search_float','options'); ?>
                        <a href="add_cart/?id=<?php echo $row['maid_id'] ?>" class="btn btn-default add-cart">Add</a>



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



                    </tr>
                  <?php endif; ?>

              <?php $i++ ?>

             <?php } ?>



            <?php endif; ?>
          </tbody>
        </table>


		</div>
	</div>
</header>


<?php
  //$values = get_field('maid_filter','options');
  //$values = get_field('maid_search_float','options');
  //print_r($values)
?>
<?php get_footer(); ?>

<?php
//function lists
  function rangeLimit($data){
    $whereq = '';
    switch ($data) {
      case 1:
        $whereq = "AND m.maid_age BETWEEN 21 AND 26 ";
        break;
      case 2:
        $whereq = "AND m.maid_age BETWEEN 26 AND 30 ";
        break;

      case 3:
        $whereq = "AND m.maid_age BETWEEN 31 AND 35 ";
        break;

      case 4:
        $whereq = "AND m.maid_age BETWEEN 36 AND 40 ";
        break;

      case 5:
        $whereq = "AND m.maid_age BETWEEN 41 AND 70 ";
        break;

      default:
        $whereq = '';
        break;
    }
    return $whereq;
  }

  function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  function yearsExp($data){
    $whereq = '';
    switch ($data) {
      case 1:
        $whereq = "AND ( COALESCE(TIMESTAMPDIFF(YEAR, maid_his_frm_1,maid_his_to_1),0) + COALESCE(TIMESTAMPDIFF(YEAR, maid_his_frm_2,maid_his_to_2),0)) = '0'";
        break;
      case 2:
        $whereq = "AND ( COALESCE(TIMESTAMPDIFF(YEAR, maid_his_frm_1,maid_his_to_1),0) + COALESCE(TIMESTAMPDIFF(YEAR, maid_his_frm_2,maid_his_to_2),0)) BETWEEN '1' AND '2'";
        break;
      case 3:
        $whereq = "AND ( COALESCE(TIMESTAMPDIFF(YEAR, maid_his_frm_1,maid_his_to_1),0) + COALESCE(TIMESTAMPDIFF(YEAR, maid_his_frm_2,maid_his_to_2),0)) BETWEEN '3' AND '4'";
        break;
      case 4:
        $whereq = "AND ( COALESCE(TIMESTAMPDIFF(YEAR, maid_his_frm_1,maid_his_to_1),0) + COALESCE(TIMESTAMPDIFF(YEAR, maid_his_frm_2,maid_his_to_2),0)) BETWEEN '5' AND '6'";
        break;
      case 5:
        $whereq = "AND ( COALESCE(TIMESTAMPDIFF(YEAR, maid_his_frm_1,maid_his_to_1),0) + COALESCE(TIMESTAMPDIFF(YEAR, maid_his_frm_2,maid_his_to_2),0)) >= '7'";
        break;

      default:
        $whereq = '';
        break;
    }
      return $whereq;
  }


 ?>
