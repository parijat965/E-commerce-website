<?php
require('require/head.php');

if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] == "YES") {
    $u_id = $_SESSION['USER_ID'];
    $sql = "select product.*,users_cart.p_id,users_cart.qty from product,users_cart where users_cart.use_id='$u_id' && product.id=users_cart.p_id";
    $res = mysqli_query($con, $sql);

    $sqli = "select * from users_cart where use_id='$u_id'";
    $ress = mysqli_query($con, $sqli);
    $roww = mysqli_fetch_assoc($ress);


    $cart_arr = array();
    while ($row = mysqli_fetch_assoc($res)) {
        $cart_arr[] = $row;
    }

?>



    <div class="path">
        <div class="container">
            <a href="index.html">Home</a>
            /
            <a href="index.html">My Orders</a>
        </div>
    </div>

    <section class="cart">
        <section class="myac-body">
            <div class="flex row">
                <div class="right">
                    <div class="col-lg-12 col-md-12">
                        <div class="pdpt-bg">
                            <div class="pdpt-title flex justify-between">
                                <h4>
                                    <i class="uil uil-shopping-cart-alt"></i> &nbsp;My Cart
                                </h4>
                            </div>
                            <div class="order-body10">
                                <table>
                                    <thead>
                                        <th>
                                            <h5>Product</h5>
                                        </th>
                                        <th>
                                            <h5>Price</h5>
                                        </th>
                                        <th>
                                            <h5>Quantity</h5>
                                        </th>
                                        <th>
                                            <h5>Subtotal</h5>
                                        </th>
                                        <th>
                                            <h5>Action</h5>
                                        </th>
                                    </thead>
                                    <tbody>
                                        <?php

                                        foreach ($cart_arr as $product) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <div class="product">
                                                        <a href="">
                                                            <img src="product/<?php echo $product['image'] ?>" alt="" />
                                                        </a>
                                                        <h6><?php echo $product['name'] ?></h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="price">
                                                        <h6>&#8377; <?php echo $product['price']; ?></h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="qty">
                                                        <div class="box">
                                                            <?php echo $product['qty']; ?>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="price">
                                                        <h6>&#8377;<?php echo $product['price'] * $product['qty'] ?></h6>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="price">
                                                        <h6>
                                                            <i class="uil uil-refresh" onclick="Upmart(<?php echo $_SESSION['USER_ID'];?>,<?php echo $product['id']; ?>)"></i>
                                                            <i class="uil uil-trash-alt"  onclick="Delmart(<?php echo 	$_SESSION['USER_ID'];	?>,<?php echo $product['id']; ?>)"></i>
                                                        </h6>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="left">
                    <div class="ul-wrapper">

                        <div class="cktout">
                            <a href="checkout.php"><button>Proceed To Checkout</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>

<?php
    require('require/foot.php');
} else {
?>
    <script>
        alert('Login to Access Cart.');
        window.location.href = "login.php";
    </script>
<?php
}
?>