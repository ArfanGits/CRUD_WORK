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

$_product_id = $_POST['product_id'];
$_product_title = $_POST['product_title'];
$_qty = $_POST['qty'];
//echo $_title;

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO `cart` (`product_id`,`product_title`,`qty`,`picture`) 
          VALUES (:product_id, :product_title, :qty, :picture);";

$stmt = $conn->prepare($query);

$result = $stmt->execute(array(
    ':product_id' => $_product_id,
    ':product_title' => $_product_title,
    ':qty' => $_qty,
    ':picture' => $_picture
));

//$result = $stmt->execute();

//var_dump($result);

if ($result){
    $_SESSION['message'] = "Cart is added successfully";
}else{
    $_SESSION['message'] = "Cart is not added";
}

// this is for the location set to store.php to main home page index.php
header("location:index.php");
?>