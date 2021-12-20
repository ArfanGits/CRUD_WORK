<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/

session_start();

$_name = $_POST['name'];
$_email = $_POST['email'];
$_subject = $_POST['subject'];
$_comment = $_POST['comment'];
$_date = $_POST['date'];

if (array_key_exists('status', $_POST)) {
    $_status = $_POST['status'];
} else {
    $_status = 0;
}
//echo $_title;

// $_date = date('Y-m-d h:i:s',time());

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO `contact` (`name`,`email`,`subject`,`comment`,`status`,`date`) 
          VALUES (:name, :email, :subject, :comment, :status, :date);";

$stmt = $conn->prepare($query);

$result = $stmt->execute(array(
    ':name' => $_name,
    ':email' => $_email,
    ':subject' => $_subject,
    ':comment' => $_comment,
    ':status' => $_status,
    ':date' => $_date
));

//$result = $stmt->execute();

//var_dump($result);


if ($result){
    $_SESSION['message'] = "Contact is added successfully";
}else{
    $_SESSION['message'] = "Contact is not added";
}

// this is for the location set to store.php to main home page index.php
header("location:index.php");
?>