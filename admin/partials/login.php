<?php
session_start();
$con=mysqli_connect('localhost','root');

mysqli_select_db($con,'hellomechanic');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $q="select * from user where username='$username'";
    $result=mysqli_query($con,$q);
    $num=mysqli_num_rows($result);

    if ($num == 1)
    {
        while($row=mysqli_fetch_assoc($result))
        {
            if (password_verify($password, $row['password']))
            { 
               $_SESSION['user']=$username;
                
            }
        else
        {
              echo"password Incorrect";
            
        }
        // echo $username,$password,$row['username'],$row['password'];
    }
}
        else
        {
            echo "invalid username";
        }
      }
?>
