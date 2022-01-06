<?php

include_once($_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/config.php");

use Bitm\User;

$_id = $_GET['id'];
$_user = new User();

$user = $_user->edit($_id);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Edit Users</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
            <div class="fs-4 text-danger">
                    <?php
                    echo $_SESSION['message'];
                    $_SESSION['message'] = "";
                    ?>
                </div>
                <h1 class="text-center mb-4">Edit Users</h1>
                <form method="post" action="update.php" enctype="multipart/form-data">
                <div class="mb-3 row">
                        <label for="inputId" class="col-md-3 col-form-label"></label>
                         <div class="col-md-9">
                             <input
                                type="hidden"
                                class="form-control"
                                id="inputId"
                                name="id"
                                value="<?=$user['id']?>"
                             >
                         </div>
                     </div>
                     <div class="mb-3 row">
                        <label for="inputFullName" class="col-md-3 col-form-label">Full Name:</label>
                         <div class="col-md-9">
                             <input
                                type="text"
                                class="form-control"
                                id="inputFullName"
                                name="full_name"
                                value="<?=$user['full_name']?>"
                             >
                         </div>
                     </div>
                     <div class="mb-3 row">
                        <label for="inputUserName" class="col-md-3 col-form-label">User Name:</label>
                         <div class="col-md-9">
                             <input
                                type="text"
                                class="form-control"
                                id="inputUserName"
                                name="user_name"
                                value="<?=$user['user_name']?>"
                             >
                         </div>
                     </div>
                     <div class="mb-3 row">
                        <label for="inputEmail" class="col-md-3 col-form-label">Email:</label>
                         <div class="col-md-9">
                             <input
                                type="email"
                                class="form-control"
                                id="inputEmail"
                                name="email"
                                value="<?=$user['email']?>"
                             >
                         </div>
                     </div>
                     <div class="mb-3 row">
                         <label for="inputPassword" class="col-md-3 col-form-label">Password:</label>
                         <div class="col-md-9">
                             <input
                                     type="password"
                                     class="form-control"
                                     id="inputPassword"
                                     name="password"
                                     value="<?=$user['password']?>"
                             >
                         </div>
                     </div>
                     <div class="mb-3 row">
                        <label for="inputFile" class="col-md-3 col-form-label">Picture:</label>
                        <div class="col-md-9">
                            <input
                                    type="file"
                                    class="form-control"
                                    id="inputFile"
                                    name="picture"
                                    value="<?=$user['picture'];?>"
                            >
                        </div>
                        <img src="<?=$webroot;?>uploads/<?=$user['picture'];                       ?>">
                        <input type="hidden" name="old_picture"
                               value="<?=$user['picture'];?>">
                    </div>
                     <div class="mb-3 row">
                         <label for="inputPhoneNumber" class="col-md-3 col-form-label">Phone Number:</label>
                         <div class="col-md-9">
                             <input
                                     type="text"
                                     class="form-control"
                                     id="inputPhoneNumber"
                                     name="phone_number"
                                     value="<?=$user['phone_number']?>"
                             >
                         </div>
                     </div>
                     <div class="mb-3 row form-check">
                         <div class="col-md-9">
                             <input type="checkbox" class="form-check-input" id="inputIsDeleted" name="is_deleted" value="0">
                         </div>
                         <label for="inputIsDeleted" class="col-md-3  form-check-label">
                             Is Deleted:
                         </label>
                     </div>
                    <div class="mb-3 row">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary mb-3">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>

