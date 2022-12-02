<?php
require('require/head.php');
$us_id = $_SESSION['USER_ID'];
$sqlis = "select * from users_cart where use_id='$us_id'";
$resu = mysqli_query($con, $sqlis);
$c = mysqli_num_rows($resu);
if ($c >= 1) {
	$sql = "select product.*,users_cart.p_id,users_cart.qty from product,users_cart where users_cart.use_id='$us_id' && product.id=users_cart.p_id";
	$res = mysqli_query($con, $sql);
	$cart_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$cart_arr[] = $row;
	}
?>
	<div class="path">
		<div class="container">
			<a href="index.php">Home</a>
			/
			<a href="myorders.php">My Orders</a>
		</div>
	</div>
	<section class="checkout">
		<section class="myac-body">
			<div class="flex row">
				<div class="right">
					<div class="col-lg-12 col-md-12">
						<div class="pdpt-bg">
								<div class="step">
									<div class="tittle" onclick="open_address(this)" id="ct-ad">
										<span>1</span>
										<h4>Delivery Address</h4>
									</div>
									<div class="span" id="chekout_address" style="height: 0">
										<div class="formbody">
											<div class="form-group">

											</div>
											<div class="address-fieldset">
												<div class="row">
													<div class="row2">
														<div class="lt">
															<label for="ft">Name*</label>
															<input type="text" name="addname" placeholder="Enter your name" id="addname" required>
														</div>
														<div class="ft">
															<label for="ft">Mobile*</label>
															<input type="number" name="addnum" id="addnum" placeholder="Mobile" required></input>
														</div>
													</div>
													<label for="ft">Flat / House / Office No.*</label>
													<input type="text" name="addhouse" placeholder="Enter Bulding Address,House No." id="addhouse" required>
													<label for="ft">Street / Society / Office Name*</label>
													<input type="text" name="addroad" placeholder="Road Name,Colony Name" id="addroad" required>
													<div class="row2">
														<div class="lt">
															<label for="ft">Pincode*</label>
															<input type="number" name="addpin" id="addpin" placeholder="Pincode" required></input>
														</div>
														<div class="ft">
															<label for="ft">Locality*</label>
															<input type="text" name="addcity" id="addcity" placeholder="City" required></input>
														</div>
													</div>
													<label for="ft">State*</label>
													<input type="text" name="addstate" id="addstate" placeholder="State" required></input>
													<div class="row2">
														<a href="javascript:void(0)" class="next-step" onclick="nex_pt()">Next</a>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="step">
									<div class="tittle" onclick="open_pt(this)" id="ct-pt">
										<span>2</span>
										<h4>Payment</h4>
									</div>
									<div class="span" id="chekout_pt" style="height: 0">
										<div class="formbody">
											<div class="rpt100">
												<ul class="radio--group-inline-container_1">
													<select id="ch-select" name="ch-select" style="margin-top:4em;margin-bottom:3em;outline:none;">
														<option>Select Payment Method</option>
														<option>COD</option>
														<option>PayU</option>
													</select>
												</ul>
											</div>
										</div>
										<?php
										$total_price = 0;
										foreach ($cart_arr as $lists) {
											$total_price = $total_price + ($lists['qty'] * $lists['price']);
										}
										?>
										<div class="row2">
											<a href="#" style="width: 100%;margin: 0;">
												<button style="margin: 0;background-color:#f2ac20;" onclick="addorder(<?php echo $total_price; ?>)" >Place Order</button>
											</a>
										</div>
									</div>
								</div>
						</div>
					</div>
				</div>
				<div class="left">

				</div>
			</div>
		</section>
	</section>

<?php
	require('require/foot.php');
} else {
?>
	<script>
		alert('Nothing in Cart.');
		window.location.href = "cart.php";
	</script>
<?php
}
?>