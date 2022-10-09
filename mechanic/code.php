<?php
include('config.php');

if (isset($_POST['delete_btn'])) {
    $id = $_POST['delete_id'];
    $query = "DELETE FROM user WHERE id= '$id'";
    $query_run = mysqli_query($connection, $query);
    if ($query_run) {
        $_SESSION['success'] = "Your data is DELETED";
        header('Location:register.php');
    } else {
        $_SESSION['status'] = "Your data is not DELETED";
        header('Location:register.php');
    }
}

if (isset($_POST['updatebtn'])) {
    $id = $_POST['id'];
    $location = $_POST['location'];
    $address = $_POST['address'];
    $vtype = $_POST['vtype'];
    $vname = $_POST['vname'];
    $cname = $_POST['cname'];
    $email = $_POST['email'];
    $pnumber = $_POST['pnumber'];
    $complaint = $_POST['complaint'];
    $model = $_POST['model'];
    $date = $_POST['date'];

    $query = "UPDATE `booking` SET location='$location',address='$address',vtype='$vtype',vname='$vname',cname='$cname',email='$email',pnumber='$pnumber',complaint='$complaint',model='$model',date='$date' WHERE id='$id'";
      $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['success']="your data is updated";
        header('Location:service.php');
    }
    else
    {
        $_SESSION['status']="your data is  not updated";
        header('Location:service.php');

    }
//  echo ' $id,
//  $location,
//  $address,
//  $vtype ,
//  $vname,
//  $cname ,
//  $email,
//  $pnumber,
//  $complaint ,
//  $model ,
//  $date';
}
?>
