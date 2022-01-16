<?php

namespace Bitm;

use PDO;

class User{

    public $id = null;
    public $conn = null;

    public function __construct()
    {
        //Connect to database
        $this->conn = new PDO("mysql:host=localhost;dbname=ecommerce",
            'root', '');
        //set the PDO error mode to exception
        $this->conn->setAttribute(PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION);
    }

    public function index(){

        $query = "SELECT * FROM `user`";

        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute();

        $users = $stmt->fetchAll();

        return $users;
    }

    public function getActiveBanners(){

        $_startFrom = 0;
        $_total = 3;
        $query = "SELECT * FROM `banner` WHERE is_active = 1 LIMIT $_startFrom, $_total";

        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute();

        $banners = $stmt->fetchAll();

        return $banners;
    }

    public function show($id){

        $query = "SELECT * FROM `user` WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();

        $user = $stmt->fetch();

        return $user;
    }

    public function store($data){

        $_picture = $this->upload();
        $_full_name = $data['full_name'];
        $_user_name = $data['user_name'];
        $_email = $data['email'];
        $_password = $data['password'];
        $_phone_number = $data['phone_number'];

        if (array_key_exists('is_deleted', $data)) {
            $_is_deleted = $data['is_deleted'];
        } else {
            $_is_deleted = 0;
        }

        $_created_at = date('Y-m-d h:i:s',time());
        
        $query = "INSERT INTO `user` (`full_name`, 
                                        `user_name`,
                                        `email`,
                                        `password`,
                                        `picture`,
                                        `phone_number`,
                                        `created_at`,
                                        `is_deleted`
                                        ) 
                VALUES (:full_name, 
                        :user_name, 
                        :email, 
                        :password, 
                        :picture, 
                        :phone_number, 
                        :created_at,
                        :is_deleted
                        );";

        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute(array(
            ':full_name' => $_full_name,
            ':user_name' => $_user_name,
            ':email' => $_email,
            ':password' => $_password,
            ':picture' => $_picture,
            ':phone_number' => $_phone_number,
            ':created_at' => $_created_at,
            ':is_deleted' => $_is_deleted
        ));

        //$result = $stmt->execute();

        //var_dump($result);


        if ($result){
            $_SESSION['message'] = "User is added successfully";
        }else{
            $_SESSION['message'] = "User is not added";
        }

        // this is for the location set to store.php to main home page index.php
        header("location:index.php");

        return $result;
    }

    public function delete($id){

        $query = "DELETE FROM `user` WHERE `user`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();

        //var_dump($result);

        if ($result){
            $_SESSION['message'] = "User is deleted successfully";
        }else{
            $_SESSION['message'] = "User is not deleted";
        }

        // this is for the location set to store.php to main home page index.php
        header("location:index.php");

        return $result;
    }

    public function edit($id){
        
        $query = "SELECT * FROM `user` WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();

        $user = $stmt->fetch();

        return $user;
    }

    public function update($data){
    
        $_picture = $this->upload();

        $_full_name = $data['full_name'];
        $_user_name = $data['user_name'];
        $_email = $data['email'];
        $_password = $data['password'];
        $_phone_number = $data['phone_number'];

        if (array_key_exists('is_deleted', $data)) {
            $_is_deleted = $data['is_deleted'];
        } else {
            $_is_deleted = 0;
        }

        $_modified_at = date('Y-m-d h:i:s',time());

        $query = "UPDATE `user` SET `full_name` = :full_name, 
                                    `user_name` = :user_name, 
                                    `email` = :email, 
                                    `password` = :password, 
                                    `picture` = :picture,
                                    `phone_number` = :phone_number,
                                    `modified_at` = :modified_at,
                                    `is_deleted` = :is_deleted 
                WHERE `user`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        
        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':full_name', $_full_name);
        $stmt->bindParam(':user_name', $_user_name);
        $stmt->bindParam(':email', $_email);
        $stmt->bindParam(':password', $_password);
        $stmt->bindParam(':picture', $_picture);
        $stmt->bindParam(':phone_number', $_phone_number);
        $stmt->bindParam(':is_deleted', $_is_deleted);
        $stmt->bindParam(':modified_at', $_modified_at);

        $result = $stmt->execute();

        //var_dump($result);

        if ($result){
            $_SESSION['message'] = "User is updated successfully";
        }else{
            $_SESSION['message'] = "User is not updated";
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

    public function signup_form_store($data){

        $_picture = $this->upload();
        $_full_name = $data['full_name'];
        $_user_name = $data['user_name'];
        $_email = $data['email'];
        $_password = $data['password'];
        $_phone_number = $data['phone_number'];

        $_created_at = date('Y-m-d h:i:s',time());
        
        $query = "INSERT INTO `user` (`full_name`, 
                                        `user_name`,
                                        `email`,
                                        `password`,
                                        `picture`,
                                        `phone_number`,
                                        `created_at`
                                        ) 
                VALUES (:full_name, 
                        :user_name, 
                        :email, 
                        :password, 
                        :picture, 
                        :phone_number, 
                        :created_at
                        );";

        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute(array(
            ':full_name' => $_full_name,
            ':user_name' => $_user_name,
            ':email' => $_email,
            ':password' => $_password,
            ':picture' => $_picture,
            ':phone_number' => $_phone_number,
            ':created_at' => $_created_at
        ));

        //$result = $stmt->execute();

        //var_dump($result);


        if ($result){
            $_SESSION['message'] = "User is added successfully";
        }else{
            $_SESSION['message'] = "User is not added";
        }

        // this is for the location set to store.php to main home page index.php
        header("location:http://localhost/batch1-arfan/crud/front/public/login.php");

        return $result;
    }

    public function login($user_name, $password){
            $query = "SELECT COUNT(*) AS total FROM `user` WHERE user_name LIKE :user_name AND password LIKE :password;";

            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':user_name', $user_name);
            $stmt->bindParam(':password', $password);
            $result = $stmt->execute();
            $totalfound = $stmt->fetch();
            if($totalfound['total'] > 0){
                $_SESSION['is_authenticated']=true;
                header("location:http://localhost/batch1-arfan/crud/front/public/index.php");
            }else{
                $_SESSION['is_authenticated']=false;
                header("location:http://localhost/batch1-arfan/crud/404.php");
            }
    }


    public function signup_form_temp($data){

        $_full_name = $data['full_name'];
        $_user_name = $data['user_name'];
        $_email = $data['email'];
        $_password = $data['password'];

        $_created_at = date('Y-m-d h:i:s',time());
        
        $query = "INSERT INTO `user` (`full_name`, 
                                        `user_name`,
                                        `email`,
                                        `password`,
                                        `created_at`
                                        ) 
                VALUES (:full_name, 
                        :user_name, 
                        :email, 
                        :password,
                        :created_at
                        );";

        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute(array(
            ':full_name' => $_full_name,
            ':user_name' => $_user_name,
            ':email' => $_email,
            ':password' => $_password,
            ':created_at' => $_created_at
        ));

        //$result = $stmt->execute();

        //var_dump($result);


        if ($result){
            $_SESSION['message'] = "User is added successfully";
        }else{
            $_SESSION['message'] = "User is not added";
        }

        // this is for the location set to store.php to main home page index.php
        header("location:http://localhost/batch1-arfan/crud/tempnew/user-login.php");

        return $result;
    }

    public function login_temp($email, $password){
        $query = "SELECT COUNT(*) AS total FROM `user` WHERE email LIKE :email AND password LIKE :password;";

        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $result = $stmt->execute();
        $totalfound = $stmt->fetch();
        if($totalfound['total'] > 0){
            $_SESSION['is_authenticated']=true;
            header("location:http://localhost/batch1-arfan/crud/tempnew/index-2.html");
        }else{
            $_SESSION['is_authenticated']=false;
            header("location:http://localhost/batch1-arfan/crud/tempnew/404.php");
        }
}
}

?>
