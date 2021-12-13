<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/

session_start();

$_product_id = $_POST['product_id'];
$_product_title = $_POST['product_title'];
$_qty = $_POST['qty'];
//echo $_title;

//Connect to database
$conn = new PDO("mysql:host=localhost;dbproduct_id=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO `cart`(`product_id`, `product_title`, `qty`)
            VALUES (:product_id, :product_title, :qty);";


$stmt = $conn->prepare($query);

$result = $stmt->execute(array(
    ':product_id' => $_product_id,
    ':product_title' => $_product_title,
    ':qty' => $_qty
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