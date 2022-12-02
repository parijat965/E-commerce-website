<?php
require('connection.php');
require('function.php');
//pre($_SERVER);
$b = 3;
if (isset($_SESSION['ADMIN_LOGIN'])) {
?>

	<!DOCTYPE html>
	<html class="no-js" lang="">

	<head>
		<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

		<meta charset="utf-8" />

		<meta http-equiv="X-UA-Compatible" content="IE=edge" />

		<title>Dashboard Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1" />

		<link rel="stylesheet" href="assets/css/style.css" />
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
	</head>

	<body>
		<header id="header">
			<div class="logo">
				<h3>Admin <span class="colorword">panel</span></h3>
			</div>
			<div id="toggel" class="togg" onclick="toggler()">
				<div></div>
				<div></div>
				<div></div>
			</div>
			<span class="close" id="close" onclick="hide()">&times;</span>
			<nav id="navbar">
				<div class="welcome">
					<h3><span class="colorword">Welcome</span> <?php echo $_SESSION['ADMIN_USERNAME'] ?> </h3>
				</div>

				<ul>
					<li class="btn5">
						<a href="catagories.php">Catagories Controller</a>
					</li>
					<li class="btn5">
						<a href="product.php">Product Controller</a>
					</li>
					<li class="btn5">
						<a href="all_orders.php">Order Controller</a>
					</li>
					<li class="btn5">
						<a href="users.php">User Controller</a>
					</li>
					<li class="btn5">
						<a href="banner.php">Banner Controller</a>
					</li>
					<li  class="btn5">
						<a href="contact.php">Contact</a>
					</li>

					<div class="logout">
						<a class="btns2" href="logout.php" style="color:#fff;"><i class="fa fa-power-off"> Logout</i></a>
					</div>
				</ul>
			</nav>
		</header>
	<?php
} else {
	header('location:index.php');
	die();
}
	?>