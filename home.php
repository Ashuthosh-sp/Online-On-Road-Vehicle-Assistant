<?php
require('../hellomechanic/login/config.php');
$uid = $_SESSION['USER_ID'];
$query = " SELECT * FROM user where id=$uid";
$query_run = mysqli_query($con, $query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>complete garage</title>

    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="log.css">

</head>

<body>

    <!-- header section starts  -->

    <header>

        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="#" class="logo"><span>HELLO</span>Mechanic....</a>

        <nav class="navbar">
            <a href="#home">home</a>
            <?php
            if (isset($_SESSION['USER_NAME'])) {
            ?>
                <a href="booknow1.php">Book</a>
            <?php
            } else {
                header("LOCATION:/hellomechanic/login/index.php");
            } ?>
            <a href="vbook.php">Bookings</a>
            <a href="#services">services</a>
            <a href="#gallery">Sight</a>
            <?php
            if (mysqli_num_rows($query_run) > 0) {
              while ($row = mysqli_fetch_assoc($query_run)) {
            ?>
            <a href="feed.php?uid=<?php echo $row['id']; ?>">Feedback</a>
            <?php
              }}
              ?>
        </nav>

        <div class="icons">
            <a href="logout.php" class="logo"><?php echo $_SESSION['USER_NAME']; ?></a>
                <i class="fas fa-user" id="login-btn"></i>

    <form action="" class="search-bar-container">
        <input type="search" id="search-bar" placeholder="search here...">
        <label for="search-bar" class="fas fa-search"></label>
    </form>

        </div>

    </header>

    <!-- header section ends -->

   <!-- login form container  -->

<div class="login-form-container">

<i class="fas fa-times" id="form-close"></i>

<form action="">
    <h3>login</h3>
    <input type="email" class="box" placeholder="enter your email">
    <input type="password" class="box" placeholder="enter your password">
    <input type="submit" value="login now" class="btn">
    <input type="checkbox" id="remember">
    <label for="remember">remember me</label>
    <p>forget password? <a href="#">click here</a></p>
    <p>don't have and account? <a href="#">register now</a></p>
</form>

</div>


    <!-- home section starts  -->

    <section class="home" id="home">

        <div class="content">
            <h3>We are here to give good service to you....</h3>
            <p>Enjoy the expireance</p>


            <div class="controls">
                <span  data-src="images/vid-A.mp4"></span>
               
            </div>

         <div class="video-container">
                <video src="images/vid-A.mp4" id="video-slider" loop autoplay muted></video>
            </div>

    </section>

    <!-- home section ends -->

    <!-- book section starts  -->


    <!-- packages section starts  -->



    <!-- packages section ends -->

    <!-- services section starts  -->

    <section class="services" id="services">

        <h1 class="heading">
            <span>s</span>
            <span>e</span>
            <span>r</span>
            <span>v</span>
            <span>i</span>
            <span>c</span>
            <span>e</span>
            <span>s</span>
        </h1>

        <div class="box-container">

            <div class="box">
                <i class="fas fa-car"></i>
                <h3>Car </h3>
                <p>We provides all types of services for all types of cars.</p>
            </div>
            <div class="box">
                <i class="fas fa-motorcycle"></i>
                <h3>Two wheeler</h3>
                <p>We provides all types of services for all types of Two wheelers.</p>
            </div>
            <div class="box">
                <i class="fas fa-truck"></i>
                <h3>Truck </h3>
                <p>We provides all types of services for all types of Trucks.</p>
            </div>
            <div class="box">
                <i class="fas fa-bus"></i>
                <h3>Bus </h3>
                <p>We provides all types of services for all types of Bus.</p>
            </div>


        </div>

    </section>

    <!-- services section ends -->

    <!-- gallery section starts  -->

    <section class="gallery" id="gallery">

        <h1 class="heading">
            <span>O</span>
            <span>u</span>
            <span>r</span>
            <span class="space"></span>
            <span>G</span>
            <span>a</span>
            <span>r</span>
            <span>a</span>
            <span>g</span>
            <span>e</span>
            <span class="space"></span>
            <span>S</span>
            <span>i</span>
            <span>g</span>
            <span>h</span>
            <span>t</span>
        </h1>

        <div class="box-container">

            <div class="box">
                <img src="https://www.pitcrew.co.in/blog/wp-content/uploads/2017/08/car-garage-gurgaon.jpg" alt="">
                <div class="content">

                    <p>Mechanic servicing the car.</p>

                </div>
            </div>
            <div class="box">
                <img src="https://i.pinimg.com/736x/69/15/0f/69150f5756974f604b8e6b3b7ee2890b.jpg" alt="">
                <div class="content">

                    <p>Mechanic repairing the truck.</p>

                </div>
            </div>
            <div class="box">
                <img src="https://res.cloudinary.com/twenty20/private_images/t_watermark-criss-cross-10/v1543860624000/photosp/fea69c5e-75b7-4b72-81e9-56e35695e0b4/stock-photo-mechanics-repair-shop-car-repair-car-dealership-auto-mechanic-auto-repair-vehicle-repair-car-mechanic-garage-mechanic-fea69c5e-75b7-4b72-81e9-56e35695e0b4.jpg" alt="">
                <div class="content">

                    <p>Mechanic modifying the bike.</p>

                </div>
            </div>
            <div class="box">
                <img src="https://imgmedia.lbb.in/media/2019/05/5cdee2f873730b3ab9d47a48_1558110968045.jpg" alt="">
                <div class="content">

                    <p>Mechanic repairing the bike.</p>

                </div>
            </div>
            <div class="box">
                <img src="https://image.shutterstock.com/image-photo/auto-service-trucks-door-handles-260nw-660676117.jpg" alt="">
                <div class="content">

                    <p>Body working is on process.</p>

                </div>
            </div>
            <div class="box">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBPkkkflEcTjwVX5h699lzXbSI4bRifGqSy2rxpEQWz_QbcqSBJ2Zd_KikT4uMg_6Rgis&usqp=CAU" alt="">
                <div class="content">

                    <p>Gear box working is on process of truck.</p>

                </div>
            </div>
            <div class="box">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTdSsT80e_PQI1KcviulpH2WEHf6Oinw4qTYg&usqp=CAU" alt="">
                <div class="content">

                    <p>Mechanic repairing the bus.</p>

                </div>
            </div>
            <div class="box">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSJIvDrKR5d_XhlnSepRuQBMs_Pv06j0_UDKuYTv98t5gAuax-nLPTn6K1Yy9754pLfLGc&usqp=CAU" alt="">
                <div class="content">

                    <p>Mechanic repairing the car.</p>


                </div>
            </div>
            <div class="box">
                <img src="https://media.istockphoto.com/photos/buses-inside-bus-station-picture-id940491528?k=20&m=940491528&s=612x612&w=0&h=Uitq40ACcw73ghTOd6Jk3RibW5RqvhJCnrzDOWfygO0=" alt="">
                <div class="content">

                    <p>body working is on process.</p>

                </div>
            </div>

        </div>

    </section>

    <!-- gallery section ends -->



    <!-- review section ends -->


    <section class="footer">

<div class="box-container">



    <div class="box">
        <h3>quick links</h3>
        <a href="#">home</a>
    </div>
    <div class="box">
        <h3>follow us</h3>
        <a href="#">facebook</a>
        <a href="#">instagram</a>
        <a href="#">twitter</a>

    </div>

</div>

<h1 class="credit"> HELLO MECHANIC 2021 All rights reserved! </h1>

</section>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="log.js"></script>

</body>

</html>