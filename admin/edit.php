<?php
include('includes/header.php');
include('includes/navbar.php');

?>

<?php

if (isset($_POST['updatebtn']))
 {
    $id = $_POST['id'];
    $location = $_POST['location'];
    $address = $_POST['address'];
    $vtype = $_POST['vtype'];
    $vname = $_POST['vname'];
    $cname = $_POST['cname'];
    $email = $_POST['email'];
    $pnumber = $_POST['pnumber'];
    $complaint = $_POST['complaint'];
    $model = $_POST['model'];
    $date = $_POST['date'];

    $query = "UPDATE `booking` SET location='$location',address='$address',vtype='$vtype',vname='$vname',cname='$cname',email='$email',pnumber='$pnumber',complaint='$complaint',model='$model',date='$date' WHERE id='$id'";
      $query_run = mysqli_query($con, $query);
     prx($con);
    if($query_run)
    {
        $_SESSION['success']="your data is updated";
        header('Location:service.php');
    }
    else
    {
        $_SESSION['status']="your data is  not updated";
        header('Location:service.php');

    }

}


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
                    <label> BOOKING ID </label>
                    <input type="text" name="id" VALUE="<?php  echo $row['id']?>" class="form-control" placeholder="id">
                </div>
                <div class="form-group">
                    <label> Location </label>
                    <input type="text" name="location" VALUE="<?php  echo $row['location']?>" class="form-control" placeholder="id">
                </div>
                <div class="form-group">
                    <label> address </label>
                    <input type="text" name="address" VALUE="<?php  echo $row['address']?>" class="form-control" placeholder="id">
                </div>
                <div class="form-group">
                    <label> Vehcile Type </label>
                    <input type="text" name="vtype" VALUE="<?php  echo $row['vtype']?>" class="form-control" placeholder="id">
                </div>
                <div class="form-group">
                    <label>Vehcile Name</label>
                    <input type="text" name="vname" VALUE="<?php  echo $row['vname']?>" class="form-control" placeholder="id">
                </div>
                <div class="form-group">
                    <label> Customer Name </label>
                    <input type="text" name="cname" VALUE="<?php  echo $row['cname']?>" class="form-control" placeholder="id">
                </div>
                <div class="form-group">
                    <label> Email Id </label>
                    <input type="text" name="email" VALUE="<?php  echo $row['email']?>" class="form-control" placeholder="id">
                </div>
                <div class="form-group">
                    <label> Phone Number </label>
                    <input type="tel" name="pnumber" VALUE="<?php  echo $row['pnumber']?>" class="form-control" placeholder="id">
                </div>
                <div class="form-group">
                    <label> Complaint </label>
                    <input type="text" name="complaint" VALUE="<?php  echo $row['complaint']?>" class="form-control" placeholder="id">
                </div>
                 <div class="form-group">
                    <label> Model </label>
                    <input type="text" name="model" VALUE="<?php  echo $row['model']?>" class="form-control" placeholder="id">
                </div>
                <div class="form-group">
                    <label> Date </label>
                    <input type="text" name="date" VALUE="<?php  echo $row['date']?>" class="form-control" placeholder="id">
                </div>
                <div class="modal-footer">
                <a href="service.php" class="btn btn-danger">Cancel</a>
                <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
                </div>

                <?php
            }
                }
?>
                </form>
</div>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>
