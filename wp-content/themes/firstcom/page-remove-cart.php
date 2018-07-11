<?php /* Template Name: Page - Remove Maid List in Cart Page Logic*/ ?>


<?php
// start session
session_start();

// get the product id
$id = isset($_GET['id']) ? $_GET['id'] : "";
//$name = isset($_GET['name']) ? $_GET['name'] : "";
//print_r($id);
//die();
// remove the item from the array
unset($_SESSION['cart'][$id]);

// redirect to product list and tell the user it was added to cart
header('Location: cart_list?action=removed&id=' . $id);
?>
