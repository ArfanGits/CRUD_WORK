<?php

$approot = $_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/";
include_once ($approot. "vendor/autoload.php");

use Bitm\Contact;

$_contact = new Contact();

$contact = $_contact->update();

?>


