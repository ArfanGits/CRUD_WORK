<?php

namespace Bitm;

use PDO;

class Contact{
    public function index(){
        session_start();

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        
        
        $query = "SELECT * FROM `contact`";
        
        $stmt = $conn->prepare($query);
        
        $result = $stmt->execute();
        
        $contacts = $stmt->fetchAll();
        
        return $contacts;
    }

    public function show(){
        $_id = $_GET['id'];

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);

        $query = "SELECT * FROM `contact` WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $contact = $stmt->fetch();

        return $contact;
    }

    public function store(){
        session_start();

        $_name = $_POST['name'];
        $_email = $_POST['email'];
        $_subject = $_POST['subject'];
        $_comment = $_POST['comment'];
        $_date = $_POST['date'];

        if (array_key_exists('status', $_POST)) {
            $_status = $_POST['status'];
        } else {
            $_status = 0;
        }
        //echo $_title;

        // $_date = date('Y-m-d h:i:s',time());

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO `contact` (`name`,`email`,`subject`,`comment`,`status`,`date`) 
                VALUES (:name, :email, :subject, :comment, :status, :date);";

        $stmt = $conn->prepare($query);

        $result = $stmt->execute(array(
            ':name' => $_name,
            ':email' => $_email,
            ':subject' => $_subject,
            ':comment' => $_comment,
            ':status' => $_status,
            ':date' => $_date
        ));

        //$result = $stmt->execute();

        //var_dump($result);


        if ($result){
            $_SESSION['message'] = "Contact is added successfully";
        }else{
            $_SESSION['message'] = "Contact is not added";
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

        $query = "DELETE FROM `contact` WHERE `contact`.`id` = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        //var_dump($result);

        if ($result){
            $_SESSION['message'] = "Contact is deleted successfully";
        }else{
            $_SESSION['message'] = "Contact is not deleted";
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

        $query = "SELECT * FROM `contact` WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);

        $result = $stmt->execute();

        $contact = $stmt->fetch();

        return $contact;
    }

    public function update(){
        session_start();

        $_id = $_POST['id'];
        $_name = $_POST['name'];
        $_email = $_POST['email'];
        $_subject = $_POST['subject'];
        $_comment = $_POST['comment'];
        $_date = $_POST['date'];
        //echo $_name;

        if (array_key_exists('status', $_POST)) {
            $_status = $_POST['status'];
        } else {
            $_status = 0;
        }

        //Connect to database
        $conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
        $query = "UPDATE `contact` SET `name` = :name, 
                                    `email` = :email, 
                                    `subject` = :subject,
                                    `comment` = :comment,
                                    `date` = :date,
                                    `status` = :status
                WHERE `contact`.`id` = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':name', $_name);
        $stmt->bindParam(':email', $_email);
        $stmt->bindParam(':subject', $_subject);
        $stmt->bindParam(':comment', $_comment);
        $stmt->bindParam(':date', $_date);
        $stmt->bindParam(':status', $_status);

        $result = $stmt->execute();

        //var_dump($result);

        if ($result){
            $_SESSION['message'] = "Contact is updated successfully";
        }else{
            $_SESSION['message'] = "Contact is not updated";
        }

        // this is for the location set to store.php to main home page index.php
        header("location:index.php");

        return $result;
    }
}

?>