<?php
require('config.php');

if (isset($_POST['delete_btn'])) 
{
    $id = $_POST['delete_id'];
    $query = "DELETE FROM booking WHERE id= '$id'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your data is DELETED";
        header('Location:service.php');
    } else {
        $_SESSION['status'] = "Your data is not DELETED";
        header('Location:service.php');
    }
}


?>
