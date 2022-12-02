<?php
require('require/head.php');
$catg_id = get_safe_value($con, $_GET['id']);
if ($catg_id > 0) {
    $get_product = get_product_by_category($con, $catg_id);
} else {
?>
    <script>
        window.location.href = "index.php";
    </script>
<?php
}
?>
<div class="path">
    <div class="container">
        <a href="index.php">Home</a>
    </div>
</div>


<section class="view-product">
    <div class="row">
        <section class="search">
            <div class="searchrow">

                <div class="right">
                    <div class="sortby">
                        <h4></h4>
                        &nbsp;
                    </div>
                    <div class="outerbox">

                        <?php
                        if (count($get_product) > 0) {
                            foreach ($get_product as $list) {

                        ?>

                                <div class="item">

                                    <div class="productBox">
                                        <a href="product.php?id=<?php echo $list['id']; ?>" class="product-image">
                                            <img src="product/<?php echo $list['image']; ?>">
                                            <div class="topOption">
                                                <span class="offer">10% off</span>
                                                <span class="wishlist">
                                                    <i class="uil uil-heart"></i>
                                                </span>
                                            </div>
                                        </a>
                                        <div class="product-detail">
                                            <p>Available (In Stock)</p>
                                            <h4>Product Tittle</h4>
                                            <div class="price">&#8377;<?php echo $list['price'];    ?> <span>&#8377;<?php echo $list['mrp'];    ?></span></div>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } else {
                            echo " <h1 style='color:white;'> No product found in this category.</h1>";
                        } ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</section>
<?php
require('require/foot.php');
?>