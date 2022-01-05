<?php

include_once($_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/config.php");

use Bitm\Product;

$_product = new Product();

$product = $_product->show();

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Show</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h1 class="text-center mb-4">Show</h1>
                <dl class="row">
                    <dt class="col-md-2">ID:</dt>
                    <dd class="col-md-10"><?= $product['id'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">Title:</dt>
                    <dd class="col-md-10"><?= $product['title'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Is Active</dt>
                    <dd class="col-md-9">
                        <?php
                        echo $product['is_active'] ? 'Activated' : 'Deactivated';
                        ?>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">Created AT:</dt>
                    <dd class="col-md-10"><?= $product['created_at'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">Modified AT:</dt>
                    <dd class="col-md-10"><?= $product['modified_at'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-3">Is Deleted:</dt>
                    <dd class="col-md-9">
                        <?php
                        echo $product['is_deleted'] ? 'Deleted' : 'Not deleted';
                        ?>
                    </dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">Picture:</dt>
                    <dd class="col-md-10">
                        <?= $product['picture'];?>
                        <img src="<?=$webroot;?>uploads/<?=$product['picture'];?>">
                    </dd>
                </dl>
                <dl class="row">
<!--                    <dt class="col-md-2">Go to:</dt>-->
                    <dd class="col-md-9">
                        Go to <a href="index.php">List Items</a>
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
