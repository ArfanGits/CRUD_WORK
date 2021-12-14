<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/

session_start();

$approot = $_SERVER['DOCUMENT_ROOT'].'/batch1-arfan/crud/';

// Working with image
$target = $_FILES['picture']['tmp_name'];
$destination = $approot.'uploads/' .$_FILES['picture']['name'];

$isFileMoved = move_uploaded_file($target, $destination);
if ($isFileMoved){
    $_picture = $_FILES['picture']['name'];
}
else{
    $_picture = null;
}

$_title = $_POST['title'];
//echo $_title;

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO `product` (`title`,`picture`) 
          VALUES (:title, :picture);";

$stmt = $conn->prepare($query);
$stmt->bindParam(':title', $_title);
$stmt->bindParam(':picture', $_picture);
$result = $stmt->execute();

//var_dump($result);

if ($result){
    $_SESSION['message'] = "Product is added successfully";
}else{
    $_SESSION['message'] = "Product is not added";
}


// this is for the location set to store.php to main home page index.php
header("location:index.php");

?>