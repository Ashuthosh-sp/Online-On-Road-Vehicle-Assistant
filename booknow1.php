<?php
include 'header.php';
?>
<?php
$location = "";
$vname = "";
if (isset($_POST['submit'])) {
    $location = $_POST['location'];
    $address = $_POST['address'];
    $vtype = $_POST['q'];
    $vname = $_POST['c'];
    $cname = $_SESSION['USER_NAME'];
    $email = $_SESSION['EMAIL_ID'];
    $pnumber = $_SESSION['PHONE_NO'];
    $complaint = $_POST['complaint'];
    $userid = $_SESSION['USER_ID'];
    $model = $_POST['model'];
    // $qry="SELECT * from user where username=$cname";
    // $rslt=mysqli_query($con,$qry)
    $result = mysqli_query($con, "INSERT into booking(uid,location,address,vtype,vname,cname,email,pnumber,complaint,model,date)VALUES('$userid','$location','$address','$vtype','$vname','$cname','$email','$pnumber','$complaint','$model',current_timestamp())");
    if ($result) {
        {
            echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
                </script>
                <script>
                window.onload = function swal() {
                Swal.fire({
                    icon: \'success\',
                    title: \'Done\',
                    text: \'Booking Successfull!\',
            })
        };
        </script>';
            echo '<meta http-equiv="refresh" content="1.5; URL=\'home.php\'" />';
        }
    } else {
        echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
        </script>
        <script>
        window.onload = function swal() {
        Swal.fire({
            icon: \'Error\',
            title: \'OOps!\',
            text: \'Booking  is Not Successfull!\',
    })
};
</script>';
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Book Vehicle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="booknow.css" />
    <!-- popup css -->
    <link rel="stylesheet" href="popup.css">


</head>

<body>
    <div class="popup-screen">
        <div class="popup-box">
            <i class="fas fa-times close-btn"></i>
            <h2>Please Note</h2>
          <h3> <p> Our Service is available only to limited locations.Please select the location which is present in the List</p></h3>
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
                }, 2000); //Popup the screen in 02 seconds after the page is loaded.
            });

            closeBtn.addEventListener("click", () => {
                popupScreen.classList.remove("active"); //Close the popup screen on click the close button.
                //Create a cookie for a day (to expire within a day) on click the close button.
            });
            die();
        </script>

    </div>
    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
        <div class="container">
            <div class="book" style="margin-top:50px ;">
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
                            <span class="flaticon-taxi"></span>
                            <select name="q" onchange="e()" id="q">
                        <option>Select vehicle type</option>
                     <?php
                $query = "SELECT * FROM vtype ";
                $query_run = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($query_run)) {
                ?>
                    <option value="<?php echo $row['type'] ?> "><?php echo  $row['type'] ?></option>
                <?php
                }
                ?>
                </select>
                <input type="text" id="value">
                <input type="text" id="text">
                    </div>
                    <div class="inpbox full">
                        <span class="flaticon-taxi"></span>
                        <!-- car -->
                        <select id="n"><option>Please select vehicle type first</option></select>
                    <select name="c"  id="c" style="display:none">
                    <option>select car</option>
                    <?php
                $query = "SELECT * FROM vname where vtid='1'  ";
                $query_run = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($query_run)) {
                ?>
                    <option value="<?php echo $row['vname'] ?> "><?php echo  $row['vname'] ?></option>
                <?php
                }
                ?>
                </select>
                                      <!--  -->

                                      <!-- bike -->
                    <select name="bi"  id="bi" style="display:none">
            <option>select bike </option>
                <?php
                $query = "SELECT * FROM vname where vtid='2' ";
                $query_run = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($query_run)) {
                ?>
                    <option value="<?php echo $row['vname'] ?> "><?php echo  $row['vname'] ?></option>
                <?php
                }
                ?>
                </select>
                
                                      <!--  -->
                                       <!-- truck -->
                    <select name="t"  id="t" style="display:none">
            <option>select Truck</option>
                <?php
                $query = "SELECT * FROM vname where vtid='4'";
                $query_run = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($query_run)) {
                ?>
                    <option value="<?php echo $row['vname'] ?> "><?php echo  $row['vname'] ?></option>
                <?php
                }
                ?>
                </select>
                
                                      <!--  -->
                                       <!-- bus -->
                    <select name="b"  id="b" style="display:none">
            <option>select Bus </option>
                <?php
                $query = "SELECT * FROM vname where vtid='3'  ";
                $query_run = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($query_run)) {
                ?>
                    <option value="<?php echo $row['vname'] ?> "><?php echo  $row['vname'] ?></option>
                <?php
                }
                ?>
                </select>
                    </div>
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
    <div class="inpbox">
        <span class="flaticon-globe"></span>
        <input type="text" placeholder="Your Complaint" id="complaint" name="complaint" required>
    </div>



    <button class="subt" name="submit">Book</button>


    </div>
    </div>
    </div>
    </form>
            </form>
<script>
    function e(){
var select = document.getElementById('q');
				var option = select.options[select.selectedIndex];
				document.getElementById('value').value = option.value;
				document.getElementById('text').value = option.text; 
                document.getElementById('value').style.display="none";
                document.getElementById('text').style.display="none";
                if(document.getElementById('text').value=="car")
				{
                document.getElementById('n').style.display="none";
                document.getElementById('c').style.display="block"; 
                document.getElementById('bi').style.display="none";               
                document.getElementById('b').style.display="none";
                document.getElementById('t').style.display="none";
                } 

                else if(document.getElementById('text').value=="two wheeler"){
                    document.getElementById('n').style.display="none";
                    document.getElementById('bi').style.display="block";
                    document.getElementById('c').style.display="none";               
                document.getElementById('b').style.display="none";
                document.getElementById('t').style.display="none";
                }   

                else if(document.getElementById('text').value=="truck"){
                    document.getElementById('n').style.display="none";
                    document.getElementById('t').style.display="block";
                    document.getElementById('bi').style.display="none";               
                document.getElementById('b').style.display="none";
                document.getElementById('c').style.display="none";
                } 

                     else if(document.getElementById('text').value=="bus"){
                    document.getElementById('n').style.display="none";
                    document.getElementById('b').style.display="block";
                    document.getElementById('bi').style.display="none";               
                document.getElementById('t').style.display="none";
                document.getElementById('c').style.display="none";
                    
                } 
    }
    e();
</script>

    </body>
</html>
