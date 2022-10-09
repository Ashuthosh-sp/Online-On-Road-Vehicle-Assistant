<?php

if (!isset($_SESSION['USER_NAME']))
{
   ?>
   <script>
     window.Location('login.php');
   </script>
   <?php
   }
?>