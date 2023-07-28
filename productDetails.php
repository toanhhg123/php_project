<?php
try {
    require_once("models/product.php");
    require_once __DIR__ . "/utils/authorize.php";
    require_once __DIR__ . "/models/Cart.php";
} catch (\Throwable $th) {
    var_dump($th->getMessage());
}

?>
<?php
try {
    $slug = $_GET['slug'] ?? false;
    if (!$slug)
        header('Location: page404.php?message=not found product');
    $data = Product::findBySlug($slug);
    if (!$data)
        header('Location: page404.php?message=not found product');

    $listProduct = [];
    if ($data) {
        $listProduct = array_filter(Product::findAll()->data, function ($product) use ($data) {
            return $product->id != $data->id;
        });
        $listProduct = array_slice($listProduct, 0, 4);
    }
} catch (\Throwable $th) {
    var_dump($th->getMessage());
}
?>

<?php
try {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        authorize();
        $qty = $_POST['qty'] ?? 1;
        Cart::addToCart($data->id, $qty);
        header("Location: cart.php");
    }
} catch (\Throwable $th) {
    var_dump($th->getMessage());
}
?>

<?php
require "./layout/header.php"
?>

<div class="hero-wrap hero-bread" style="background-image: url('assets/images/bg_1.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span> <span class="mr-2"><a href="index.php">Product</a></span> <span>Product Single</span></p>
                <h1 class="mb-0 bread">Product Single</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 ftco-animate">
                <a href="/files/<?= $data->image ?>" class="image-popup"><img src="files/<?= $data->image ?>" class="img-fluid" alt="Colorlib Template"></a>
            </div>
            <form method="post" class="col-lg-6 product-details pl-md-5 ftco-animate">
                <h3><?= $data->title ?></h3>
                <div class="rating d-flex">
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2">5.0</a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                        <a href="#"><span class="ion-ios-star-outline"></span></a>
                    </p>
                    <p class="text-left mr-4">
                        <a href="#" class="mr-2" style="color: #000;"><?= rand(10, 1000) ?> <span style="color: #bbb;">Rating</span></a>
                    </p>
                    <p class="text-left">
                        <a href="#" class="mr-2" style="color: #000;"><?= $data->quantity ?> <span style="color: #bbb;">Sold</span></a>
                    </p>
                </div>
                <p class="price"><span><?= '$' . $data->price . '.00' ?></span></p>
                <p><?= $data->content ?></p>
                <div class="row mt-4">
                    <div class="col-md-6">
                        <div class="form-group d-flex">
                            <div class="select-wrap">
                                <div class="icon"><span class="ion-ios-arrow-down"></span></div>
                                <select name="size" id="" class="form-control">
                                    <option value="">Small</option>
                                    <option value="">Medium</option>
                                    <option value="">Large</option>
                                    <option value="">Extra Large</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="w-100"></div>
                    <div class="input-group col-md-6 d-flex mb-3">
                        <span class="input-group-btn mr-2">
                            <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="quantity">
                                <i class="ion-ios-remove"></i>
                            </button>
                        </span>
                        <input type="text" id="quantity" name="qty" class="form-control input-number" value="1" min="1" max="100">
                        <span class="input-group-btn ml-2">
                            <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="quantity">
                                <i class="ion-ios-add"></i>
                            </button>
                        </span>
                    </div>
                    <div class="w-100"></div>
                    <div class="col-md-12">
                        <p style="color: #000;">600 kg available</p>
                    </div>
                </div>
                <p>
                    <button type="submit" class="btn">Add To Cart</button>
                </p>
            </form>
        </div>
    </div>
</section>

<section class="ftco-section">
    <div class="container">
        <div class="row justify-content-center mb-3 pb-3">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Sản phẩm</span>
                <h2 class="mb-4">Sản phẩm tương tự</h2>
                <p>Những sản phẩm tương tự</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <?php foreach ($listProduct as $product) : ?>
                <div class="col-md-6 col-lg-3 ftco-animate">
                    <div class="product">
                        <a href="productDetails.php?slug=<?= $product->slug ?>" class="img-prod">
                            <img class="img-fluid" src="files/<?= $product->image ?>" alt="Colorlib Template">
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
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">Sign up to receive our latest notifications
                </h2>
                <span>Enter your email and you will receive our notifications and special offers
                </span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                        <input type="text" class="form-control" placeholder="Nhập email">
                        <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>



<?php
require "./layout/footer.php"
?>