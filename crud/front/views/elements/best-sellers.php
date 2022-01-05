<?php

use Bitm\Product;

$_product = new Product();

$products = $_product->getActiveProducts();

// var_dump($products);
?>
<!--Markup for BEST SELLERS-->
<section id="best-sellers" class="mt-2">
    <div class="container">
        <div class="d-flex justify-content-between best-seller">
            <h1>BEST <span>SELLERS</span></h1>
            <div>
                <button type="button" class="btn btn-light"><i class="fas fa-angle-left"></i></button>
                <button type="button" class="btn btn-light"><i class="fas fa-angle-right"></i></button>
            </div>
        </div>

        <div class="row row-cols-1 row-cols-md-4 g-4 text-center">
             <?php
                    $_active = 'active';
                    foreach($products as $product):
                ?>
            <div class="col <?=$_active;?>">
                <div class="card">
                    <a href="product-detail.php"><img src="<?=$webroot;?>uploads/<?=$product['picture']?>" class="card-img-top" alt="BEST SELLERS Image" title="Grandpa Rocking Chair"></a>
                    <div class="card-body">
                        <h5 style="text-transform: uppercase;" class="card-title" title="Grandpa Rocking Chair"> <a href="product-detail.php"><?=$product['title'];?></a></h5>
                        <p class="card-text"><i class="fas fa-star  fa-xs"></i> <i class="fas fa-star fa-xs"></i> <i class="fas fa-star fa-xs"></i> <i class="fas fa-star fa-xs"></i> <i class="fas fa-star fa-xs"></i></p>
                        <p>৳<?=$product['price']?></p>
                        <p><button type="button" class="btn btn-danger">Add to cart</button></p>
                    </div>
                </div>
            </div>
            <?php
                $_active = '';
                endforeach;
            ?>
        </div>
    </div>
</section>