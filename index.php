<?php
require "models/product.php"
?>
<?php
$data = Product::findAll()->data;
$data = array_slice($data, 0, 8);
?>
<?php
require "./layout/header.php"
?>


<section id="home-section" class="hero">
    <div class="home-slider owl-carousel">
        <div class="slider-item" style="background-image: url(./assets/images/bg_4.png);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-md-12 ftco-animate text-center">
                        <h1 class="mb-2">Provide the best quality products
                        </h1>
                        <h2 class="subheading mb-4">We always provide character models
                        </h2>
                        <p><a href="./shop.php" class="btn btn-danger">See details
                            </a></p>
                    </div>

                </div>
            </div>
        </div>
        <div class="slider-item" style="background-image: url(./assets/images/bg_5.png);">
            <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center" data-scrollax-parent="true">

                    <div class="col-sm-12 ftco-animate text-center">
                        <h1 class="mb-2">100% Genuine
                        </h1>
                        <h2 class="subheading mb-4">We always bring genuine models
                        </h2>
                        <p><a href="./shop.php" class="btn btn-danger">see details</a></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row no-gutters ftco-services">
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-1 active d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-shipped"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Free ship
                        </h3>
                        <span>For Orders Over $300
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-2 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-box"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Pack</h3>
                        <span>Best product packaging
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-3 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-award"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">High Quality
                        </h3>
                        <span>Product quality
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-md-3 text-center d-flex align-self-stretch ftco-animate">
                <div class="media block-6 services mb-md-0 mb-4">
                    <div class="icon bg-color-4 d-flex justify-content-center align-items-center mb-2">
                        <span class="flaticon-customer-service"></span>
                    </div>
                    <div class="media-body">
                        <h3 class="heading">Support</h3>
                        <span>24/7 customer support
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-category ftco-no-pt">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6 order-md-last align-items-stretch d-flex">
                        <div class="category-wrap-2 ftco-animate img align-self-stretch d-flex" style="background-image: url(assets/images/category_4.png);">
                            <div class="text text-center">
                                <h2>Figure Store</h2>
                                <p>We always bring the best quality products
                                </p>
                                <p><a href="#" class="btn btn-danger">Shop now</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(assets/images/category_1.png);">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="#">Levents</a></h2>
                            </div>
                        </div>
                        <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(assets/images/category_2.png);">
                            <div class="text px-3 py-1">
                                <h2 class="mb-0"><a href="#">Owen</a></h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="category-wrap ftco-animate img mb-4 d-flex align-items-end" style="background-image: url(assets/images/category_3.png);">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="#">Adidas</a></h2>
                    </div>
                </div>
                <div class="category-wrap ftco-animate img d-flex align-items-end" style="background-image: url(assets/images/category_5.png);">
                    <div class="text px-3 py-1">
                        <h2 class="mb-0"><a href="#">Puma</a></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Products</span>
                <h2 class="mb-4">Our products
                </h2>
                <p>We always bring the best products, prices are suitable for students and have promotional policies.
                </p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">

            <?php foreach ($data as $product) : ?>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="productDetails.php?slug=<?= $product->slug ?>" class="img-prod"><img class="img-fluid" src="files/<?= $product->image ?>" alt="Colorlib Template">
                            <span class="status">
                                <?= $product->discount . '%' ?>
                            </span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#">
                                    <?= $product->title ?>
                                </a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="mr-2 price-dc">
                                            $
                                            <?= $product->price ?>.00
                                        </span><span class="price-sale">
                                            $
                                            <?= $product->price - ($product->price * $product->discount) / 100 ?>.00
                                        </span></p>
                                </div>
                            </div>
                            <div class="bottom-area d-flex px-3">
                                <div class="m-auto d-flex">
                                    <a href="productDetails.php?slug=<?= $product->slug ?>" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                                        <span><i class="ion-ios-menu"></i></span>
                                    </a>
                                    <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                                        <span><i class="ion-ios-cart"></i></span>
                                    </a>
                                    <a href="#" class="heart d-flex justify-content-center align-items-center ">
                                        <span><i class="ion-ios-heart"></i></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<?php
require "./layout/footer.php"
?>