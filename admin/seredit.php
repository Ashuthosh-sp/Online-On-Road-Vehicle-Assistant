<?php
include('includes/header.php');
include('includes/navbar.php');


?>

<?php
$total_cost='';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "SELECT * from mechbooking where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $custname = $row['cname'];
        $email = $row['email'];
        $custphone = $row['pnumber'];
        $service_hour = $row['service_hour'];
        $service_cost = $row['service_cost'];
        $spare_parts = $row['spare_parts'];
        $spare_cost = $row['spare_cost'];
        $total_cost = $row['total_cost'];
    } else {
    }
}
if (isset($_POST['updatebtn'])) {
    $custname = $_POST['name'];
    $custemail = $_POST['email'];
    $custphone = $_POST['phone'];
    $service_hour = $_POST['servicehour'];
    $service_cost = $_POST['servicecost'];
    $spare_parts = $_POST['spareparts'];
    $spare_cost = $_POST['sparecost'];
    $total_cost = $_POST['totalcost'];
    
   
    $query = "UPDATE `mechbooking` SET cname='$custname',email='$email',pnumber='$custphone',service_hour='$service_hour',service_cost='$service_cost',spare_parts='$spare_parts',spare_cost='$spare_cost',total_cost=$total_cost WHERE id='$id'";
    $query_run = mysqli_query($con, $query);

    $query1 = "UPDATE `booking` SET status='1' WHERE id='$id'";
    $query2 = mysqli_query($con, $query1); 
    echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
    </script>
    <script>
    window.onload = function swal() {
    Swal.fire({
        icon: \'success\',
        title: \'Done\',
        text: \'The Service details are Filled!\',
})
};
</script>';
echo '<meta http-equiv="refresh" content="1.5; URL=\'billgenerate.php\'" />';
    die();
}


?>



<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Booking Requested
    </div>
</div>
<div class="card-body">



    <form action="" method="POST">
        <div class="form-group">
            <label> ID </label>
            <input type="text" name="id" VALUE="<?php echo $row['id'] ?>" class="form-control" placeholder="id" readonly="readonly">
        </div>
        <div class="form-group">
            <label> Customer Name </label>
            <input type="text" name="name" VALUE="<?php echo  $custname ?>" class="form-control" placeholder="Customer Name">
        </div>
        <div class="form-group">
            <label> Customer Email </label>
            <input type="text" name="email" VALUE="<?php echo $email ?>" class="form-control" placeholder="Customer Email">
        </div>
        <div class="form-group">
            <label> Customer Phone </label>
            <input type="text" name="phone" VALUE="<?php echo $custphone ?>" class="form-control" placeholder="Customer Phone">
        </div>
        <div class="form-group">
            <label>Sevice Hour Worked</label>
            <input type="text" name="servicehour" VALUE="<?php echo $service_hour ?>" class="form-control" placeholder="Sevice Hour Worked">
        </div>
        <div class="form-group">
            <label> Service cost </label>
            <input type="text" name="servicecost" VALUE="<?php echo $service_cost ?>" class="form-control" placeholder="Service cost">
        </div>
        <div class="form-group">
            <label> Spare Parts </label>
            
            <input type="text" name="spareparts" VALUE="<?php echo $spare_parts ?>" class="form-control" placeholder="Spare Parts" readonly="readonly">
        </div>
        <div class="form-group">
            <label> Spare Cost </label>
            <textarea name="sparecost" id="sparecost" cols="30" rows="10" VALUE="<?php echo $spare_cost ?>" class="form-control"></textarea>
            </div>
        <div class="form-group">
            <label> Total Cost </label>
            <input type="text" name="totalcost" VALUE="<?php echo $total_cost ?>" class="form-control" placeholder="Total Cost">
        </div>
        <div class="modal-footer">
            <a href="service.php" class="btn btn-danger">Cancel</a>
            <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
        </div>

        <?php

        ?>
    </form>
</div>
<script>
    CKEDITOR.replace('sparecost');
</script>
<?php
include('includes/scripts.php');
include('includes/footer.php');
?>