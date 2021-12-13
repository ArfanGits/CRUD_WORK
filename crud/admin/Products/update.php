<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/

session_start();

$_id = $_POST['id'];
$_title = $_POST['title'];
//echo $_title;

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "UPDATE `product` SET `title` = :title WHERE `product`.`id` = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':title', $_title);
$stmt->bindParam(':id', $_id);

$result = $stmt->execute();

if ($result){
    $_SESSION['message'] = "Product is updated successfully";
}else{
    $_SESSION['message'] = "Product is not updated";
}

//var_dump($result);

header("location:index.php");

?>


