<?php
require('require/head.php');   //fro header file 
$allCategories = getCategories($con); //varibales for all fucntions
$allBanners = getAllBanners($con);
$allproducts = get_product($con);

//prx($allCategories); // test all variables working or not
 
//pre($allBanners);
?>


<div class="main-banner-slider">
    <div class="container">
        <div class="row">
            <div class="owl-carousel owl-theme main-slider">

                <?php
                foreach ($allBanners as $bnnr) {
                    //  pre($category);                //iterate all elements in the allBanner array
                ?>
                    <div class="item">
                        <img src="product/<?php echo $bnnr['image'] ?>" alt="banner" />
                        <!--print all image of array only image in banner so imag will be printed-->
                        <div class="detail">
                            <h5>25% off</h5>
                            <h5>Get it now</h5>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</div>

<!-- category shopping -->

<section class="defaultPadding mt4">
    <div class="container mrlAuto">
        <div class="heading">
            <span>Shop By</span>
            <h2>Categories</h2>
        </div>
        <div class="row mt3 ct-row">
            <div class="owl-carousel owl-theme cate-slider">

                <?php
                foreach ($allCategories as $category) {      //iterate all elements in the allcategory array
                    //  pre($category);
                ?>
                    <div class="item">
                        <a class="category-Item" href="./categoryproduct.php?id=<?php echo $category['id'];  ?>">
                            <div class="cate-img">
                                <img src="assets/images/svg/category-management-svgrepo-com.svg" alt="" />
                            </div>
                            <h4><?php echo $category['categories'] ?></h4>
                            <!--print category names of array -->
                        </a>
                    </div>
                <?php } ?>

            </div>
        </div>
    </div>
</section>
<!-- on page cart -->
<section class="defaultPadding mt4">
    <div class="container mrlAuto">
        <div class="heading">
            <span>For You</span>
            <h2>Top Featured Products</h2>
        </div>
        <div class="row mt3 ct-row">
            <div class="owl-carousel owl-theme product-slider">

                <?php
                foreach ($allproducts as $product) {    //iterate all elements in the allproduct array
                ?>


                    <div class="item">
                        <div class="productBox">
                            <a href="product.php?id=<?php echo $product['id'];?>" class="product-image">
                                <img src="product/<?php echo $product['image'] ?>" alt="product" />
                                <!--get the names of image from DB  and print products-->
                                <div class="topOption">
                                    <span class="offer"><?php
                                     $off=round(100 - ($product['price']*100)/$product['mrp'],0);
                                     echo $off;
                                    ?>% off</span>
                                    <span class="wishlist">
                                        <i class="uil uil-heart"></i>
                                    </span>
                                </div>
                            </a>
                            <div class="product-detail">
                                <?php
                                if ($product['qty'] != 0) {
                                ?>
                                    <p>Available (In Stock)</p>
                                <?php
                                } else {
                                ?>
                                    <p>Unavailable (Out of Stock)</p>
                                <?php
                                }
                                ?>
                                <h4> <?php echo $product['name'] ?>
                                    <!--print product name of array -->
                                </h4>
                                <div class="price">&#8377;<?php echo $product['price'] ?> <span>&#8377;<?php echo $product['mrp'] ?></span></div>
                                <div class="cartqt">
                                    <div class="ct-icon">
                                        <i class="uil uil-shopping-cart-alt"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- brand offer section -->
<section class="defaultPadding mt4">
    <div class="container mrlAuto">
        <div class="heading">
            <span>Top brands on offer</span>
            <h2>Best Values</h2>
        </div>
        <div class="row mt3 ct-row banner-row">
            <div class="row1">
                <div class="ban">
                    <a href="#">
                        <img src="assets/images/banner/women.jpg" alt="banner1" />
                    </a>
                </div>
                <div class="ban">
                    <a href="#">
                        <img src="assets/images/banner/Levi.jpg" alt="banner1" />
                    </a>
                </div>
                <div class="ban">
                    <a href="#">
                        <img src="assets/images/banner/watch.jpg" alt="banner1" />
                    </a>
                </div>
            </div>
            <div class="row1">
                <a href="#" class="long-banner">
                    <img src="assets/images/banner/Citi-scroll.jpg" alt="banner1" />
                </a>
            </div>
        </div>
    </div>
</section>
<script src="assets/js/owl.carousel.min.js"></script>
<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel();
    });
    var owl = $(".main-slider");
    owl.owlCarousel({
        items: 4,
        loop: true,
        responsive: {
            0: {
                items: 1,
            },
            600: {
                items: 2,
            },
            1000: {
                items: 3,
            },
            1200: {
                items: 4,
            },
            1400: {
                items: 4,
            },
        },
        margin: 10,
        autoplay: true,
        autoplayTimeout: 2500,
        autoplayHoverPause: true,
        dots: false,
        autoHeight:false,
    });

    $(".cate-slider").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        navText: [
            "<i class='uil uil-angle-left'></i>",
            "<i class='uil uil-angle-right'></i>",
        ],
        responsive: {
            0: {
                items: 2,
            },
            375: {
                items: 2,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 4,
            },
            1200: {
                items: 6,
            },
            1400: {
                items: 6,
            },
        },
    });

    $(".product-slider").owlCarousel({
        loop: true,
        margin: 30,
        nav: true,
        dots: false,
        navText: [
            "<i class='uil uil-angle-left'></i>",
            "<i class='uil uil-angle-right'></i>",
        ],
        responsive: {
            0: {
                items: 1,
            },
            610: {
                items: 2,
            },
            600: {
                items: 3,
            },
            1000: {
                items: 4,
            },
        },
    });
</script>
<?php
require('require/foot.php');
?>