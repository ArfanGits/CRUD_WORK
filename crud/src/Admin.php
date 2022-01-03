<?php

namespace Bitm;

use PDO;

class Admin{

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
        
        
        $query = "SELECT * FROM `admin`";
        
        $stmt = $this->conn->prepare($query);
        
        $result = $stmt->execute();
        
        $admins = $stmt->fetchAll();

        return $admins;
        
    }

    public function show($id){
        
        $query = "SELECT * FROM `admin` WHERE id = :id";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();
        $admin = $stmt->fetch();
        return $admin;
    }

    public function store($data){

        $_name = $data['name'];
        $_email = $data['email'];
        $_password = $data['password'];
        $_phone = $data['phone'];

        $_created_at = date('Y-m-d h:i:s', time());

        $query = "INSERT INTO `admin` (`name`,`email`,`password`,`phone`,`created_at`) 
                VALUES (:name, :email, :password,:phone,:created_at);";

        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute(array(
            ':name' => $_name,
            ':email' => $_email,
            ':password' => $_password,
            ':phone' => $_phone,
            ':created_at' => $_created_at
        ));

        if ($result) {
            $_SESSION['message'] = "Admin is added successfully";
        } else {
            $_SESSION['message'] = "Admin is not added";
        }

        // this is for the location set to store.php to main home page index.php
        header("location:index.php");
        return $result;
    }

    public function delete($id){
        $query = "DELETE FROM `admin` WHERE `admin`.`id` = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();
        if ($result){
            $_SESSION['message'] = "Admin is deleted successfully";
        }else{
            $_SESSION['message'] = "Admin is not deleted";
        }
        // this is for the location set to store.php to main home page index.php
        header("location:index.php");
        return $result;
    }

    public function edit($id){

        $query = "SELECT * FROM `admin` WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $result = $stmt->execute();
        $admin = $stmt->fetch();
        return $admin;
    }

    public function update($data){

        $_id = $data['id'];
        $_name = $data['name'];
        $_email = $data['email'];
        $_phone = $data['phone'];
        $_password = $data['password'];
        $_modified_at = date('Y-m-d h:i:s',time());
       
        $query = "UPDATE `admin` SET `name` = :name, 
                                    `email` = :email, 
                                    `password` = :password,
                                    `phone` = :phone,
                                    `modified_at` = :modified_at
                WHERE `admin`.`id` = :id";

        $stmt = $this->conn->prepare($query);

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