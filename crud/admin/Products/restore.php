<?php

session_start();

$_id = $_GET['id'];
$_is_deleted = 0;


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
    $_SESSION['message'] = "Product is restored successfully";
}else{
    $_SESSION['message'] = "Product can't be restored.";
}

header("location:index.php");

?>