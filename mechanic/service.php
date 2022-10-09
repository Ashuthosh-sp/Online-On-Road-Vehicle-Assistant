<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Booking Requested
      </h6>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <?php
        $user=$_SESSION['MID'];
      $query= " SELECT * FROM mechbooking where mid= $user";
      $query_run = mysqli_query($con, $query);
      
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> ID </th>
              <th> Location</th>
              <th>address </th>
              <th>Vehcile Type</th>
              <th>Vehcile Name </th>
              <th>Customer Name </th>
              <th>Email Id </th>
              <th>Phone Number </th>
              <th>Complaint </th>
              <th>Model </th>
              <th>Date </th>
              <th>STATUS </th>
              
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
            ?>

                <tr>
                  <td> <?php echo $row['id']; ?></td>
                  <td> <?php echo $row['location']; ?></td>
                  <td> <?php echo $row['address']; ?></td>
                  <td> <?php echo $row['vtype']; ?></td>
                  <td> <?php echo $row['vname']; ?></td>
                  <td> <?php echo $row['cname']; ?></td>
                  <td> <?php echo $row['email']; ?></td>
                  <td> <?php echo $row['pnumber']; ?></td>
                  <td> <?php echo $row['complaint']; ?></td>
                  <td> <?php echo $row['model']; ?></td>
                  <td> <?php echo $row['date']; ?></td>

                  <!-- <td>
                    <form action="code.php" method="post">
                      <input type="hidden" name="delete_id" value=" <?php echo $row['id'];?>">
                      <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                    </form>                
                  </td>  -->
                  <td>
                  <form action="edit.php" method="post">
                      <input type="hidden" name="edit_id" value="<?php echo $row['id'];?>">
                      <button type="submit" name="edit_btn" class="btn btn-info"> SEND UPDATES </button>
                    </form>
                  </td>
                  <!-- <td> -->
                  <!-- <form action="edit.php" method="post">
                      <input type="hidden" name="edit_id" value="">
                      <button type="submit" name="edit_btn" class="btn btn-primary"> APPROVE</button>
                    </form>
                  </td>
                  <td>
                  <form action="edit.php" method="post">
                      <input type="hidden" name="edit_id" value="">
                      <button type="submit" name="edit_btn" class="btn btn-dark"> SEND DETAILS</button>
                    </form> -->
                  <!-- </td> -->
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