<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/

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
$query = "INSERT INTO `banner` (`title`,`link`,`promotional_message`) VALUES (:title, :link, :promotional_message);";

$stmt = $conn->prepare($query);

$result = $stmt->execute(array(
    ':title' => $_title,
    ':link' => $_link,
    ':promotional_message' => $_promotional_message
));

//$result = $stmt->execute();

var_dump($result);

?>