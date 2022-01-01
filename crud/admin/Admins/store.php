<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/

$approot = $_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/";
include_once ($approot. "vendor/autoload.php");

use Bitm\Admin;

$_admin = new Admin();

$admin = $_admin->store();
?>