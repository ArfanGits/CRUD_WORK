<?php

$approot = $_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/";
include_once ($approot. "vendor/autoload.php");

use Bitm\Category;

$_category = new Category();

$category = $_category->delete();

?>