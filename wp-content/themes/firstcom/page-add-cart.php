<?php /* Template Name: Page - Add Cart Logic */ ?>

<?php

 //start session
session_start();
//$_SESSION['cart'] = array();
$id = isset($_GET['id']) ? $_GET['id'] : "";

//die($id);
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
  //  die();
}
  //$_SESSION['cart'][] = $id;
    //$_SESSION['variable1'] = "Test1";
  //  array_push($_SESSION['cart'],$id);
  //$_SESSION['cart'] = $id;
    //header('Location: maids/?action=added');

if(array_key_exists($id, $_SESSION['cart'])){
    // redirect to product list and tell the user it was added to cart
    //header('Location: page-maids.php?action=exists&id=' . $id);
  //  header('Location: page-maids.php?action=exists&id=' . $id);
    header('Location: maids/?action=exists');
}

// else, add the item to the array
else{
    // $_SESSION['cart']=$id;
     $_SESSION['cart'][$id]=1;
  //  $_SESSION['cart'] = $id;
    // array_push($_SESSION['cart'],$id);
   //  unset($_SESSION["cart"]);
    //unset($_SESSION["variable1"]);
    // redirect to product list and tell the user it was added to cart
  //  header('Location: page-maids.php?action=added');
  //  print_r($_SESSION['cart']);die();
    header('Location: maids/?action=added');
}

 ?>
