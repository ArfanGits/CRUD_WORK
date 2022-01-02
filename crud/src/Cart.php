<?php

namespace Bitm;

use PDO;

class Cart{

    public $id = null;
    public $title = null;
    public $conn = null;

    public function __construct()
    {
        session_start();
        //Connect to database
        $this->conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
    }

    public function index(){

        $query = "SELECT * FROM `cart`";

        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute();

        $carts = $stmt->fetchAll();

        return $carts;
    }

    public function show(){
        
        $_id = $_GET['id'];

        $query = "SELECT * FROM `cart` WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $cart = $stmt->fetch();
        return $cart;
    }

    public function store(){

        $_picture = $this->upload();

        $_product_id = $_POST['product_id'];
        $_product_title = $_POST['product_title'];
        $_qty = $_POST['qty'];
        $_unite_price = $_POST['unite_price'];

        $_total_price = ($_unite_price*$_qty);

        $query = "INSERT INTO `cart` (`product_id`,
                                    `product_title`,
                                    `qty`,
                                    `unite_price`,
                                    `total_price`,
                                    `picture`) 
                VALUES (:product_id, 
                        :product_title, 
                        :qty,
                        :unite_price, 
                        :total_price, 
                        :picture);";

        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute(array(
            ':product_id' => $_product_id,
            ':product_title' => $_product_title,
            ':qty' => $_qty,
            ':unite_price' => $_unite_price,
            ':total_price' => $_total_price,
            ':picture' => $_picture
        ));

        if ($result){
            $_SESSION['message'] = "Cart is added successfully";
        }else{
            $_SESSION['message'] = "Cart is not added";
        }

        // this is for the location set to store.php to main home page index.php
        header("location:index.php");

        return $result;
    }

    public function delete(){
        $_id = $_GET['id'];

        $query = "DELETE FROM `cart` WHERE `cart`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        //var_dump($result);

        if ($result){
            $_SESSION['message'] = "Cart is deleted successfully";
        }else{
            $_SESSION['message'] = "Cart is not deleted";
        }

        // this is for the location set to store.php to main home page index.php
        header("location:index.php");

        return $result;
    }

    public function edit(){
        $_id = $_GET['id'];

        $query = "SELECT * FROM `cart` WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $cart = $stmt->fetch();

        return $cart;
    }

    public function update(){
        
        $_picture = $this->upload();

        $_id = $_POST['id'];
        $_product_id = $_POST['product_id'];
        $_product_title = $_POST['product_title'];
        $_qty = $_POST['qty'];
        $_unite_price = $_POST['unite_price'];
        $_total_price = ($_unite_price*$_qty);
        
        $query = "UPDATE `cart` SET `product_id` = :product_id, 
                                    `product_title` = :product_title, 
                                    `qty` = :qty,
                                    `picture` = :picture,
                                    `unite_price` = :unite_price,
                                    `total_price` = :total_price
                WHERE `cart`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':product_id', $_product_id);
        $stmt->bindParam(':product_title', $_product_title);
        $stmt->bindParam(':qty', $_qty);
        $stmt->bindParam(':unite_price', $_unite_price);
        $stmt->bindParam(':total_price', $_total_price);
        $stmt->bindParam(':picture', $_picture);

        $result = $stmt->execute();

        //var_dump($result);

        if ($result){
            $_SESSION['message'] = "Cart is updated successfully";
        }else{
            $_SESSION['message'] = "Cart is not updated";
        }

        // this is for the location set to store.php to main home page index.php
        header("location:index.php");

        return $result;
    }

    private function upload(){
        $approot = $_SERVER['DOCUMENT_ROOT'].'/batch1-arfan/crud/';

        $_picture = null;

        if($_FILES['picture']['name'] != ""){
            // Working with image
            $filename = 'IMG_'.time().'_'.$_FILES['picture']['name'];
            $target = $_FILES['picture']['tmp_name'];
            $destination = $approot.'uploads/'.$filename;

            $isFileMoved = move_uploaded_file($target, $destination);

            if ($isFileMoved){
                $_picture = $filename;
            }
        }else{
            if($_POST['old_picture']){
                $_picture = $_POST['old_picture'];
            }
        }
        
        return $_picture;
    }
}


?>