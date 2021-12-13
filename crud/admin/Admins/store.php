<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/

session_start();

$_name = $_POST['name'];
$_email = $_POST['email'];
$_password = $_POST['password'];
//echo $_title;

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO `admin` (`name`,`email`,`password`) 
          VALUES (:name, :email, :password);";

$stmt = $conn->prepare($query);

$result = $stmt->execute(array(
    ':name' => $_name,
    ':email' => $_email,
    ':password' => $_password
));

//$result = $stmt->execute();

//var_dump($result);


if ($result){
    $_SESSION['message'] = "Admin is added successfully";
}else{
    $_SESSION['message'] = "Admin is not added";
}

// this is for the location set to store.php to main home page index.php
header("location:index.php");
?>