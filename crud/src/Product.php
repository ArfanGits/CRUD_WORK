<?php

namespace Bitm;

use PDO;

class Product{
    public function index(){
        session_start();

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        
        $query = "SELECT * FROM `product` WHERE is_deleted = 0";
        
        $stmt = $conn->prepare($query);
        
        $result = $stmt->execute();
        
        $products = $stmt->fetchAll();

        return $products;
    }

    public function show(){
        $_id = $_GET['id'];

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM `product` WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $product = $stmt->fetch();

        return $product;
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

        $_title = $_POST['title'];
        //echo $_title;

        if (array_key_exists('is_active', $_POST)) {
            $_is_active = $_POST['is_active'];
        } else {
            $_is_active = 0;
        }

        if (array_key_exists('is_deleted', $_POST)) {
            $_is_deleted = $_POST['is_deleted'];
        } else {
            $_is_deleted = 0;
        }

        $_created_at = date('Y-m-d h:i:s',time());

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO `product` (`title`,
                                        `created_at`,
                                        `is_deleted`,
                                        `picture`,
                                        `is_active`) 
                VALUES (:title, 
                        :created_at, 
                        :is_deleted, 
                        :picture, 
                        :is_active);";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':created_at', $_created_at);
        $stmt->bindParam(':is_deleted', $_is_deleted);
        $stmt->bindParam(':picture', $_picture);
        $stmt->bindParam(':is_active', $_is_active);
        $result = $stmt->execute();

        //var_dump($result);

        if ($result){
            $_SESSION['message'] = "Product is added successfully";
            
        }else{
            $_SESSION['message'] = "Product is not added";
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

        $query = "SELECT * FROM `product` WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $product = $stmt->fetch();

        return $product;
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
        $_title = $_POST['title'];
        //echo $_title;

        if (array_key_exists('is_active', $_POST)) {
            $_is_active = $_POST['is_active'];
        } else {
            $_is_active = 0;
        }

        if (array_key_exists('is_deleted', $_POST)) {
            $_is_deleted = $_POST['is_deleted'];
        } else {
            $_is_deleted = 0;
        }

        $_modified_at = date('Y-m-d h:i:s',time());

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        $query = "UPDATE `product` 
                SET `title` = :title, 
                `picture` = :picture,
                `is_active` = :is_active,
                `is_deleted` = :is_deleted,
                `modified_at` = :modified_at 
                WHERE `product`.`id` = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':picture', $_picture);
        $stmt->bindParam(':is_active', $_is_active);
        $stmt->bindParam(':is_deleted', $_is_deleted);
        $stmt->bindParam(':modified_at', $_modified_at);
        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        if ($result){
            $_SESSION['message'] = "Product is updated successfully";
        }else{
            $_SESSION['message'] = "Product is not updated";
        }
        
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

        $query = "DELETE FROM `product` WHERE `product`.`id` = :id";
        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $_id);
        $result = $stmt->execute();

        //var_dump($result);

        if ($result){
            $_SESSION['message'] = "Product is deleted successfully";
        }else{
            $_SESSION['message'] = "Product is not deleted";
        }

        header("location:trash_index.php");
        return $result;
    }

    public function trash(){
        session_start();

        $_id = $_GET['id'];
        $_is_deleted = 1;


        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

        $query = "UPDATE `product` 
                SET `is_deleted` = :is_deleted
                WHERE `product`.`id` = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':is_deleted', $_is_deleted);

        $result = $stmt->execute();

        //var_dump($result);

        if ($result){
            $_SESSION['message'] = "Product is trashed successfully";
        }else{
            $_SESSION['message'] = "Product is not trashed";
        }

        header("location:index.php");
        
        return $result;
    }

    public function trash_index(){
        session_start();

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM `product` WHERE is_deleted = 1";

        $stmt = $conn->prepare($query);

        $result = $stmt->execute();

        $products = $stmt->fetchAll();

        return $products;
    }

    public function restore(){
        session_start();

        $_id = $_GET['id'];
        $_is_deleted = 0;


        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

        $query = "UPDATE `product` 
                SET `is_deleted` = :is_deleted
                WHERE `product`.`id` = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':is_deleted', $_is_deleted);

        $result = $stmt->execute();

        //var_dump($result);

        if ($result){
            $_SESSION['message'] = "Product is restored successfully";
        }else{
            $_SESSION['message'] = "Product can't be restored.";
        }

        header("location:index.php");

        return $result;
    }
}

?>