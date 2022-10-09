<?php
include('includes/header.php');
include('includes/navbar.php');
?>
<?php

if (isset($_POST['sendbtn'])) {
    $id = $_POST['id'];
    $uid=$_POST['uid'];
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
    $mid = $_POST['mid'];
    // $query = "UPDATE `mechbooking` SET location='$location',address='$address',vtype='$vtype',vname='$vname',cname='$cname',email='$email',pnumber='$pnumber',complaint='$complaint',model='$model',date='$date' WHERE id='$id'";
    $query = " INSERT INTO `mechbooking`(`id`,`uid`, `location`, `address`, `vtype`, `vname`, `cname`, `email`, `pnumber`, `complaint`, `model`, `date`, `mid`) VALUES ('$id','$uid','$location','$address','$vtype','$vname','$cname','$email','$pnumber','$complaint','$model','$date','$mid')";
    $query1 = " select * from mechanic where id=$mid";
    $query_run = mysqli_query($con, $query);
    $query_run1 = mysqli_query($con, $query1);
    $num = mysqli_num_rows($query_run1);
    if ($num) {
        $row1 = mysqli_fetch_assoc($query_run1);
        $toid = $row1['email'];
        $subject = "Service sent Email";
        $body = "Hi, you have been assigned a service by the admin. Log in to your panel to look after your service";
        $headers = "From: ashu.s.p.2000@gmail.com";
        if (mail($toid, $subject, $body, $headers)) {
            {
                echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
                    </script>
                    <script>
                    window.onload = function swal() {
                    Swal.fire({
                        icon: \'success\',
                        title: \'Done\',
                        text: \'The Service Is assigned to The Mechanic!\',
                })
            };
            </script>';
                echo '<meta http-equiv="refresh" content="1.5; URL=\'service.php\'" />';
            }
            $_SESSION['success'] = "the data is assigned to mechanic";
        } else {
        ?>
            <script>
                alert("the data is not assigned to mechanic");
            </script>
            <?php
            $_SESSION['status'] = "the data is not assigned";
        }
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
    if (isset($_POST['sedit_btn'])) {
        $id = $_POST['sedit_id'];
        $query = "SELECT * FROM booking WHERE id= '$id'";
        $query_run = mysqli_query($con, $query);
        foreach ($query_run as $row) {
    ?>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group">
                    <label> Booking ID </label>
                    <input type="text" name="id" VALUE="<?php echo $row['id'] ?>" class="form-control" placeholder="id" readonly="readonly">
                </div>
                <div class="form-group">
                    <label> User ID </label>
                    <input type="text" name="uid" VALUE="<?php echo $row['uid'] ?>" class="form-control" placeholder="uid" readonly="readonly">
                </div>
                <div class="form-group">
                    <label> Location </label>
                    <input type="text" name="location" VALUE="<?php echo $row['location'] ?>" class="form-control" placeholder="id" readonly="readonly">
                </div>
                <div class="form-group">
                    <label> address </label>
                    <input type="text" name="address" VALUE="<?php echo $row['address'] ?>" class="form-control" placeholder="id" readonly="readonly">
                </div>
                <div class="form-group">
                    <label> Vehcile Type </label>
                    <input type="text" name="vtype" VALUE="<?php echo $row['vtype'] ?>" class="form-control" placeholder="id" readonly="readonly">
                </div>
                <div class="form-group">
                    <label>Vehcile Name</label>
                    <input type="text" name="vname" VALUE="<?php echo $row['vname'] ?>" class="form-control" placeholder="id" readonly="readonly">
                </div>
                <div class="form-group">
                    <label> Customer Name </label>
                    <input type="text" name="cname" VALUE="<?php echo $row['cname'] ?>" class="form-control" placeholder="id"readonly="readonly">
                </div>
                <div class="form-group">
                    <label> Email Id </label>
                    <input type="text" name="email" VALUE="<?php echo $row['email'] ?>" class="form-control" placeholder="id " readonly="readonly">
                </div>
                <div class="form-group">
                    <label> Phone Number </label>
                    <input type="text" name="pnumber" VALUE="<?php echo $row['pnumber'] ?>" class="form-control" placeholder="id" readonly="readonly">
                </div>
                <div class="form-group">
                    <label> Complaint </label>
                    <input type="text" name="complaint" VALUE="<?php echo $row['complaint'] ?>" class="form-control" placeholder="id"readonly="readonly">
                </div> <div class="form-group">
                    <label> Model </label>
                    <input type="text" name="model" VALUE="<?php echo $row['model'] ?>" class="form-control" placeholder="id" readonly="readonly">
                </div>
                <div class="form-group">
                    <label> Date </label>
                    <input type="text" name="date" VALUE="<?php echo $row['date'] ?>" class="form-control" placeholder="id " readonly="readonly">
                </div>
                <div class="form-group">
                    <label> Assign service to employee </label>
                    <br>

                    <select class="btn btn-secondary dropdown-toggle" id="mid" name="mid">
                        <?php
                        $query = "SELECT * FROM mechanic";
                        $query_run = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_array($query_run)) {
                        ?>
                            <option value="<?php echo $row[0] ?> "> Employe name:-<?php echo $row[1] ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
                <div class="modal-footer">
                    <a href="service.php" class="btn btn-danger">Cancel</a>
                    <button type="submit" name="sendbtn" class="btn btn-primary">SEND TO EMPLOYEE</button>
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