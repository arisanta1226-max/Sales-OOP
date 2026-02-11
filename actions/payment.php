<?php

require_once "../classes/Products.php";

$product  = new Products;
$id = $_GET['id'];
$product->payment($id,$_POST);
?>