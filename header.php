<?php
require('../hellomechanic/login/config.php');
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

        <a href="home.php" class="logo"><span>HELLO</span>Mechanic....</a>

        <nav class="navbar">
            <a href="home.php">home</a>
            <?php
            if (isset($_SESSION['USER_NAME'])) {
            ?>
                <a href="booknow1.php">Book</a>
            <?php
            } else {
                header("LOCATION:/hellomechanic/login/index.php");
            } ?>
            <a href="vbook.php">Bookings</a>
            
        </nav>

        <div class="icons">
            <a href="logout.php" class="logo"><?php echo $_SESSION['USER_NAME']; ?></a>
            <a href="login/index.php"><i class="fas fa-user" id="login-btn"></a></i>
        </div>

    </header>