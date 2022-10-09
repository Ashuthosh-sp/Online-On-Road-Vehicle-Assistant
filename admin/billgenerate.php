<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Bill Generate
      </h6>
    </div>

    <div class="card-body">
      <?php
      if (isset($_SESSION['success']) && $_['success'] != '')
      {
        echo'<h2 class ="bg-primary"> '.$_SESSION['success'].'</h2>';
        unset($_SESSION['success']);
      }

      if (isset($_SESSION['status']) && $_['status'] != '')
      {
        echo'<h2 class ="bg-danger"> '.$_SESSION['status'].'</h2>';
        unset($_SESSION['status']);
      }
      ?>
      <div class="table-responsive">
        <?php
      $query = "SELECT * FROM mechbooking  ";
      $query_run = mysqli_query($con, $query);
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>BOOKING ID  </th>
              <th> CUSTOMER NAME</th>
              <th>CUSTOMER EMAIL </th>
              <th> CUSTOMER PHONE NUMBER</th>
              <th>SERVICE HOUR WORKED</th>
              <th>SERVICE COST</th>
              <th>SPARE PARTS</th>
              <th>SPARE COST</th>
              <th>TOTAL COST</th>
              <th>EDIT DETAILS</th>
              <th>GENERATE BILL</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
            ?>

                <tr>
                  <td> <?php echo $row['id']; ?></td>
                  <td> <?php echo $row['cname']; ?></td>
                  <td> <?php echo $row['email']; ?></td>
                  <td><?php echo $row['pnumber']; ?></td>
                  <td><?php echo $row['service_hour']; ?></td>
                  <td><?php echo $row['service_cost']; ?></td>
                  <td><?php echo $row['spare_parts']; ?></td>
                  <td><?php echo $row['spare_cost']; ?></td>
                  <td><?php echo $row['total_cost']; ?></td>
                  <td><a class="btn btn-primary" href="seredit.php?id=<?php echo $row['id'];?>">Service Edit</a></td>
                  <td><a class="btn btn-primary" href="EmailTest.php?id=<?php echo $row['id'];?>" >Generate Bill</a></td>
                 </tr>
            <?php
              }
            } else {
              echo "No records found";
            }
            ?>

          </tbody>
        </table>

      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>