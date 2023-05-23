<?php
require_once "models/product.php";
require_once "models/Category.php";
?>
<?php
$categories = Category::findAll();
$search = $_GET["search"] ?? "";
$pageIndex = $_GET["pageIndex"] ?? 0;
$category = $_GET['categoryId'] ?? null;
$pagination = Product::findAll($search, $pageIndex, 8, $category);
$data = $pagination->data;
$totalPage = $pagination->totalPage;


?>
<?php
require_once "./layout/header.php"
?>
<div class="hero-wrap hero-bread" style="background-image: url('assets/images/bg_1.jpg')">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="index.html">Home</a></span>
                    <span>Products</span>
                </p>
                <h1 class="mb-0 bread">Products</h1>
            </div>
        </div>
    </div>
</div>
<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
                <span>Get e-mail updates about our latest shops and special offers</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="" class="subscribe-form">
                    <div class="form-group d-flex">
                        <input type="text" name="search" class="form-control" placeholder="...search">
                        <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10 mb-5 text-center">
                <ul class="product-category">
                    <li><a href="/shop.php" class="<?= $category === null ? 'active' : '' ?>">All</a></li>
                    <?php foreach ($categories as $item) : ?>
                        <li>
                            <a href="?categoryId=<?= $item->id ?>" class="<?= $category == $item->id ? 'active' : '' ?>">
                                <?= $item->name ?>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
        <div class="row">
            <?php foreach ($data as $product) : ?>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="productDetails.php?slug=<?= $product->slug ?>" class="img-prod"><img class="img-fluid" src="files/<?= $product->image ?>" alt="Colorlib Template">
                            <span class="status"> <?= $product->discount . '%' ?></span>
                            <div class="overlay"></div>
                        </a>
                        <div class="text py-3 pb-4 px-3 text-center">
                            <h3><a href="#">
                                    <?= $product->title ?>
                                </a></h3>
                            <div class="d-flex">
                                <div class="pricing">
                                    <p class="price"><span class="mr-2 price-dc">
                                            $<?= $product->price ?>.00
                                        </span><span class="price-sale">
                                            $<?= $product->price - ($product->price * $product->discount) / 100 ?>.00
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
            <?php endforeach ?>
        </div>


        <div class="row mt-5">
            <div class="col text-center">
                <div class="block-27">
                    <ul>
                        <?php for ($i = 0; $i < $totalPage; $i++) : ?>
                            <li class="<?= $pageIndex == $i ? "active" : "" ?>"><a href="/shop.php?search=<?= $search ?>&pageIndex=<?= $i ?>"><?= $i + 1 ?></a></li>

                        <?php endfor ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once "./layout/footer.php"
?>