<?php

session_start();

$_id = $_GET['id'];
$_is_deleted = 1;


//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);

$query = "UPDATE `product` 
          SET `is_deleted` = :is_deleted
          WHERE `product`.`id` = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':id', $_id);
$stmt->bindParam(':is_deleted', $_is_deleted);

$result = $stmt->execute();

//var_dump($result);

if ($result){
    $_SESSION['message'] = "Product is trashed successfully";
}else{
    $_SESSION['message'] = "Product is not trashed";
}

header("location:index.php");

?>