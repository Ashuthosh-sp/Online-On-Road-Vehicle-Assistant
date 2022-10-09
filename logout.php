<?php
require('../hellomechanic/login/config.php');
     unset($_SESSION['USER_NAME']);
     header('Location:/hellomechanic/login/index.php');

 
 ?>