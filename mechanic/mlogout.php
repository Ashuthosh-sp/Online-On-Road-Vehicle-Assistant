<?php


 if(isset($_POST['logout_btn']))
 {
     session_destroy();
     unset($_SESSION['MECH_NAME']);
     header('Location:/hellomechanic/mechanic/login.php');

 }
 ?>