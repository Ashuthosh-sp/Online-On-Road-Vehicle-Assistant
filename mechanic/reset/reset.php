<?php
include('../config.php');
if (isset($_POST['update'])) {
   
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        if (($password == $cpassword)) { 
            $updateq = "update mechanic set password='$password'";
            $result = mysqli_query($con, $updateq);
            if ($result){
                echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
                    </script>
                    <script>
                    window.onload = function swal() {
                    Swal.fire({
                        icon: \'success\',
                        title: \'Done\',
                        text: \'Password is Reseted Successfuuly!\',
                })
            };
            </script>';
                echo '<meta http-equiv="refresh" content="1.5; URL=\'home.php\'" />';
            }
         else {
            echo "your password is not updated";
        }
    }
    else
    { 

    }
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            height: 100%;
        }

        body {
            font-family: 'Segoe UI', sans-serif;
            ;
            font-size: 1rem;
            line-height: 1.6;
            height: 100%;
        }

        .wrap {
            width: 100%;
            height: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #fafafa;
        }

        .login-form {
            width: 350px;
            margin: 0 auto;
            border: 1px solid #ddd;
            padding: 2rem;
            background: #ffffff;
        }

        .form-input {
            background: #fafafa;
            border: 1px solid #eeeeee;
            padding: 12px;
            width: 100%;
        }

        .form-group {
            margin-bottom: 1rem;
        }

        .form-button {
            background: #69d2e7;
            border: 1px solid #ddd;
            color: #ffffff;
            padding: 10px;
            width: 100%;
            text-transform: uppercase;
        }

        .form-button:hover {
            background: #69c8e7;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-footer {
            text-align: center;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="wrap">
        <form class="login-form" action="" method="post">
            <div class="form-header">
                <h3>Create Account</h3>
                <p>Get Started with your free account</p>
            </div>
            <!--Password Input-->
            <div class="form-group">
                <input type="password" class="form-input" placeholder=" New password" name="password" id="password">
            </div>
            <!-- Confirm Password Input-->
            <div class="form-group">
                <input type="password" class="form-input" placeholder="Confirm password" name="cpassword" id="cpassword">
            </div>
            <!--Login Button-->
            <div class="form-group">
                <button class="form-button" type="submit" name="update">Update password</button>
            </div>
              </form>
    </div>
    <!--/.wrap-->
</body>
</body>

</html>