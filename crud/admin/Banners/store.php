<?php

include_once($_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/config.php");

use Bitm\Banner;

$data = $_POST;

// Validation title

function is_empty($value){
    if($value == ''){
        return true;
    }else{
        return false;
    }
}

if(is_empty($data['title'])){
    session_start();
    $_SESSION['message'] = "Title can't be empty.";
    header('location:create.php');
}else{
    $_banner = new Banner();
    $banner = $_banner->store($data);
}


?>