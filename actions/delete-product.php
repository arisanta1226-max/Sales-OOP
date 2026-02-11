<?php

require_once "../classes/Products.php";

$product = new Products;
$id = $_GET['id'];
$product->deleteProduct($id);
?>