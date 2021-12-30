<?php


$webroot = 'http://localhost/batch1-arfan/crud/';
$approot = $_SERVER['DOCUMENT_ROOT']."/batch1-arfan/crud/";
include_once ($approot. "vendor/autoload.php");

use Bitm\Cart;

$_cart = new Cart();

$cart = $_cart->show();

/*echo "<pre>";
print_r($product);
echo "</pre>";*/

?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Show Cart Item</title>
</head>
<body>
<section>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <h1 class="text-center mb-4">Show Cart Item</h1>

                <dl class="row">
                    <dt class="col-md-6">ID:</dt>
                    <dd class="col-md-6"><?= $cart['id'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-6">Product ID:</dt>
                    <dd class="col-md-6"><?= $cart['product_id'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-6">Prodcut Title:</dt>
                    <dd class="col-md-6"><?= $cart['product_title'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-6">Quantity:</dt>
                    <dd class="col-md-6"><?= $cart['qty'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-6">Unite Price:</dt>
                    <dd class="col-md-6"><?= $cart['unite_price'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-6">Total Price:</dt>
                    <dd class="col-md-6"><?= $cart['total_price'];?></dd>
                </dl>
                <dl class="row">
                    <dt class="col-md-2">Picture:</dt>
                    <dd class="col-md-10">
                        <?= $cart['picture'];?>
                        <img src="<?=$webroot;?>uploads/<?=$cart['picture'];?>">
                    </dd>
                </dl>
            </div>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

</body>
</html>
