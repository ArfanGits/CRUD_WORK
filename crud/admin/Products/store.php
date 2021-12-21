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

if (array_key_exists('is_active', $_POST)) {
    $_is_active = $_POST['is_active'];
} else {
    $_is_active = 0;
}

if (array_key_exists('is_deleted', $_POST)) {
    $_is_deleted = $_POST['is_deleted'];
} else {
    $_is_deleted = 0;
}

$_created_at = date('Y-m-d h:i:s',time());

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO `product` (`title`,
                                `created_at`,
                                `is_deleted`,
                                `picture`,
                                `is_active`) 
          VALUES (:title, 
                 :created_at, 
                 :is_deleted, 
                 :picture, 
                 :is_active);";

$stmt = $conn->prepare($query);
$stmt->bindParam(':title', $_title);
$stmt->bindParam(':created_at', $_created_at);
$stmt->bindParam(':is_deleted', $_is_deleted);
$stmt->bindParam(':picture', $_picture);
$stmt->bindParam(':is_active', $_is_active);
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