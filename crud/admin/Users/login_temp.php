<?php

include_once($_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/config.php");
use Bitm\User;

$email = $_POST['email'];
$password = $_POST['password'];

function is_empty($value){
    if($value == ''){
        return true;
    }else{
        return false;
    }
}

if(empty($email) || empty($password)){
    session_start();
    $_SESSION['message'] = "Email can't be empty.";
    header("location:".$webroot."tempnew/user-login.php");
}else{
    $_user = new User();
    $_user->login_temp($email, $password);
}

?>