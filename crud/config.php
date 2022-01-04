<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$webroot = 'http://localhost/batch1-arfan/crud/';
$approot = $_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/";
include_once ($approot. "vendor/autoload.php");

?>