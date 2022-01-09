<?php
$_is_authenticated = $_SESSION['is_authenticated'];
if (!$_is_authenticated){
    header('location:'.$webroot.'404.php');
}

?>