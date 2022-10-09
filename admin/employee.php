<?php
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Mechanic Profile
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
      $query = "SELECT * FROM mechanic  ";
      $query_run = mysqli_query($con, $query);
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> ID </th>
              <th> username</th>
              <th>email </th>
              <th>number</th>
              <th>DELETE</th>
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
                  <td> <?php echo $row['number']; ?></td>
                  <td>
                    <form action="code.php" method="post">
                      <input type="hidden" name="delete_id" value=" <?php echo $row['id'];?>">
                      <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
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