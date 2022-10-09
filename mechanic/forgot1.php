<?php
include('includes/header.php');
?>
    <?php
        if (isset($_POST['smail'])) {
            $con = mysqli_connect('localhost', 'root');

            mysqli_select_db($con, 'hellomechanic');
            $email = $_POST['email'];

            $q = "select * from mechanic where email='$email'";
            $result = mysqli_query($con, $q);
            $num = mysqli_num_rows($result);

            if ($num) {
                    $row = mysqli_fetch_assoc($result);
                $username = $row['username'];
                
                $subject = "Simple Email Test via PHP";
                $body = "Hi, $username This is test email send by PHP Script
                http://localhost/hellomechanic/mechanic/reset/reset.php";
                $headers = "From: ashu.s.p.2000@gmail.com";

                if (mail($email, $subject, $body, $headers)) 
                {
                    echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
                        </script>
                        <script>
                        window.onload = function swal() {
                        Swal.fire({
                            text: \'Your Password reset link is send successfully. Please check your mail\',
                    })
                };
                </script>';
                    echo '<meta http-equiv="refresh" content="1.5; URL=\'login.php\'" />';
                }
                 else {
                    echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
                        </script>
                        <script>
                        window.onload = function swal() {
                        Swal.fire({
                            icon: \'error\',
                            title: \'Oops...\',
                            text: \'Email Sending Failed!\',
                    })
                };
                </script>';
                }
            } else {
                echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
                    </script>
                    <script>
                    window.onload = function swal() {
                    Swal.fire({
                        text: \'Email id does not exists\',
                })
            };
            </script>';
            }
        }

        ?>
<div class="container">

  <!-- Outer Row -->
  <div class="row justify-content-center">

    <div class="col-xl-6 col-lg-6 col-md-6">

      <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
          <!-- Nested Row within Card Body -->
          <div class="row">
            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
            <div class="col-lg-12">
              <div class="p-5">
                <div class="text-center">
                  <h1 class="h4 text-gray-900 mb-4">FORGOT PASSWORD</h1>
                </div>

                <form class="user" action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?> " method="POST">

                <div class="form-group">
                            <input type="text" placeholder="Email Address*" class="form-control" name="email" id="email">
                        </div>
                        <button type="submit" class="btn btn-primary btn-user btn-block" name="smail" id="smail">Send Mail</button>
                  <hr>
                  <a href="login.php" class="lost-pass-btn">Back to Login
                    ?</a>
                </form>


              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

</div>


<?php
include('includes/scripts.php');
?>