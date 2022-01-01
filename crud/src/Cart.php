<?php

namespace Bitm;

use PDO;

class Cart{
    public function index(){
        session_start();

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);


        $query = "SELECT * FROM `cart`";

        $stmt = $conn->prepare($query);

        $result = $stmt->execute();

        $carts = $stmt->fetchAll();

        return $carts;
    }

    public function show(){
        
        $_id = $_GET['id'];

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM `cart` WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $cart = $stmt->fetch();
        return $cart;
    }

    public function store(){
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
        $_unite_price = $_POST['unite_price'];

        $_total_price = ($_unite_price*$_qty);

        //echo $_title;

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
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

        $stmt = $conn->prepare($query);

        $result = $stmt->execute(array(
            ':product_id' => $_product_id,
            ':product_title' => $_product_title,
            ':qty' => $_qty,
            ':unite_price' => $_unite_price,
            ':total_price' => $_total_price,
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

        return $result;
    }

    public function delete(){
        session_start();

        $_id = $_GET['id'];

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

        $query = "DELETE FROM `cart` WHERE `cart`.`id` = :id";

        $stmt = $conn->prepare($query);

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

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM `cart` WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $cart = $stmt->fetch();

        return $cart;
    }

    public function update(){
        session_start();
        $approot = $_SERVER['DOCUMENT_ROOT'].'/batch1-arfan/crud/';

        if($_FILES['picture']['name'] != ''){
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
        }else{
            $_picture = $_POST['old_picture'];
        }

        $_id = $_POST['id'];
        $_product_id = $_POST['product_id'];
        $_product_title = $_POST['product_title'];
        $_qty = $_POST['qty'];
        $_unite_price = $_POST['unite_price'];
        $_total_price = ($_unite_price*$_qty);
        //echo $_title;

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        $query = "UPDATE `cart` SET `product_id` = :product_id, 
                                    `product_title` = :product_title, 
                                    `qty` = :qty,
                                    `picture` = :picture,
                                    `unite_price` = :unite_price,
                                    `total_price` = :total_price
                WHERE `cart`.`id` = :id";

        $stmt = $conn->prepare($query);

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
}


?>