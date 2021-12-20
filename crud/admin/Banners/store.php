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

if (array_key_exists('is_active', $_POST)) {
    $_is_active = $_POST['is_active'];
} else {
    $_is_active = 0;
}

if (array_key_exists('is_draft', $_POST)) {
    $_is_draft = $_POST['is_draft'];
} else {
    $_is_draft = 0;
}

$_created_at = date('Y-m-d h:i:s',time());

$_link = $_POST['link'];
$_promotional_message = $_POST['promotional_message'];
$_html_banner = $_POST['html_banner'];
//echo $_title;

//Connect to database
$conn = new PDO("mysql:host=localhost;dbname=ecommerce",
    'root', '');
//set the PDO error mode to exception
$conn->setAttribute(PDO::ATTR_ERRMODE,
    PDO::ERRMODE_EXCEPTION);
$query = "INSERT INTO `banner` (`title`, 
                                `is_active`,
                                `is_draft`,
                                `link`,
                                `promotional_message`,
                                `html_banner`,
                                `picture`,
                                `created_at`) 
          VALUES (:title, 
                  :is_active, 
                  :is_draft, 
                  :link, 
                  :promotional_message, 
                  :html_banner, 
                  :picture, 
                  :created_at);";

$stmt = $conn->prepare($query);

$result = $stmt->execute(array(
    ':title' => $_title,
    ':is_active' => $_is_active,
    ':is_draft' => $_is_draft,
    ':link' => $_link,
    ':promotional_message' => $_promotional_message,
    ':html_banner' => $_html_banner,
    ':picture' => $_picture,
    ':created_at' => $_created_at
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