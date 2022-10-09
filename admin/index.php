<?php
include('includes/header.php');
include('includes/navbar.php');


?>


<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Content Row -->
  <div class="row">

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-primary text-uppercase mb-5">Total Registered Users</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $query = "SELECT id FROM user ORDER BY id";
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h1>' . $row . '</h1>';
                ?>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <!-- total Employees -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-primary text-uppercase mb-5">Total mechanic</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $query = "SELECT id FROM mechanic ORDER BY id ";
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h1>' . $row . '</h1>';
                ?>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <!-- total Booking orders -->
    <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
              <div class="text-xl font-weight-bold text-primary text-uppercase mb-5">Total bookings</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
                <?php
                $query = "SELECT id FROM booking ORDER BY id";
                $query_run = mysqli_query($con, $query);
                $row = mysqli_num_rows($query_run);
                echo '<h1>' . $row . '</h1>';
                ?>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>


  <!-- Content Row -->








  <?php
  include('includes/scripts.php');
  include('includes/footer.php');
  ?>