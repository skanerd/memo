<?php 

session_start();

unset($_SESSION['isLoggedIn']);
setcookie('isLoggedIn', '', -1);

header('Location: ./login.php');

?>
