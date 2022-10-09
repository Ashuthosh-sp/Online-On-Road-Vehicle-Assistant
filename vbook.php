<?php

require('config.php');
//if (!isset($_SESSION['USER_ID'])) {
 // //
  //    <script>
      //  window.location.href = '../Computer_world/Login.php';
      //</script>
 // 
 // }
?>




<!-- Custom fonts for this template-->
<link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

<!-- Custom styles for this template-->
<link href="css/sb-admin-2.min.css" rel="stylesheet">

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Your Bookings </h6>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <?php
        $uid = $_SESSION['USER_ID'];
        $query = " SELECT * FROM booking where uid=$uid";
        $query_run = mysqli_query($con, $query);
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> Booking ID </th>
              <th>Customer Name </th>
              <th> Location</th>
              <th>address </th>
              <th>Vehcile Type</th>
              <th>Vehcile Name </th>
              <th>Complaint </th>
              <th>Model </th>
              <th>Date </th>
              <th>View Status </th>
              <th> Pay Bill</th>
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
                  <td> <?php echo $row['location']; ?></td>
                  <td> <?php echo $row['address']; ?></td>
                  <td> <?php echo $row['vtype']; ?></td>
                  <td> <?php echo $row['vname']; ?></td>
                  <td> <?php echo $row['complaint']; ?></td>
                  <td> <?php echo $row['model']; ?></td>
                  <td> <?php echo $row['date']; ?></td>
                  <td> <?php
                        if ($row['status'] == 0) {
                          echo ("Pending");
                        } else {
                          echo ("Work done");
                        }

                        ?> </td>
                  <td>
                    <?php
                    if($row['status']==1 )
                    {
                      ?>
                    <a class="btn btn-success" href="payment.php?uid=<?php echo $row['uid']; ?>">Pay Bill</a>
                    <?php
                    }
                    else
                    {
                      
                    }
                    ?>
                  </td>

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

</body>

</html>