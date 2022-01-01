<?php
$approot = $_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/";
include_once ($approot. "vendor/autoload.php");

use Bitm\Cart;

$_cart = new Cart();

$cart = $_cart->update();
?>


