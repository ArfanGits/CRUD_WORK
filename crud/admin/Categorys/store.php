<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/

session_start();

$_name = $_POST['name'];
$_link = $_POST['link'];

$_created_at = date('Y-m-d h:i:s',time());
//echo $_name;

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO `category` (`name`,`link`,`created_at`) 
          VALUES (:name, :link, :created_at);";

$stmt = $conn->prepare($query);

$result = $stmt->execute(array(
    ':name' => $_name,
    ':link' => $_link,
    ':created_at' => $_created_at
));

//$result = $stmt->execute();

//var_dump($result);


if ($result){
    $_SESSION['message'] = "Category is added successfully";
}else{
    $_SESSION['message'] = "Category is not added";
}

// this is for the location set to store.php to main home page index.php
header("location:index.php");
?>