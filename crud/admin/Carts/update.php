<?php

include_once($_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/config.php");

use Bitm\Cart;

$_cart = new Cart();

$cart = $_cart->update();

?>


