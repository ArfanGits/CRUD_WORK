<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/
session_start();

$_id = $_POST['id'];
$_name = $_POST['name'];
$_link = $_POST['link'];
$_modified_at = date('Y-m-d h:i:s',time());

//echo $_name;

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "UPDATE `category` SET `name` = :name, 
                               `link` = :link,
                               `modified_at` = :modified_at
          WHERE `category`.`id` = :id";

$stmt = $conn->prepare($query);

$stmt->bindParam(':name', $_name);
$stmt->bindParam(':id', $_id);
$stmt->bindParam(':link', $_link);
$stmt->bindParam(':modified_at', $_modified_at);

$result = $stmt->execute();

//var_dump($result);

if ($result){
    $_SESSION['message'] = "Category is updated successfully";
}else{
    $_SESSION['message'] = "Category is not updated";
}

// this is for the location set to store.php to main home page index.php
header("location:index.php");
?>


