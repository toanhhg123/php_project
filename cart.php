<?php
require_once "models/AuthSeesion.php";
require_once "models/Cart.php";
require_once "utils/authorize.php";
require_once "models/User.php";

?>
<?php
authorize();
$carts = Cart::findAll(0);
$auth = AuthSession::getInfoAuthecation();
$user = User::findById($auth->user_id);


$totalPrice = array_reduce($carts, function ($result, $item) {
    return $result + ($item->price * $item->qty);
});

$totalDisCount = array_reduce($carts, function ($result, Cart $item) {
    return $result + ($item->price * ($item->disCount / 100));
});


?>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["typeForm"] === "DeleteCart") {
    $id = $_POST["id"];
    Cart::remove($id);
    header("refresh: 0");
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["typeForm"] === "UpdateAddress") {
    $user->country = $_POST['country'] ?? $user->country;
    $user->province = $_POST['province'] ?? $user->province;
    $user->zip = $_POST['zip'] ?? $user->province;
    $user = User::Update($user);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["typeForm"] === "checkout") {
    $order =  Cart::updateOrder();
    header("refresh: 0");
}
?>

<?php
require_once "layout/header.php";
?>
<div class="hero-wrap hero-bread" style="background-image: url('assets/images/bg_1.jpg')">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs">
                    <span class="mr-2"><a href="index.html">Home</a></span>
                    <span>Cart</span>
                </p>
                <h1 class="mb-0 bread">My Cart</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">
    <div class="container">
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="cart-list">
                    <table class="table">
                        <thead class="thead-primary">
                            <tr class="text-center">
                                <th>&nbsp;</th>
                                <th>&nbsp;</th>
                                <th>Product name</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php foreach ($carts as $cart) : ?>

                                <tr class="text-center">
                                    <td class="product-remove">
                                        <form method="post">
                                            <input type="text" name="typeForm" value="DeleteCart" hidden>
                                            <input type="text" value="<?= $cart->id ?>" name="id" hidden>
                                            <button role="button" type="submit" class="btn px-2"><span class="ion-ios-close"></span></button>
                                        </form>
                                    </td>

                                    <td class="image-prod">
                                        <div class="img" style="background-image: url(files/<?= $cart->image ?>)"></div>
                                    </td>

                                    <td class="product-name">
                                        <h3><?= $cart->title ?></h3>
                                        <p>
                                            <?= $cart->metaTitle ?>
                                        </p>
                                    </td>

                                    <td class="price"><?= '$' . $cart->price . '.00' ?></td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="text" name="quantity" class="quantity form-control input-number" value="<?= $cart->qty ?>" min="1" max="100" />
                                        </div>
                                    </td>

                                    <td class="total"><?= '$' . $cart->price * $cart->qty . '.00' ?></td>
                                </tr>

                            <?php endforeach ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row justify-content-end">
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Check info my order</h3>
                    <p>Enter your coupon code if you have one</p>
                    <form action="#" class="info">
                        <div class="form-group">
                            <label for="">Go to Order</label>
                            <a href="order.php" class="btn btn-primary py-3 px-4">Go</a>
                        </div>
                    </form>
                </div>
                <p>
                </p>
            </div>
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Estimate shipping and tax</h3>
                    <p>Enter your destination to get a shipping estimate</p>
                    <form method="post" id="formAddress" class="info">
                        <input type="text" name="typeForm" value="UpdateAddress" hidden>

                        <div class="form-group">
                            <label for="">Country</label>
                            <input type="text" name="country" class="form-control text-left px-3" placeholder="" value="<?= $user->country ?>" />
                        </div>
                        <div class="form-group">
                            <label for="country">State/Province</label>
                            <input type="text" name="province" class="form-control text-left px-3" placeholder="" value="<?= $user->province ?>" />
                        </div>
                        <div class="form-group">
                            <label for="country">Zip/Postal Code</label>
                            <input type="text" name="zip" class="form-control text-left px-3" placeholder="" value="<?= $user->zip ?>" />
                        </div>
                        <p>
                            <button type="submit" class="btn btn-primary py-3 px-4">Save</button>
                        </p>
                    </form>
                </div>

            </div>
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span>$<?= $totalPrice ?></span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>$0.00</span>
                    </p>
                    <p class="d-flex">
                        <span>Discount</span>
                        <span>$<?= $totalDisCount ?></span>
                    </p>
                    <hr />
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>$<?= $totalPrice - $totalDisCount ?></span>
                    </p>
                </div>
                <form method="post">
                    <input type="text" name="typeForm" value="checkout" hidden>
                    <button type="submit" class="btn btn-primary py-3 px-4">Proceed to Checkout</button>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px" class="mb-0">
                    Subcribe to our Newsletter
                </h2>
                <span>Get e-mail updates about our latest shops and special
                    offers</span>
            </div>
            <div class="col-md-6 d-flex align-items-center">
                <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                        <input type="text" class="form-control" placeholder="Enter email address" />
                        <input type="submit" value="Subscribe" class="submit px-3" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<?php
require_once "layout/footer.php"
?>