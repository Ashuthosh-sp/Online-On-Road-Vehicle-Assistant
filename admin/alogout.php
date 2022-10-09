<?php
 if(isset($_POST['logout_btn']))
 {
     session_destroy();
     unset($_SESSION['ADMIN_NAME']);
     header('Location:login.php');
 }
 ?>