<?php
/*echo "<pre>";
var_dump($_POST);
echo "</pre>";*/

$_product_id = $_POST['product_id'];
$_qty = $_POST['qty'];
//echo $_title;

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO `orders` (`product_id`,`qty`) 
          VALUES (:product_id, :qty);";

$stmt = $conn->prepare($query);

$result = $stmt->execute(array(
    ':product_id' => $_product_id,
    ':qty' => $_qty
));

//$result = $stmt->execute();

var_dump($result);

?>