<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/

$_title = $_POST['title'];
//echo $_title;

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO `product` (`title`) VALUES (:title);";

$stmt = $conn->prepare($query);
$stmt->bindParam(':title', $_title);
$result = $stmt->execute();

var_dump($result);

?>