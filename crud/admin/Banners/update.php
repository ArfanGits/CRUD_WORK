<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/
session_start();

$_id = $_POST['id'];
$_title = $_POST['title'];
$_link = $_POST['link'];
$_promotional_message = $_POST['promotional_message'];
//echo $_title;

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "UPDATE `banner` SET `title` = :title, 
                               `link` = :link, 
                               `promotional_message` = :promotional_message
          WHERE `banner`.`id` = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':title', $_title);
$stmt->bindParam(':id', $_id);
$stmt->bindParam(':link', $_link);
$stmt->bindParam(':promotional_message', $_promotional_message);

$result = $stmt->execute();

//var_dump($result);

if ($result){
    $_SESSION['message'] = "Banner is updated successfully";
}else{
    $_SESSION['message'] = "Banner is not updated";
}

// this is for the location set to store.php to main home page index.php
header("location:index.php");
?>


