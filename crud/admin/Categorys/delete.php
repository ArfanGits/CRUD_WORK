<?php

include_once($_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/config.php");

use Bitm\Category;

$_category = new Category();

$category = $_category->delete();

?>