<?php
require('util/connection.php');
require('util/function.php');
unset($_SESSION['USER_LOGIN']);
unset($_SESSION['USER_ID']);
session_destroy();
redirect('login.php');
?>