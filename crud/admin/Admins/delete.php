<?php

include_once($_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/config.php");

use Bitm\Admin;

$_id = $_GET['id'];
$_admin = new Admin();

$admin = $_admin->delete($_id);
?>