<?php
include('includes/header.php');
include('includes/navbar.php');

?>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">User Profile
      </h6>
    </div>

    <div class="card-body">
      <?php
      if (isset($_SESSION['success']) && $_SESSION['success'] != '')
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
      $query = " SELECT * FROM user";
      $query_run = mysqli_query($con, $query)
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> ID </th>
              <th> Username </th>
              <th>Email </th>
              <th>PhoneNumber </th>
              <th>DELETE </th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
            ?>

                <tr>
                  <td> <?php echo $row['id']; ?></td>
                  <td> <?php echo $row['username']; ?></td>
                  <td> <?php echo $row['email']; ?></td>
                  <td> <?php echo $row['phoneno']; ?></td>
                  <td>
                    <form action="code.php" method="post">
                      <input type="hidden" name="delete_id" value=" <?php echo $row['id'];?>">
                      <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                    </form>
                  </td>
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