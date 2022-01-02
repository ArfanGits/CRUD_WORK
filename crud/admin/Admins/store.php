<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/

include_once($_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/config.php");

use Bitm\Admin;

$_admin = new Admin();

$admin = $_admin->store();
?>