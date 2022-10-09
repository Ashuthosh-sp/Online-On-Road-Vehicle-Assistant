<?php
include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-header py-3"> 
      <h6 class="m-0 font-weight-bold text-primary">Feedback by User
      </h6>
    </div>

    <div class="card-body">
      <div class="table-responsive">
        <?php
        $query = " SELECT * FROM feedback";
        $query_run = mysqli_query($con, $query)
        ?>

        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th> ID </th>
              <th> Rating</th>
              <th>comment </th>
              <th>Name</th>
              <th>Email </th>
            </tr>
          </thead>
          <tbody>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
            ?>

                <tr>
                  <td> <?php echo $row['id']; ?></td>
                  <td> <?php echo $row['ratings']; ?></td>
                  <td> <?php echo $row['comment']; ?></td>
                  <td> <?php echo $row['name']; ?></td>
                  <td> <?php echo $row['email']; ?></td>
                 
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