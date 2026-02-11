<?php

require_once "../classes/Products.php";

$product  = new Products;
$product->addProduct($_POST);
?>