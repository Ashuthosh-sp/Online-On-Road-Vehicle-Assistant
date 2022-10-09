<?php
require('../hellomechanic/login/config.php');
if (!isset($_SESSION['USER_NAME'])) {
    header("location:/hellomechanic/login/index.php");
}
?>
<?php
$location = "";
$vname = "";
if (isset($_POST['submit'])) {
    $location = $_POST['location'];
    $address = $_POST['address'];
    $vtype = $_POST['main_menu'];
    $vname = $_POST['sub_menu'];
    $cname = $_SESSION['USER_NAME'];
    $email = $_SESSION['EMAIL_ID'];
    $pnumber = $_SESSION['PHONE_NO'];
    $complaint = $_POST['complaint'];
    $userid = $_SESSION['USER_ID'];
    $model = $_POST['model'];
    // $qry="SELECT * from user where username=$cname";
    // $rslt=mysqli_query($con,$qry)
    $result = mysqli_query($con, "INSERT into booking(uid,location,address,vtype,vname,cname,email,pnumber,complaint,model,status,date)VALUES('$userid','$location','$address','$vtype','$vname','$cname','$email','$pnumber','$complaint','$model','0',current_timestamp())");
    if ($result) {
?>
        <script>
            alert("Booking SuccessFul");
            window.location = "home.php";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("Booking Not successful");
        </script>
<?php
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Book Vehicle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="booknow.css" />
    <!-- popup css -->
    <link rel="stylesheet" href="popup.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">


</head>

<body>
    <div class="popup-screen">
        <div class="popup-box">
            <i class="fas fa-times close-btn"></i>
            <h2>Please Note</h2>
            <p> Our Service is available only to limited locations.Please select the location which is present in the List</p>
            <button class="btn" id="Cbook">Book Now</button>
        </div>

        <script type="text/javascript">
            const popupScreen = document.querySelector(".popup-screen");
            const popupBox = document.querySelector(".popup-box");
            const closeBtn = document.querySelector(".close-btn");
            document.getElementById("Cbook").addEventListener("click", function() {
                document.getElementsByClassName("popup-screen")[0].classList.remove("active");
            });
            window.addEventListener("load", () => {
                setTimeout(() => {
                    popupScreen.classList.add("active");
                }, 1000); //Popup the screen in 02 seconds after the page is loaded.
            });

            closeBtn.addEventListener("click", () => {
                popupScreen.classList.remove("active"); //Close the popup screen on click the close button.
                //Create a cookie for a day (to expire within a day) on click the close button.
            });
        </script>

    </div>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="container">
            <div class="book">
                <div class="description">

                    <h1><strong>Book</strong> Here</h1>
                    <p>
                        Please fill the form correctly without any mistakes.
                    </p>
                    <div class="quote">
                        <p>
                            We want simple survey to contact you. our team provide quick response aftre the booking has been done by you, we provide safe payment methods.
                        </p>
                    </div>
                    <ul>
                        <li>Super reliable service</li>
                        <li>24/7 customer service</li>
                        <li>Quick response</li>
                        <li>User friendly</li>
                        <li>Simple methods to book</li>

                    </ul>
                </div>
                <div class="form">
                    <div class="inpbox full">
                        <span class="flaticon-taxi"></span>
                        <select name="location">
                            <option value="">Select Location</option>
                            \
                            <?php
                            $query = "SELECT * FROM location ";
                            $query_run = mysqli_query($con, $query);
                            while ($row = mysqli_fetch_array($query_run)) {
                            ?>
                                <option value="<?php echo $row[0] ?> "><?php echo  $row[0] ?>

                                </option>
                            <?php
                            }
                            ?>

                        </select>
                    </div>
                    <div class="inpbox">
                        <span class="flaticon-globe"></span>
                        <input type="text" placeholder="Enter your address" id="address" name="address" required>
                    </div>
                    <div class="inpbox full">
                        <form action="" method="POST">
                            <span class="flaticon-taxi"></span>
                            <select id="main_menu" name="main_menu" required>
                                <option value="">Select Vehicle Type</option>
                                <option value="car">Car</option>
                                <option value="twowheeler">two wheeler</option>
                                <option value="truck">truck</option>
                                <option value="bus">Bus</option>
                            </select>
                    </div>
                    <div class="inpbox full">
                        <span class="flaticon-taxi"></span>
                        <select id="sub_menu" name="sub_menu">
                            <option value="">Select Vehicle Brand</option>
                            <option value="Ashok Leyland Truck">Ashok Leyland Truck</option>
                            <option value="Tata">Tata</option>
                            <option value="Ashok Layland Bus">Ashok Leyland Bus</option>
                            <option value="Marcopolo">Marcopolo</option>
                            <option value="Swift">Swift</option>
                            <option value="BMW">BMW</option>
                            <option value="Gixxer">Gixxer</option>
                            <option value="Yamaha FZ">Yamaha FZ</option>
                        </select>
                    </div>
    </form>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
                                <script>
                                $(document).ready(function(){
                                $('#main_menu').change(function(){
                                var vtid= $(this).val();
                                $.ajax({
                                url: "action.php",
                                method: "POST",
                                data:{vtID:vtid},
                                success: function(data){
                                $("#sub_menu").html(data);
                                }
                                });
                                });
                            });
                                </script> -->
    <div class="inpbox full">
        <span class="flaticon-taxi"></span>
        <select id="model" name="model" required>
            <option value="">Select Model</option>
            <option value="1990-1995">1990-1995</option>
            <option value="1996-2000">1996-2000</option>
            <option value="2001-2005">2001-2005</option>
            <option value="2006-2010">2006-2010</option>
            <option value="2011-2015">2011-2015</option>
            <option value="2016-2021">2016-2021</option>
        </select>
    </div>
    <!-- <div class="inpbox">
                            <span class="flaticon-globe"></span>
                            <input type="text" placeholder="Enter your Name" id="cname"  name="cname"required>
                        </div>
                        <div class="inpbox">
                            <span class="flaticon-globe"></span>
                            <input type="text" placeholder="Enter your Email" id="email" name="email" required>
                        </div> -->
    <!-- <div class="inpbox">
                            <span class="flaticon-globe"></span>
                            <input type="text" placeholder="Enter your Phone Number" id="pnumber" name="pnumber" required>
                        </div> -->
    <div class="inpbox">
        <span class="flaticon-globe"></span>
        <input type="text" placeholder="Your Complaint" id="complaint" name="complaint" required>
    </div>
    <button class="subt" name="submit">Book</button>
    <a href="home.php"><button class="subt" type="cancel" >Cancel</button></a>
    </div>
    </div>
    </div>
    </div>
    </div>
    </form>
  
</body>

</html>