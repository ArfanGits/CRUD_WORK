<?php

$approot = $_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/";
include_once ($approot. "vendor/autoload.php");

use Bitm\Banner;

$_banner = new Banner();

$banner = $_banner->delete();

?>