<?php
require('require/head.php');
if (isset($_POST['submit'])) {
    $search_name = get_safe_value($con, $_POST['searchstr']);
}
$search_sql = "select * from product where status='1' and(name like '%$search_name%' or description like '%$search_name%')";
$search_res = mysqli_query($con, $search_sql);
$search_arr = array();
while ($search_row = mysqli_fetch_assoc($search_res)) {
    $search_arr[] = $search_row;
}

?>

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
                        if (count($search_arr) > 0) {
                            foreach ($search_arr as $list) {

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