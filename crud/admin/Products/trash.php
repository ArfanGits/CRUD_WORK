<?php


include_once($_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/config.php");

use Bitm\Product;

$_product = new Product();

$_product->trash();

?>