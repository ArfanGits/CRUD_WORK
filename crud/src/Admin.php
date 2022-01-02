<?php

namespace Bitm;

use PDO;

class Admin{
    public function index(){
        session_start();

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        
        
        $query = "SELECT * FROM `admin`";
        
        $stmt = $conn->prepare($query);
        
        $result = $stmt->execute();
        
        $admins = $stmt->fetchAll();

        return $admins;
        
    }

    public function show(){
        $_id = $_GET['id'];
        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM `admin` WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $admin = $stmt->fetch();

        return $admin;
    }

    public function store(){
        session_start();

        $_name = $_POST['name'];
        $_email = $_POST['email'];
        $_password = $_POST['password'];
        $_phone = $_POST['phone'];

        $_created_at = date('Y-m-d h:i:s', time());

        //echo $_title;

        //Connect to database
        $conn = new PDO(
            "mysql:host=localhost;dbname=ecommerce",
            'root',
            ''
        );
        //set the PDO error mode to exception
        $conn->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );
        $query = "INSERT INTO `admin` (`name`,`email`,`password`,`phone`,`created_at`) 
                VALUES (:name, :email, :password,:phone,:created_at);";

        $stmt = $conn->prepare($query);

        $result = $stmt->execute(array(
            ':name' => $_name,
            ':email' => $_email,
            ':password' => $_password,
            ':phone' => $_phone,
            ':created_at' => $_created_at
        ));

        //$result = $stmt->execute();

        //var_dump($result);


        if ($result) {
            $_SESSION['message'] = "Admin is added successfully";
        } else {
            $_SESSION['message'] = "Admin is not added";
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

        $query = "DELETE FROM `admin` WHERE `admin`.`id` = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        //var_dump($result);

        if ($result){
            $_SESSION['message'] = "Admin is deleted successfully";
        }else{
            $_SESSION['message'] = "Admin is not deleted";
        }

        // this is for the location set to store.php to main home page index.php
        header("location:index.php");

        return $result;
    }

    public function edit(){
        $_id = $_GET['id'];

        //Connect to database
        $conn = new PDO(
            "mysql:host=localhost;dbname=ecommerce",
            'root',
            ''
        );
        //set the PDO error mode to exception
        $conn->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );

        $query = "SELECT * FROM `admin` WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $admin = $stmt->fetch();

        return $admin;
    }

    public function update(){

        session_start();

        $_id = $_POST['id'];
        $_name = $_POST['name'];
        $_email = $_POST['email'];
        $_phone = $_POST['phone'];
        $_password = $_POST['password'];
        $_modified_at = date('Y-m-d h:i:s',time());
        //echo $_name;

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        $query = "UPDATE `admin` SET `name` = :name, 
                                    `email` = :email, 
                                    `password` = :password,
                                    `phone` = :phone,
                                    `modified_at` = :modified_at
                WHERE `admin`.`id` = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':name', $_name);
        $stmt->bindParam(':email', $_email);
        $stmt->bindParam(':password', $_password);
        $stmt->bindParam(':phone', $_phone);
        $stmt->bindParam(':modified_at', $_modified_at);

        $result = $stmt->execute();

        if ($result){
            $_SESSION['message'] = "Admin is updated successfully";
        }else{
            $_SESSION['message'] = "Admin is not updated";
        }
        // this is for the location set to store.php to main home page index.php
        header("location:index.php");
        return $result;
    }

    


}

?>