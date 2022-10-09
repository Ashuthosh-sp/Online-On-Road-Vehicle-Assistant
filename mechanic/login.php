<?php
include('includes/header.php');
?>
<?php
if (isset($_POST['login_btn'])) {
  $email_login = $_POST['emaill'];
  $password_login = $_POST['passwordd'];
  $query = "SELECT * FROM register where email='$email_login' AND password='$password_login'";
  $query_run = mysqli_query($con, $query);


  $res = mysqli_query($con, "SELECT * FROM mechanic where email='$email_login' AND password='$password_login'");
  $check_user = mysqli_num_rows($res);
  if ($check_user > 0) {
    $row = mysqli_fetch_assoc($res);
    $_SESSION['MID'] = $row['id'];
    $_SESSION['MECH_NAME'] = $row['username'];
    if ($row>0)
     {
      header('Location:service.php');
    } 
    else {
     
      header('Location:login.php');
    }
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
                  <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                  <?php

                  if (isset($_SESSION['status']) && $_SESSION['status'] != '') {
                    echo '<h2 class="bg-danger text-white"> ' . $_SESSION['status'] . ' </h2>';
                    unset($_SESSION['status']);
                  }
                  ?>
                </div>

                <form class="user" action="<?php echo htmlentities($_SERVER['PHP_SELF']);  ?> " method="POST">

                  <div class="form-group">
                    <input type="email" name="emaill" class="form-control form-control-user" placeholder="Enter Email Address...">
                  </div>
                  <div class="form-group">
                    <input type="password" name="passwordd" class="form-control form-control-user" placeholder="Password">
                  </div>

                  <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                  <hr>
                  <a href="forgot1.php" class="lost-pass-btn">Forgot Password
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