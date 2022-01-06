<?php


include_once($_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/config.php");

use Bitm\User;

$_id = $_GET['id'];

$_user = new User();

$user = $_user->delete($_id);

?>