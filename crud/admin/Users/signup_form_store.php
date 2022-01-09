<?php

include_once($_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/config.php");
use Bitm\User;
$data = $_POST;
// Validation title

function is_empty($value){
    if($value == ''){
        return true;
    }else{
        return false;
    }
}

if(is_empty($data['full_name'])){
    session_start();
    $_SESSION['message'] = "Users Full Name can't be empty.";
    header('location:".$webroot."front/public/signup.php');
}else{
    $_user = new User();
    $user = $_user->signup_form_store($data);
}


?>