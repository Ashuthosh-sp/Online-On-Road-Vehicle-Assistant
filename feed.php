<?php
require('../hellomechanic/login/config.php');
if (isset($_GET['uid']) && $_GET['uid'] != '') {
    $uid = get_safe_value($con, $_GET['uid']);
    $res = mysqli_query($con, "SELECT * from user where id='$uid'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $name = $row['username'];
        $email = $row['email'];
    } else {
        header('Location:home.php');
    }
}
?>
<?php
    if(isset($_POST['submit'])){
        $ratings=$_POST['radio'];
        $comment=$_POST['comments'];
        $name=$_POST['name'];
        $email=$_POST['email'];
        $qy = "INSERT INTO `feedback`(`uid`,`ratings`, `comment`, `name`, `email`, `date`) VALUES ('$uid','$ratings','$comment','$name','$email',current_timestamp())";
                $result = mysqli_query($con, $qy);
                if ($result) {
                    
            echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
            </script>
            <script>
            window.onload = function swal() {
            Swal.fire({
                icon: \'success\',
                title: \'Done\',
                text: \'FeedBack Accepted Successfully!\',
        })
    };
    </script>';
        echo '<meta http-equiv="refresh" content="1.5; URL=\'home.php\'" />';
                }
         else {
                
            echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
            </script>
            <script>
            window.onload = function swal() {
            Swal.fire({
                icon: \'error\',
                title: \'Done\',
                text: \'Couldnt Accept the feedback!\',
        })
    };
    </script>';
        echo '<meta http-equiv="refresh" content="1.5; URL=\'home.php\'" />';
            }
    }

?>  

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Feedback Form </title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link rel="stylesheet" href="feed.css">
    <script src="feed.js"></script>  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <div class="container">
        <div class="imagebg"></div>
        <div class="row " style="margin-top: 50px">
            <div class="col-md-6 col-md-offset-3 form-container">
                <h2>Give Your Feedback</h2>

                <form role="form" method="post" id="reused_form">
                    <div class="row">
                        <div class="col-sm-12 form-group">
                             
                            <label>How do you rate your overall experience?</label>
                            <p>
                                <label class="radio-inline">
                                        <input type="radio" name="radio" value="Bad" >
                                        Bad 
                                    </label>
                                <label class="radio-inline">
                                        <input type="radio" name="radio"  value="Average" >
                                        Average 
                                    </label>
                                <label class="radio-inline">
                                        <input type="radio" name="radio" value="Good" >
                                        Good 
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="radio" value="Excellent" >
                                        Excellent 
                                    </label>
                            </p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <label for="comments"> Comments:</label>
                            <textarea class="form-control" type="textarea" name="comments" id="comments" placeholder="Your Comments" maxlength="6000" rows="7"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 form-group">
                            <label for="name"> Your Name:</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="col-sm-6 form-group">
                            <label for="email"> Email:</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12 form-group">
                            <button type="submit" class=" btn btn-warning btn-block" name="submit">Post </button>
                            <a href="home.php" class=" btn btn-warning btn-block" name="cancel"> Cancel</a>
                        </div>
                    </div>
                </form>
        </div>
    </div>
</body>

</html>