<?php
include 'config.php';
$smsg="";
$rmsg="";

?>
<!-- Registration php -->
<?php
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phoneno = $_POST['phoneno'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $token = bin2hex(random_bytes(15));

    $q = "select * from user where username='$username'";
    $result = mysqli_query($con, $q);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $msg = "Username Already Exists";
    } else {
        if (($password == $cpassword)) {
            $hash = password_hash($password, PASSWORD_BCRYPT);
            $qy = "INSERT INTO `user` ( `username`, `email`,`phoneno`, `password`, `date`,`token`) VALUES ('$username','$email','$phoneno','$hash',current_timestamp(),'$token')";
            $result = mysqli_query($con, $qy);
            if ($result) {
                {
                    echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
                        </script>
                        <script>
                        window.onload = function swal() {
                        Swal.fire({
                            icon: \'success\',
                            title: \'Done\',
                            text: \'Record Inserted Successfully!\',
                    })
                };
                </script>';
                    echo '<meta http-equiv="refresh" content="1.5; URL=\'index.php\'" />';
                }
            } else  {
                echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
                    </script>
                    <script>
                    window.onload = function swal() {
                    Swal.fire({
                        icon: \'error\',
                        title: \'OOps!\',
                        text: \'Record is not Inserted\',
                })
            };
            </script>';
                echo '<meta http-equiv="refresh" content="1.5; URL=\'index.php\'" />';
            }
        } else {
            {
                echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
                    </script>
                    <script>
                    window.onload = function swal() {
                    Swal.fire({
                        icon: \'info\',
                        title: \'Please Note\',
                        text: \'Password are not matching!\',
                })
            };
            </script>';
                echo '<meta http-equiv="refresh" content="1.5; URL=\'index.php\'" />';
            }
        }
    }
}
?>
<!-- Login PHP -->
<?php
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $q = "select * from user where username='$username'";
    $result = mysqli_query($con, $q);
    $num = mysqli_num_rows($result);
    if ($num > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['USER_ID'] = $row['id'];
        $_SESSION['USER_NAME'] = $row['username'];
        $_SESSION['EMAIL_ID'] = $row['email'];
        $_SESSION['PHONE_NO'] = $row['phoneno'];
        $db_pass = $row['password'];
        $pass_decode = password_verify($password, $db_pass);
        if ($pass_decode) {
?>
            <script>
                location.replace("/hellomechanic/home.php");
            </script>
<?php
        } else {
            {
                echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
                    </script>
                    <script>
                    window.onload = function swal() {
                    Swal.fire({
                        icon: \'error\',
                        title: \'OOps!!\',
                        text: \'Password is incorrect!\',
                })
            };
            </script>';
                echo '<meta http-equiv="refresh" content="1.5; URL=\'index.php\'" />';
            }
        }
    } else {
        echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
        </script>
        <script>
        window.onload = function swal() {
        Swal.fire({
            icon: \'error\',
            title: \'OOps!!\',
            text: \'Invalid Username!\',
    })
};
</script>';
    echo '<meta http-equiv="refresh" content="1.5; URL=\'index.php\'" />';
    }
}
?>




<!-- forgot password -->

<?php
if (isset($_POST['smail'])) {
    $email = $_POST['email'];

    $q = "select * from user where email='$email'";
    $result = mysqli_query($con, $q);
    $num = mysqli_num_rows($result);

    if ($num) {
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
        $token = $row['token'];

        $subject = "Simple Email Test via PHP";
        $body = "Hi, $username This is the reset recovery mail link. click on the link to reset your password
                http://localhost/hellomechanic/reset/reset.php?token=$token";
        $headers = "From: ashu.s.p.2000@gmail.com";

        if (mail($email, $subject, $body, $headers)) {
            echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
            </script>
            <script>
            window.onload = function swal() {
            Swal.fire({
                icon: \'info\',
                title: \'Note!\',
                text: \'Please check your Mail.The Password Reset link has been sent!\',
        })
    };
    </script>';
        echo '<meta http-equiv="refresh" content="1.5; URL=\'index.php\'" />';
        } else {
       echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
                    </script>
                    <script>
                    window.onload = function swal() {
                    Swal.fire({
                        icon: \'error\',
                        title: \'OOpss!!\',
                        text: \'Email Sending Failed!\',
                })
            };
            </script>';
                echo '<meta http-equiv="refresh" content="1.5; URL=\'index.php\'" />';
        }
    } else {
        echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
                    </script>
                    <script>
                    window.onload = function swal() {
                    Swal.fire({
                        icon: \'error\',
                        title: \'OOps!!\',
                        text: \'Email does not exists.Please Register Yourself!\',
                })
            };
            </script>';
                echo '<meta http-equiv="refresh" content="1.5; URL=\'index.php\'" />';
    }
}

?>



<!-- Front End -->

<!DOCTYPE html>
<html>

<head>
    <title>Login & Resgister Form</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <script src="http://code.jquery.com/jquery-1.7.min.js"></script>
</head>

<body>

    <div class="login-page">

        <div class="box">
            <div class="left">
                <h3>Create Account</h3>
                <button type="button" class="register-btn">Sign Up </button>
            </div>
            <div class="right">
                <h3>Have an Account ?</h3>
                <button type="button" class="login-btn">Login</button>
            </div>
            <div class="form">
                <!-- Login form Start -->
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>" method="POST">
                    <div class="login-form">
                        <b>
                            <h3>Welcome</h3>
                        </b>
                        <div class="form-group">
                            <input type="text" placeholder="Username*" class="form-control" name="username" id="username" required>
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password*" class="form-control" name="password" id="password" required”>
                            <span><i class="fa fa-eye" aria-hidden="true" id="eye" style="position: absolute;
                                right: 54px;
                                transform: translate(0,-15%);
                                top: 50%;
                                 cursor: pointer;"></i></span>
                            <script>
                                var x = document.getElementById("password");
                                document.getElementById("eye").addEventListener("click", function() {

                                    if (x.type == "password") {
                                        x.type = "text";
                                        this.classList.add("fa.eye");
                                        this.classList.remove("fa-eye-slash")
                                    } else {
                                        x.type = "password";
                                        this.classList.remove("fa.eye");
                                        this.classList.add("fa-eye-slash")

                                    }

                                });
                            </script>

                        </div>
                        <button type="submit" class="submit-btn" name="register">Login</button>
                        <h4>
                        <center><?php
                                echo "$rmsg";
                                ?></center>
                    </h4>
                        <p><a href="#" class="register-btn">Sign Up</a> | <a href="#" class="lost-pass-btn">Forgot Password
                                ?</a></p>
                    </div>
                  
                </form>
                <!-- Login form End -->

                <!-- Register form Start -->
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>" method="POST">

                    <div class="register-form form-hidden">
                        <h3>Sign Up</h3>
                        <div class="form-group">
                            <input type="text" placeholder="UserName*" class="form-control" name="username" id="username" required>
                        </div>
                        <div class="form-group">
                            <input type="text" placeholder="Email Address*" class="form-control" name="email" id="email" required>
                        </div>
                        <div class="form-group">
                            <input type="tel" placeholder="Phoneno*" class="form-control" name="phoneno" id="phoneno" required 5maxlength="10" minlength="10"> 
                        </div>
                        <div class="form-group">
                            <input type="password" placeholder="Password*" class="form-control" name="password" id="Pass" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
  title="Must contain at least one  number and one uppercase and lowercase letter, and at least 8 or more characters">
                            <span><i class="fa fa-eye" aria-hidden="true" id="eye" style="position: absolute;
                                right: 49px;
                                transform: translate(0,155%);
                                top: 50%;
                             cursor: pointer;" onclick="toggle()"></i></span>
                            <script>
                                var state = false;

                                function toggle() {
                                    if (state) {
                                        document.getElementById("Pass").setAttribute("type", "password");
                                        document.getElementById("eye").style.color = '#7a797e';
                                        state = false;
                                    } else {
                                        document.getElementById("Pass").setAttribute("type", "text");
                                        document.getElementById("eye").style.color = '35887ef';
                                        state = true;
                                    }
                                }
                            </script>


                        </div>
                        <!-- <ul>
                            <li class="checkPassword"> Eight Characters</li>
                            <li class="checkPassword"> 1 LowerCase Character</li>
                            <li  class="checkPassword"> 1 Upper Case Characters</li>
                            <li  class="checkPassword"> 1 numerical character</li>
                            <li  class="checkPassword"> 1 special Character</li>
                        </ul> -->
                        <!-- <div class="toggle-password">
                                    <i class="fa fa-eye"></i>
                                    <i class="fa fa-eye-slash"></i>
                                </div>
                                <div class="password-policies">
                                    <div class="policy-length">
                                    8 Characters
                                    </div>
                                    <div class="policy-number">
                                    Contains Number
                                    </div>
                                    <div class="policy-uppercase">
                                    Contains Uppercase
                                    </div>
                                    <div class="policy-special">
                                    Contains Special Characters
                                    </div>
                                </div>
                        <script>
                            const eye = document.getElementById("eye");
                            const pass = document.getElementById("Pass");
                            eye.addEventListener('click', () => {

                            })
                        </script>
                        <script>
                        function _id(name){
  return document.getElementById(name);
}
function _class(name){
  return document.getElementsByClassName(name);
}
_class("toggle-password")[0].addEventListener("click",function(){
  _class("toggle-password")[0].classList.toggle("active");
  if(_id("password-field").getAttribute("type") == "password"){
    _id("password-field").setAttribute("type","text");
  } else {
    _id("password-field").setAttribute("type","password");
  }
});

_id("password-field").addEventListener("focus",function(){
  _class("password-policies")[0].classList.add("active");
});
_id("password-field").addEventListener("blur",function(){
  _class("password-policies")[0].classList.remove("active");
});

_id("password-field").addEventListener("keyup",function(){
  let password = _id("password-field").value;
  
  if(/[A-Z]/.test(password)){
    _class("policy-uppercase")[0].classList.add("active");
  } else {
    _class("policy-uppercase")[0].classList.remove("active");
  }
  
  if(/[0-9]/.test(password)){
    _class("policy-number")[0].classList.add("active");
  } else {
    _class("policy-number")[0].classList.remove("active");
  }
  
  if(/[^A-Za-z0-9]/.test(password)){
    _class("policy-special")[0].classList.add("active");
  } else {
    _class("policy-special")[0].classList.remove("active");
  }
  
  if(password.length > 7){
    _class("policy-length")[0].classList.add("active");
  } else {
    _class("policy-length")[0].classList.remove("active");
  }
});
                        </script> -->

                        <div class="form-group">
                            <input type="password" placeholder=" Confirm Password*" class="form-control" name="cpassword" id="cpassword" required>
                        </div>

                        <button type="submit" class="submit-btn" name="login">Sign Up</button>
                        <center><?php
                                echo "$smsg";
                                ?></center>
                        <p><a href="#" class="login-btn">Login</a> | <a href="#" class="lost-pass-btn">Forgot Password
                                ?</a></p>
                    </div>
                </form>
                <!-- Register form End -->

                <!-- Lost Password form Start -->
                <form action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>" method="POST">
                    <div class="lost-password-form form-hidden">
                        <h3>Forgot Password ?</h3>
                        <h5>You will receive a link to create a new password via email.</h5>

                        <div class="form-group">
                            <input type="text" placeholder="Email Address*" class="form-control" name="email" id="email">
                        </div>


                        <button type="submit" class="submit-btn" name="smail" id="smail">Send Mail</button>
                        <p><a href="#" class="login-btn">Login</a> | <a href="#" class="register-btn">Sign Up</a></p>
                    </div>
                </form>
                <!-- Lost Password form End -->

            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>

</html>