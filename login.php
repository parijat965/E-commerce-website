<?php	
require('util/connection.php');
if(!isset($_SESSION['USER_LOGIN'])){
?>	
<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>login</title>
      <link rel="stylesheet" href="./assets//css/login.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Welcome Back
            </div>
            <div class="title signup">
               Welcome
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Signup</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form method="post" autocomplete="off" action="log_valid.php" class="login">
                  <div class="field">
                     <input type="text" placeholder="Email Address" name="logusername" required>
                  </div>
                  <div class="field">
                     <input type="password" placeholder="Password" name="passwordd" required>
                  </div>
                  <div class="pass-link">
                     <a href="#">Forgot password?</a>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="submit" value="Login">
                  </div>
                  <div class="signup-link">
                     Not a member? <a href="">Signup now</a>
                  </div>
               </form>
               <form method="post" autocomplete="off" action="registration.php" class="signup">
                  <div class="field">
                     <input type="text" name="regusername" placeholder="Username" required>
                  </div>
                  <div class="field">
                     <input type="email" name="email" placeholder="Email" required>
                  </div>
                  <div class="field">
                     <input type="password" name="regpassword" placeholder="Enter password" required>
                  </div>
                  <div class="field">
                     <input type="number" name="mobile" placeholder="Enter Mobile" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="submit" value="Signup">
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>
<?php
}else{
?>
	<script>
	window.location.href="index.php";
	</script>
<?php
}
?>