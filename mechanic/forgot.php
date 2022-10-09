<?php
include('includes/header.php'); 
?>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?>" method="POST">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
                    <div class="lost-password-form form-hidden">
                        <h3>Forgot Password ?</h3>
                        <h5>You will receive a link to create a new password via email.</h5>

                        <div class="form-group">
                            <input type="text" placeholder="Email Address*" class="form-control" name="email" id="email">
                        </div>


                        <button type="submit" class="submit-btn" name="smail" id="smail">Send Mail</button>
                    </div>
                    
                </form>


                <?php
        if (isset($_POST['smail'])) {
            $con = mysqli_connect('localhost', 'root');

            mysqli_select_db($con, 'hellomechanic');
            $email = $_POST['email'];

            $q = "select * from register where email='$email'";
            $result = mysqli_query($con, $q);
            $num = mysqli_num_rows($result);

            if ($num) {
                    $row = mysqli_fetch_assoc($result);
                $username = $row['username'];
                
                $subject = "Simple Email Test via PHP";
                $body = "Hi, $username This is test email send by PHP Script
                http://localhost/hellomechanic/admin/reset/reset.php";
                $headers = "From: ashu.s.p.2000@gmail.com";

                if (mail($email, $subject, $body, $headers)) {
                    echo "check your email";
                } else {
                    echo "email sending failed...";
                }
            } else {
                echo "no email found";
            }
        }

        ?>
        <?php
        include('includes/scripts.php'); 
        ?>
