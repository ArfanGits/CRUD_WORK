<!doctype html>
<html lang="en">
<?php
include_once('../views/elements/head.php');

?>

<body>
<?php
include_once('../views/elements/header.php');
include_once('../views/elements/navbar.php');
?>
<!--Markup for Header-->

<style>
   .col-md-7 .rating_review {
    border-bottom: 1px #e5e5e5 solid;
    }
    .col-md-7 .price {
    border-bottom: 1px #e5e5e5 solid;
    }
</style>
<!--Markup for breadcrumb-->
<section id="breadcrumb" class="mt-3">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Grandpa Rocking Chair</li>
            </ol>
        </nav>
    </div>
</section>

<section id="wrapper" class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                    <!-- default start -->
                <section id="default" class="padding-top0">
                    <div class="xzoom-container">
                        <img class="xzoom" id="xzoom-default" src="img/product1_400X400.jpg" xoriginal="img/product1_700X850.jpg" />

                        <div class="xzoom-thumbs">
                            <a href="img/product1_700x850.jpg"><img class="xzoom-gallery" width="80" src="img/product1_700x850.jpg"  xpreview="img/product1_400x400.jpg" title="The description goes here"></a>
                            <a href="img/product2_700x850.jpg"><img class="xzoom-gallery" width="80" src="img/product2_700x850.jpg"  xpreview="img/product2_400x400.jpg" title="The description goes here"></a>
                            <a href="img/product12-700x850.jpg"><img class="xzoom-gallery" width="80" src="img/product12-700x850.jpg"  xpreview="img/product12-400x400.jpg" title="The description goes here"></a>
                            <a href="img/product6-700x850.jpg"><img class="xzoom-gallery" width="80" src="img/product6-700x850.jpg"  xpreview="img/product6-400x400.jpg" title="The description goes here"></a>

                        </div>
                    </div>
                </section>
                    <!-- default end -->
            </div>

            <div class="col-md-7">
                <div class="card">
                    <h3 class="fs-1">GRANDPA ROCKING CHAIR</h3>
                    <div class="rating_review">
                        <p class="card-text"><i class="fas fa-star  fa-xs"></i> <i class="fas fa-star fa-xs"></i> <i class="fas fa-star fa-xs"></i> <i class="fas fa-star fa-xs"></i> <i class="fas fa-star fa-xs"></i></p>
                        <p>0 Reviews | Write a review</p>
                    </div>
                    <div class="price">
                        <div class="row mt-3">
                            <div class="col-md-6">
                            <p class="fs-2">&dollar;100.00</p>
                            </div>
                            <div class="col-md-6 ">
                            <button type="button" class="btn btn-success">In Stock</button>
                            </div>
                        </div>
                    


                    </div>
                    <div class="details">
                        <p>Brand : Apple</p>
                        <p>Product Code : Product 2022</p>
                        <p>Rewarrd Points : 60</p>
                    </div>
                    
            
            </div>
        </div>
    </div>
</section>










<?php

include_once('../views/elements/script.php');
include_once('../views/elements/footer.php');
?>
</body>
</html>