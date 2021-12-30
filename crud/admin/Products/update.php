<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/
$approot = $_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/";
include_once ($approot. "vendor/autoload.php");

use Bitm\Product;

$_product = new Product();

$product = $_product->update();

//var_dump($result);


?>


