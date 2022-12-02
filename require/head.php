<?php

require('util/connection.php');
require('util/function.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="assets/images/wrrrw.png" type="image/x-icon" />
  <title>Fission.com online shopping site</title>
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/sweetalert.js"></script>
  <link rel="stylesheet" href="assets/css/style.css" />
  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css" />
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />

</head>

<body>

  <!--navbar-->
  <header class="header">
    <div class="top-header">
      <div class="th">
        <div class="logo">
          <a href="index.php">
            <img src="assets/images/wrrrw.png" alt="logo" />
          </a>
        </div>
        <div class="name">
          Fission.<br />
          <span>com</span>
        </div>
        <div class="searchbox">
          <span>
            <i class="uil uil-create-dashboard" onclick="show_cat()"></i>
            <!-- searchbox icon -->
            <i class="uil uil-angle-down icon__14" onclick="show_cat()"></i>
          </span>

          <!--searc box is here-->
          <form action="search.php" method="GET">
            <input type="hidden" value="14" name="d" />
            <input type="text" placeholder="Search for Products and more.." name="searchstr" />
            <button name="submit">
              <i class="uil uil-search"></i>
            </button>
          </form>
          <div class="location fadeup" id="ctcnpnl">
            <input type="text" placeholder="Search here" id="cat_search" oninput="search_cat()" />

            <ul>
              <li onclick="set(this)">
                <i class="uil uil-apps"></i>
                <a href="" class="cn-search">Men</a>
              </li>
              <li onclick="set(this)">
                <i class="uil uil-apps"></i>
                <a href="" class="cn-search">Women</a>
              </li>
              <li onclick="set(this)">
                <i class="uil uil-apps"></i>
                <a href="" class="cn-search">Accessories</a>
              </li>
              <li onclick="set(this)">
                <i class="uil uil-apps"></i>
                <a href="" class="cn-search">Tools</a>
              </li>
              <li onclick="set(this)">
                <i class="uil uil-apps"></i>
                <a href="" class="cn-search">Others</a>
              </li>

            </ul>
          </div>
        </div>

        <!-- right elemnets in nav -->

        <div class="rightbox">
          <ul>
            <li>
              <a href="" class="rightlink">
                <i class="uil uil-phone-alt"></i>
                1800-000-0000
              </a>
            </li>
            <li>
              <a href="#" class="rightlink">
                <i class="uil uil-gift"></i>
                Offers
              </a>
            </li>
            <li>
              <a href="#" class="rightlink">
                <i class="uil uil-question-circle"></i>
                Help
              </a>
            </li>
            <li>
              <a href="" class="rightlink wl">
                <i class="uil uil-heart icon_wishlist"></i>
                <span class="noti_count1">0</span>
              </a>
            </li>
            <li class="user">
              <a href="#" class="rightlink">
                <i class="uil uil-user-circle bg" onclick="show_userpanel()">
                </i>
              </a>
              <div class="userpanel fadeup" id="userpanel">
                <ul>
                  <li>
                    <i class="uil uil-chat-bubble-user"></i><a href="myaccount.php">My Account</a>
                  </li>
                  <li><i class="uil uil-box"></i><a href="myorders.php">My Orders</a></li>
                  <li>
                    <i class="uil uil-heart-alt"></i><a href="myorders.html">My Wishlist</a>
                  </li>
                  <li>
                    <i class="uil uil-shopping-cart"></i><a href="cart.php">My Cart</a>
                  </li>
                  <?php
                  if (isset($_SESSION['USER_LOGIN']) && $_SESSION['USER_LOGIN'] == "YES") {
                  ?>
                    <li><i class="uil uil-signin"></i><a href="logout.php">Logout</a></li>
                  <?php } else { ?>
                    <li>
                      <i class="uil uil-signout"></i><a href="login.php">Login</a>
                    </li>
                  <?php } ?>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>