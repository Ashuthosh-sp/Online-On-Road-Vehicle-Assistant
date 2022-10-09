<?php
include('includes/header.php');
include('includes/navbar.php');
?>

<?php
if (isset($_POST['updatebtn'])) {
    $id = $_POST['id'];
    $service = $_POST['serviceworked'];
    $adspare = $_POST['additionalspare'];
    $complaint = $_POST['complaint'];

    $query = "UPDATE `mechbooking` SET service_hour='$service',spare_parts='$adspare',mcomplaint='$complaint' where id='$id'";

    
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
        </script>
        <script>
        window.onload = function swal() {
        Swal.fire({
            icon: \'success\',
            title: \'Done\',
            text: \'The Service details is sent to Admin!\',
    })
};
</script>';
    echo '<meta http-equiv="refresh" content="1.5; URL=\'service.php\'" />';
    } else {

        echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
        </script>
        <script>
        window.onload = function swal() {
        Swal.fire({
            icon: \'error\',
            title: \'OOps!\',
            text: \'The Service details is not assigned to Admin!\',
    })
};
</script>';
    echo '<meta http-equiv="refresh" content="1.5; URL=\'edit.php\'" />';
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
    if (isset($_POST['edit_btn'])) {
        $id = $_POST['edit_id'];
        $query = "SELECT * FROM booking WHERE id= '$id'";
        $query_run = mysqli_query($con, $query);
        foreach ($query_run as $row) {
    ?>

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group">
                    <label>Booking ID </label>
                    <input type="text" name="id" VALUE="<?php echo $row['id'] ?>" class="form-control" placeholder="" readonly="">
                </div>
                <div class="form-group">
                    <label> Service hour worked </label>
                    <div>
                    <select id="serviceworked" name="serviceworked" required class="btn btn-secondary dropdown-toggle">
                        <option value="">Select Hours Worked</option>
                        <option value="0.5">Half an Hour</option>
                        <option value="1">One Hour</option>
                        <option value="1.5">One and Half Hour</option>
                        <option value="2">Two hour</option>
                        <option value="2.5">Two and half hour</option>                       
                        <option value="3">Three hour</option>
                    </select>
                    </div>
                </div>

                <div class="form-group">
                    <label> Additional Spare </label>
                    <textarea name="additionalspare" id="additionalspare" cols="30" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label> Complaint </label>
                    <textarea name="complaint" id="complaint" cols="30" rows="10" class="form-control"></textarea>
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
<script>
    CKEDITOR.replace('additionalspare');
</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>