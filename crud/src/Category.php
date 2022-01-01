<?php

namespace Bitm;

use PDO;

class Category{
    public function index(){
        session_start();

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        
        
        $query = "SELECT * FROM `category`";
        
        $stmt = $conn->prepare($query);
        
        $result = $stmt->execute();
        
        $categorys = $stmt->fetchAll();
        
        return $categorys;
    }

    public function show(){
        $_id = $_GET['id'];

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM `category` WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $category = $stmt->fetch();

        return $category;
    }

    public function store(){
        session_start();

        $_name = $_POST['name'];
        $_link = $_POST['link'];

        $_created_at = date('Y-m-d h:i:s',time());
        //echo $_name;

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO `category` (`name`,`link`,`created_at`) 
                VALUES (:name, :link, :created_at);";

        $stmt = $conn->prepare($query);

        $result = $stmt->execute(array(
            ':name' => $_name,
            ':link' => $_link,
            ':created_at' => $_created_at
        ));

        //$result = $stmt->execute();

        //var_dump($result);


        if ($result){
            $_SESSION['message'] = "Category is added successfully";
        }else{
            $_SESSION['message'] = "Category is not added";
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

        $query = "DELETE FROM `category` WHERE `category`.`id` = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        //var_dump($result);

        if ($result){
            $_SESSION['message'] = "Category is deleted successfully";
        }else{
            $_SESSION['message'] = "Category is not deleted";
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

        $query = "SELECT * FROM `category` WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $category = $stmt->fetch();

        return $category;
    }

    public function update(){
        session_start();

        $_id = $_POST['id'];
        $_name = $_POST['name'];
        $_link = $_POST['link'];
        $_modified_at = date('Y-m-d h:i:s',time());

        //echo $_name;

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        $query = "UPDATE `category` SET `name` = :name, 
                                    `link` = :link,
                                    `modified_at` = :modified_at
                WHERE `category`.`id` = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':name', $_name);
        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':link', $_link);
        $stmt->bindParam(':modified_at', $_modified_at);

        $result = $stmt->execute();

        //var_dump($result);

        if ($result){
            $_SESSION['message'] = "Category is updated successfully";
        }else{
            $_SESSION['message'] = "Category is not updated";
        }

        // this is for the location set to store.php to main home page index.php
        header("location:index.php");

        return $result;
    }
}

?>