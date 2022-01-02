<?php

include_once($_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/config.php");

use Bitm\Banner;

$_banner = new Banner();

$banner = $_banner->update();
?>


