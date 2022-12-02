<?php
require('util/connection.php');
require('util/function.php');
	if(isset($_POST['submit'])){
		$username=get_safe_value($con,$_POST['logusername']);
		$userpassword=get_safe_value($con,$_POST['passwordd']);  
  $query="select * from users where email='$username' and password='$userpassword'";

$num=mysqli_query($con,$query);
$row=mysqli_fetch_assoc($num);

$r=mysqli_num_rows($num);
echo "ok";
if($r == 1)
{
    echo "ok";
	$_SESSION['USER_LOGIN']="YES";
	$_SESSION['USER_ID']=$row['id'];
	redirect('index.php');
}
else{
    echo "ok";
	?>
	<script>
	alert('Invalid Credentials.');
	window.location.href="login.php";
		</script>
	<?php
 }
}
?>