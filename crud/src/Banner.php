<?php

namespace Bitm;

use PDO;

class Banner{

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

        $query = "SELECT * FROM `banner`";

        $stmt = $this->conn->prepare($query);

        $result = $stmt->execute();

        $banners = $stmt->fetchAll();

        return $banners;
    }

    public function show($id){

        $query = "SELECT * FROM `banner` WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();

        $banner = $stmt->fetch();

        return $banner;
    }

    public function store($data){

        $_picture = $this->upload();

        $_title = $data['title'];

        if (array_key_exists('is_active', $data)) {
            $_is_active = $data['is_active'];
        } else {
            $_is_active = 0;
        }

        if (array_key_exists('is_draft', $data)) {
            $_is_draft = $data['is_draft'];
        } else {
            $_is_draft = 0;
        }

        $_created_at = date('Y-m-d h:i:s',time());

        $_link = $data['link'];
        $_promotional_message = $data['promotional_message'];
        $_html_banner = $data['html_banner'];

        
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

        $stmt = $this->conn->prepare($query);

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

        return $result;
    }

    public function delete($id){

        $query = "DELETE FROM `banner` WHERE `banner`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();

        //var_dump($result);

        if ($result){
            $_SESSION['message'] = "Banner is deleted successfully";
        }else{
            $_SESSION['message'] = "Banner is not deleted";
        }

        // this is for the location set to store.php to main home page index.php
        header("location:index.php");

        return $result;
    }

    public function edit($id){
        
        $query = "SELECT * FROM `banner` WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':id', $id);

        $result = $stmt->execute();

        $banner = $stmt->fetch();

        return $banner;
    }

    public function update($data){
    
        $_picture = $this->upload();

        $_id = $data['id'];
        $_title = $data['title'];

        if (array_key_exists('is_active', $data)) {
            $_is_active = $data['is_active'];
        } else {
            $_is_active = 0;
        }

        if (array_key_exists('is_draft', $data)) {
            $_is_draft = $data['is_draft'];
        } else {
            $_is_draft = 0;
        }

        $_link = $data['link'];
        $_promotional_message = $data['promotional_message'];
        $_html_banner = $data['html_banner'];
        //echo $_title;

        $_modified_at = date('Y-m-d h:i:s',time());

        $query = "UPDATE `banner` SET `title` = :title, 
                                    `is_active` = :is_active, 
                                    `is_draft` = :is_draft, 
                                    `link` = :link, 
                                    `promotional_message` = :promotional_message,
                                    `html_banner` = :html_banner,
                                    `picture` = :picture,
                                    `modified_at` = :modified_at 
                WHERE `banner`.`id` = :id";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(':title', $_title);
        $stmt->bindParam(':is_active', $_is_active);
        $stmt->bindParam(':is_draft', $_is_draft);
        $stmt->bindParam(':id', $_id);
        $stmt->bindParam(':link', $_link);
        $stmt->bindParam(':promotional_message', $_promotional_message);
        $stmt->bindParam(':html_banner', $_html_banner);
        $stmt->bindParam(':picture', $_picture);
        $stmt->bindParam(':modified_at', $_modified_at);

        $result = $stmt->execute();

        //var_dump($result);

        if ($result){
            $_SESSION['message'] = "Banner is updated successfully";
        }else{
            $_SESSION['message'] = "Banner is not updated";
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
