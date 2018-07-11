<?php

class MaidList{

  private $conn;
  private $sql;


  public function __construct($db){
        $this->conn = $db;
    }

  public function getMaidList(){
    $this->sql = "SELECT m.maid_id,m.active, m.maid_name, m.maid_img, m.maid_ref_no, m.maid_arrival,
          m.nationality_id, m.maid_age, m.maid_height, m.maid_weight, m.maid_religion,
          m.maid_educ, m.offday, m.maid_mar_status, m.maid_salary, m.status_id, m.maid_passport,
          m.maid_his_country_1,m.maid_his_country_2,TIMESTAMPDIFF(YEAR, m.maid_his_frm_1, m.maid_his_to_1) as exp1,TIMESTAMPDIFF(YEAR, m.maid_his_frm_2, m.maid_his_to_2) as exp2,
          n.nationality_name, n.nationality_flag FROM maid as m
          LEFT JOIN nationality as n ON m.nationality_id = n.nationality_id
          LEFT JOIN status as s ON m.status_id = s.status_id WHERE
          m.active = '1' AND m.status_id IN (1,8)";

    return $this->conn->query($this->sql);
    //$where = "WHERE m.active = '1' AND m.status_id IN (1,8)";
  }

  public function getOneMaid($id){

      $this->sql = "SELECT m.*,TIMESTAMPDIFF(YEAR, m.maid_his_frm_1, m.maid_his_to_1) as exp1,TIMESTAMPDIFF(YEAR, m.maid_his_frm_2, m.maid_his_to_2) as exp2,
            n.nationality_name, n.nationality_flag, c.company_name, c.roc_no, c.license FROM maid as m
            LEFT JOIN nationality as n ON m.nationality_id = n.nationality_id
            LEFT JOIN company as c ON m.maid_company = c.company_id
            WHERE
            m.active = '1' AND m.status_id IN (1,8) AND m.maid_id = '$id' ";

    //  return $this->conn->query($this->sql);
      $result = $this->conn->query($this->sql);
      return $result->fetch_assoc();
  }

  public function getMaidSelected($id){

    foreach ($id as $key => $value) {
      $test[] = $key;
    }

    $listid = implode(",",$test) ;
  //  print_r($listid);
  //  die();
    $this->sql = "SELECT m.maid_id,m.active, m.maid_name, m.maid_img, m.maid_ref_no, m.maid_arrival,
          m.nationality_id, m.maid_age, m.maid_height, m.maid_weight, m.maid_religion,
          m.maid_educ, m.offday, m.maid_mar_status, m.maid_salary, m.status_id, m.maid_passport,
          m.maid_his_country_1,m.maid_his_country_2,TIMESTAMPDIFF(YEAR, m.maid_his_frm_1, m.maid_his_to_1) as exp1,TIMESTAMPDIFF(YEAR, m.maid_his_frm_2, m.maid_his_to_2) as exp2,
          n.nationality_name, n.nationality_flag FROM maid as m
          LEFT JOIN nationality as n ON m.nationality_id = n.nationality_id
          LEFT JOIN status as s ON m.status_id = s.status_id WHERE
          m.active = '1' AND m.maid_id IN ($listid)";

  //  echo '<pre>';
  //  print_r($this->sql);
  //  die();

    $result = $this->conn->query($this->sql);
    return $result;
  //  return $result->fetch_assoc();
  }




}


 ?>
