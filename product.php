<?php
require('require/head.php');
$id = $_GET['id'];
$product = get_product_details($con, $id);
?>

<div class="path">
    <div class="container">
        <a href="index.php">Home</a>
        /
        <a href="index.php">category</a>

       
    </div>
</div>



<section class="single-product">
    <div class="row">
        <div class="container">
            <div class="innerrow">
                <div class="left">
                    <div class="mainImage">
                        <img src="product/<?php echo $product['image'] ?>" alt="" id="mi" />
                    </div>
                </div>
                <div class="right">
                    <h2 class="mt2"><?php echo $product['name'] ?></h2>
                    <div class="no-stock">
                        <p class="pd-no">Product No.<span>12345</span></p>
                        <p class="stock-qty">Available<span>(<?php echo $product['qty'] > 0 ? "In stock" : "Out of Stock" ?>)</span></p>
                    </div>
                    <p class="pp-descp">
                        <?php echo $product['short_desc'] ?>
                    </p>
                    <div class="product-group-dt">
                        <ul>
                            <li>
                                <div class="main-price color-discount">
                                    Discount Price<span>&#8377; <?php echo $product['price'] ?></span>
                                </div>
                            </li>
                            <li>
                                <div class="main-price mrp-price">
                                    MRP Price<span>&#8377;<?php echo $product['mrp'] ?></span>
                                </div>
                            </li>
                        </ul>

                        <ul class="ordr-crt-share">
                            <li>
                                <?php
                                if (isProductInCart($con, $id)) {
                                ?>
                                    <a href="cart.php">
                                        <button class="add-cart-btn hover-btn">
                                            <i class="uil uil-shopping-cart-alt"></i>Goto Cart
                                        </button>
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <button class="add-cart-btn hover-btn" onclick="myAjax(<?php echo $_SESSION['USER_ID'];?>,	<?php echo $id; ?>)">
                                        <i class="uil uil-shopping-cart-alt"></i>Add to Cart
                                    </button>
                                <?php
                                }
                                ?>
                            </li>
                            <li>
                                <button class="order-btn hover-btn">Add to Wishlist</button>
                            </li>
                        </ul>
                    </div>
                    <div class="down">
                        <ul class="flex">
                            <li>
                                <div class="pdp-group-dt">
                                    <div class="pdp-icon">
                                        <i class="uil uil-usd-circle"></i>
                                    </div>
                                    <div class="pdp-text-dt">
                                        <span>Lowest Price Guaranteed</span>
                                        <p>
                                            Get difference refunded if you find it cheaper
                                            anywhere else.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <div class="pdp-group-dt">
                                    <div class="pdp-icon">
                                        <i class="uil uil-cloud-redo"></i>
                                    </div>
                                    <div class="pdp-text-dt">
                                        <span>Easy Returns &amp; Refunds</span>
                                        <p>
                                            Return products at doorstep and get refund in seconds.
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="secondrow">
                <div class="innerrow">
                    <div class="alldesc">
                        <div class="container">
                            <div class="heading">
                                <h4>Product details</h4>
                            </div>
                            <div class="desc-body">
                                <div class="pdct-dts-1">
                                    <div class="pdct-dt-step">
                                        <h4>Description</h4>
                                        <p>
                                            <?php echo $product['description'] ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php
require('require/foot.php');
?>