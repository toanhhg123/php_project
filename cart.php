<?php
require_once "layout/header.php";
require_once "models/CartSession.php";
?>

<?php
$carts = CartSession::findAll();
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
                                        <a href="#"><span class="ion-ios-close"></span></a>
                                    </td>

                                    <td class="image-prod">
                                        <div class="img" style="background-image: url(assets/images/<?= $cart->product->image ?>)"></div>
                                    </td>

                                    <td class="product-name">
                                        <h3><?= $cart->product->title ?></h3>
                                        <p>
                                            Far far away, behind the word mountains, far from the
                                            countries
                                        </p>
                                    </td>

                                    <td class="price"><?= '$' . $cart->product->price . '.00' ?></td>

                                    <td class="quantity">
                                        <div class="input-group mb-3">
                                            <input type="text" name="quantity" class="quantity form-control input-number" value="<?= $cart->qty ?>" min="1" max="100" />
                                        </div>
                                    </td>

                                    <td class="total"><?= '$' . $cart->product->price * $cart->qty . '.00' ?></td>
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
                    <h3>Coupon Code</h3>
                    <p>Enter your coupon code if you have one</p>
                    <form action="#" class="info">
                        <div class="form-group">
                            <label for="">Coupon code</label>
                            <input type="text" class="form-control text-left px-3" placeholder="" />
                        </div>
                    </form>
                </div>
                <p>
                    <a href="checkout.html" class="btn btn-primary py-3 px-4">Apply Coupon</a>
                </p>
            </div>
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Estimate shipping and tax</h3>
                    <p>Enter your destination to get a shipping estimate</p>
                    <form action="#" class="info">
                        <div class="form-group">
                            <label for="">Country</label>
                            <input type="text" class="form-control text-left px-3" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label for="country">State/Province</label>
                            <input type="text" class="form-control text-left px-3" placeholder="" />
                        </div>
                        <div class="form-group">
                            <label for="country">Zip/Postal Code</label>
                            <input type="text" class="form-control text-left px-3" placeholder="" />
                        </div>
                    </form>
                </div>
                <p>
                    <a href="checkout.html" class="btn btn-primary py-3 px-4">Estimate</a>
                </p>
            </div>
            <div class="col-lg-4 mt-5 cart-wrap ftco-animate">
                <div class="cart-total mb-3">
                    <h3>Cart Totals</h3>
                    <p class="d-flex">
                        <span>Subtotal</span>
                        <span>$20.60</span>
                    </p>
                    <p class="d-flex">
                        <span>Delivery</span>
                        <span>$0.00</span>
                    </p>
                    <p class="d-flex">
                        <span>Discount</span>
                        <span>$3.00</span>
                    </p>
                    <hr />
                    <p class="d-flex total-price">
                        <span>Total</span>
                        <span>$17.60</span>
                    </p>
                </div>
                <p>
                    <a href="checkout.html" class="btn btn-primary py-3 px-4">Proceed to Checkout</a>
                </p>
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