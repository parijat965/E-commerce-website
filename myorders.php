<?php
require('require/head.php');

if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] == "YES") {
  $user_id = $_SESSION['USER_ID'];
  if ($user_id > 0) {
    $order_sql = "select * from orders where u_id='$user_id' order by id desc";
    $ores = mysqli_query($con, $order_sql);


    $otail_arr = array();
    while ($orow = mysqli_fetch_assoc($ores)) {
      $otail_arr[] = $orow;
    }
?>


    <div class="path">
      <div class="container">
        <a href="index.php">Home</a>

      </div>
    </div>



    <section class="myorders">
      <div class="headbanner">
        <div class="userimage">
          <img src="assets/images/img-5.jpg" alt="" />
        </div>
        <h4>Jhon Doe</h4>
        <p>
          +91 85207410
          <a href="#"><i class="uil uil-edit"></i></a>
        </p>
        <div class="earn-points">
          <img src="assets/images/Dollar.svg" alt="" />Ballance :
          <span>&#8377;20</span>
        </div>
      </div>
      <section class="myac-body">
        <div class="flex row">
          <div class="left">
            <div class="ul-wrapper">
              <ul>

                <li class="active">
                  <i class="uil uil-box"></i>
                  <a href="">My Orders</a>
                </li>

                <li>
                  <i class="uil uil-heart"></i>
                  <a href="">My Wishlist</a>
                </li>

                <li>
                  <i class="uil uil-sign-out-alt"></i>
                  <a href="logout.php">Logout</a>
                </li>
              </ul>
            </div>
          </div>
          <div class="right">
            <h4><i class="uil uil-box"></i>My Orders</h4>
            <div class="col-lg-12 col-md-12">
              <?php
              foreach ($otail_arr as $list) {
                $oid = $list['id'];
                $detail_sql = "select * from order_detail where order_id='$oid'";
                $dres = mysqli_query($con, $detail_sql);
                $detail_arr = array();
                while ($drow = mysqli_fetch_assoc($dres)) {
                  $detail_arr[] = $drow;
                }

                foreach ($detail_arr as $lists) {
                  $pro_ductid = $lists['product_id'];
                  $product_sql = "select * from product where id='$pro_ductid'";
                  $pres = mysqli_query($con, $product_sql);
                  $prow = mysqli_fetch_assoc($pres);
              ?>
                  <div class="pdpt-bg">
                    <div class="order-body10">
                      <ul class="order-dtsll">
                        <li>
                          <div class="order-dt-img">
                            <img src="product/<?php echo $prow['image'] ?>" alt="" />
                          </div>
                        </li>
                        <li>
                          <div class="order-dt47">
                            <h4><?php echo $prow['name'] ?></h4>

                            <div class="order-title"><?php echo $prow['qty']; ?></div>
                          </div>
                        </li>
                      </ul>
                      <div class="total-dt">
                        <div class="total-checkout-group">
                          <div class="cart-total-dil">
                            <h4>Sub Total</h4>
                            <span><?php echo $prow['price'] ?></span>
                          </div>
                          <div class="cart-total-dil pt-3">
                            <h4>Delivery Charges</h4>
                            <span>Free</span>
                          </div>
                        </div>
                        <div class="main-total-cart">
                          <h2>Total</h2>
                          <span><?php echo $prow['price'] * $prow['qty'] ?></span>
                        </div>
                      </div>
                      <div class="call-bill">

                        <div class="order-bill-slip">
                          <a href="#" class="bill-btn5 hover-btn">Cancel</a>

                        </div>
                      </div>
                    </div>
                  </div>
              <?php  }
              } ?>
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
}
?>