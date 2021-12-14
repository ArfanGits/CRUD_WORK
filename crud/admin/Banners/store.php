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
$_link = $_POST['link'];
$_promotional_message = $_POST['promotional_message'];
//echo $_title;

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO `banner` (`title`,`link`,`promotional_message`,`picture`) 
          VALUES (:title, :link, :promotional_message, :picture);";

$stmt = $conn->prepare($query);

$result = $stmt->execute(array(
    ':title' => $_title,
    ':link' => $_link,
    ':promotional_message' => $_promotional_message,
    ':picture' => $_picture
));

//$result = $stmt->execute();

//var_dump($result);


if ($result){
    $_SESSION['message'] = "Banner is added successfully";
}else{
    $_SESSION['message'] = "Banner is not added";
}

// this is for the location set to store.php to main home page index.php
header("location:index.php");
?>