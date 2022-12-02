<?php
function pre($arr)
{
	echo '<pre>';
	print_r($arr);
}

function prx($arr)
{
	echo '<pre>';
	print_r($arr);
	die();
}

function get_safe_value($con, $str)
{
	if ($str != '') {
		$str = trim($str);
		return mysqli_real_escape_string($con, $str);
	}
}
function get_product($con)
{

	$sql = "select * from product where status='1' order by id desc";

	$res = mysqli_query($con, $sql);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return $product_arr;
}
function get_product_by_category($con,$catid)
{

	$sql = "select product.id,name,mrp,price,qty,image from product,categories where product.categories_id='$catid' and product.categories_id=categories.id and product.status='1' order by product.id desc";
	// echo $sql;
	$res = mysqli_query($con, $sql);
	$product_arr = array();
	while ($row = mysqli_fetch_assoc($res)) {
		$product_arr[] = $row;
	}
	return $product_arr;
}

function get_product_details($con, $id)
{

	$sql = "select * from product where id='$id' and status=1";

	$res = mysqli_query($con, $sql);
	$product_arr = mysqli_fetch_assoc($res);

	return $product_arr;
}
function redirect($path)
{
?>
	<script>
		window.location.href = '<?php echo $path; ?>';
	</script>
<?php
}

function getCategories($con)
{
	$sqli = "select * from categories where status='1'";
	$resu = mysqli_query($con, $sqli);
	$cat_arr = array();
	while ($roww = mysqli_fetch_assoc($resu)) {
		$cat_arr[] = $roww;
	}
	return $cat_arr;
}
function getAllBanners($con)
{
	$sqli = "select image from banner where status='1'";
	$resu = mysqli_query($con, $sqli);
	$ban_arr = array();
	while ($roww = mysqli_fetch_assoc($resu)) {
		$ban_arr[] = $roww;
	}
	return $ban_arr;
}
function isProductInCart($con, $id)
{

	$user_id = $_SESSION['USER_ID'];
	$product_id = $id;
	$query = "select * from users_cart where use_id='$user_id' && p_id='$product_id'";
	$num = mysqli_query($con, $query);
	$row = mysqli_fetch_assoc($num);
	$r = mysqli_num_rows($num);
	if ($r > 0) {
		return true;
	} else {
		return false;
	}
}
?>