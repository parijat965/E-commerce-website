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

      

      <section class="myorders">
        <div class="headbanner">
          <div class="userimage">
            <img src="assets/images/img-5.jpg" alt="" />
          </div>
          <h4>Jhon Doe</h4>
          <p>
            +91 1245789630
            <a href="#"><i class="uil uil-edit"></i></a>
          </p>
          <div class="earn-points">
            <img src="assets/images/Dollar.svg" alt="" />Ballance :
            <span>&#8377;20</span>
          </div>
        </div>



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