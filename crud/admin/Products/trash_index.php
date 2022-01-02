<?php

include_once($_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/config.php");

use Bitm\Product;

$_product = new Product();

$products = $_product->trash_index();

//var_dump($products);

/*echo "<pre>";
print_r($products);
echo "</pre>";*/

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>All Trashed Items</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="fs-3 text-success">
                    <?php
                    echo $_SESSION['message'];
                    $_SESSION['message'] = "";
                    ?>
                </div>
                <h1 class="text-center mb-4">All Trashed Items</h1>
                <ul class="nav justify-content-center fs-3">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">List Items</a>
                    </li>
                </ul>
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Title</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if (count($products) > 0):
                    foreach ($products as $product):
                    ?>


                    <tr>
                        <!-- php echo = '=' same work-->
                        <td><?= $product['title']?></td>
                        <td><?= $product['is_active'] ? 'Activated' : 'Deactivated'?></td>
                        <td><a href="delete.php?id=<?=$product['id'];?>"
                            onclick="return confirm('Are you sure you want to delete?')">
                                Delete
                            </a>
                            |
                            <a href="restore.php?id=<?=$product['id'];?>"
                               onclick="return confirm('Are you sure you want to restore?')">
                                Restore
                            </a>
                        </td>
                    </tr>
                    <?php
                    endforeach;
                    else:
                    ?>
                    <tr>
                        <td colspan="2">No Product is available.</td>
                    </tr>
                    <?php
                    endif;
                    ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>