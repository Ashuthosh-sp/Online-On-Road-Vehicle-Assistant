<?php
session_start();
$showAlert = false;
$showError = false;
// header('location:index.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){

 $con=mysqli_connect('localhost','root');

mysqli_select_db($con,'hellomechanic');
$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];

$q="select * from user where username='$username'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);

if($num>0)
{
    $showError = "Username Already Exists";
    echo $showError;
}
else
{   
    if(($password == $cpassword)){
        $hash = password_hash($password, PASSWORD_BCRYPT);
    $qy="INSERT INTO `user` ( `username`, `email`, `password`, `date`) VALUES ('$username','$email','$hash',current_timestamp())";
    $result=mysqli_query($con,$qy);
        if($result)
        {
            $showAlert=true;
        }
}

else
{
    $showError="password do not match";
}
}
}
   
?>