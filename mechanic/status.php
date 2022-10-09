<?php
include('includes/header.php');
include('includes/navbar.php');
?>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Booking Requested
                    </div>
                </div>
                <div class="card-body">
                                
                <?php

                $con = mysqli_connect("localhost", "root", "", "hellomechanic");
                if (isset($_POST['edit_btn'])) {
                    $id = $_POST['edit_id'];
                    $query = "SELECT * FROM booking WHERE id= '$id'";
                    $query_run = mysqli_query($con, $query);

                    foreach($query_run as $row)
                    {
                        ?>
                  
                <form action="code.php" method="POST">
                <div class="form-group">
                    <label> ID </label>
                    <input type="text" name="id" VALUE="<?php  echo $row['id']?>" class="form-control" placeholder="id">
                </div>
                <div class="form-group">
                    <label> Location </label>
                    <input type="text" name="location" VALUE="<?php  echo $row['location']?>" class="form-control" placeholder="id">
                </div>
            
                <div class="modal-footer">
                <a href="service.php" class="btn btn-danger">Cancel</a>
                <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
                </div>

                <?php
            }
        
      }
?>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
