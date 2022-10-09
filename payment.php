    <?php
    require('../hellomechanic/login/config.php');
    if (isset($_GET['uid']) && $_GET['uid'] != '') {
        $uid = get_safe_value($con, $_GET['uid']);
        $res = mysqli_query($con, "SELECT * from mechbooking where uid='$uid'");
        $check = mysqli_num_rows($res);
        if ($check > 0) {
            $row = mysqli_fetch_assoc($res);
            $name = $row['cname'];
            $amount = $row['total_cost'];
        } else {
            header('Location:home.php');
        }
    }
 
 
    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $amount = $_POST['amount'];
        $cardname = $_POST['cardname'];
        $cardnumber = $_POST['cardno'];
        $cvv = $_POST['cvv'];
        $cardtype = $_POST['radio'];
        $date = $_POST['date'];

        $qy = "INSERT INTO payment(uid,name,cardname,cardno,ctype,amount,date,cvv,status)VALUES('24','$name','$cardname','$cardnumber','$cardtype','$amount','$date','$cvv','1')";
        $result = mysqli_query($con, $qy);

        if ($result) 
        {
            echo '<script src="//cdn.jsdelivr.net/npm/sweetalert2@11">
                </script>
                <script>
                window.onload = function swal() {
                Swal.fire({
                    icon: \'success\',
                    title: \'Done\',
                    text: \'Payment Successfull!\',
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
                    icon: \'Error\',
                    title: \'Done\',
                    text: \'Payment Unsuccessfull!\',
            })
        };
        </script>';
            echo '<meta http-equiv="refresh" content="1.5; URL=\'home.php\'" />';
    
        }
    }



    ?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Checkout Card</title>
        <link href='https://www.soengsouy.com/favicon.ico' rel='icon' type='image/x-icon' />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <!-- library validate -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>
        <!-- style css -->
        <link rel="stylesheet" href="payment.css">
        <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
               
      
        <!-- style css -->
    </head>

    <body>
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
                        <div class="row">
                            <div class="col-50">
                                <h3>Payment Details</h3>
                                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                                <input type="text" id="name" name="name" VALUE="<?php echo $name ?>" readonly="readonly">
                                <label for="city"><i class="fa fa-money"></i> Amount</label>
                                <input type="text" id="amount" name="amount" VALUE="<?php echo $amount ?>" readonly="readonly">
                            </div>

                            <div class="col-50">
                                <h3>Payment</h3>
                                <label for="fname">Accepted Cards</label>
                                <div class="icon-container">
                                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                                </div>

                                <label for="cname">Name on Card</label>
                                <input type="text" id="cardname" name="cardname" placeholder="Enter The Card Name" required>
                                <label for="cname">Select the Card Type</label>
                                <input type="radio" name="radio" value="Credit Card">Credit Card
                                <input type="radio" name="radio" value="Debit Card"> Debit Card
                                <br>
                                <label for="ccnum">Card number</label>
                                <input type="text" id="cardno" name="cardno" placeholder="Enter The Card Number" required minlength="16" maxlength="16">
                                <div class="row">
                                    <div class="col-50">
                                        <label for="expyear">Exp Month and Year</label>
                                        <input type="month" placeholder="Select Month and Year" id="date" name="date" min="2021-10" value="2021-10" max="2035-10" value="<?php echo $date ?>" required>
                                    </div>
                                    <div class="col-50">
                                        <label for="cvv">CVV</label>
                                        <input type="text" id="cvv" name="cvv" placeholder="Enter The CVV" required maxlength="3" minlength="3">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <label>
                            <input type="submit" value="Pay" class="btn" name="submit" value="submit" id= "submit">
                            
                    </form>
                </div>
            </div>



        </div>
        <!-- script validate js -->
        <script>
            $('#validate').validate({
                roles: {
                    fullname: {
                        required: true,
                    },
                    email: {
                        required: true,
                    },
                    address: {
                        required: true,
                    },
                    city: {
                        required: true,
                    },
                    state: {
                        required: true,
                    },
                    zip: {
                        required: true,
                    },
                    cardname: {
                        required: true,
                    },
                    cardnumber: {
                        required: true,
                    },
                    expmonth: {
                        required: true,
                    },
                    expyear: {
                        required: true,
                    },
                    cvv: {
                        required: true,
                    },

                },
                messages: {
                    fullname: "Please input full name*",
                    email: "Please input email*",
                    city: "Please input city*",
                    address: "Please input address*",
                    state: "Please input state*",
                    zip: "Please input address*",
                    cardname: "Please input card name*",
                    cardnumber: "Please input card number*",
                    expmonth: "Please input exp month*",
                    expyear: "Please input exp year*",
                    cvv: "Please input cvv*",
                },
            });  
            </script>
        
           
    
    </body>

    </html>