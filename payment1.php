<?php

require('../hellomechanic/login/config.php');
error_reporting(0);
?>
<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $cardnumber = $_POST['cardnumber'];   
        $email=$_POST['email'];
        $amount=$_POST['amount'];
        $cvv=$_POST['cvv'];
        $qy = "INSERT INTO payment(name,email,address,cardno, amount,date,cvv)VALUES('$name','$email','$address','$cardno','$amount','$date','$cvv')";
                $result = mysqli_query($con, $qy);
                                    if ($result) {
                                        
                               header('Location:payyes.php');
                               ?>
                                <?php
                             
                }
         else {
            ?>
                            <script>
                                alert("payemnt not successful");
                            </script>
                        <?php
        }
        }


?>  
<!DOCTYPE html>
<html lang="en">

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
        <script src="payment.js"></script>
        <style>
            @import "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";
body {
    background: #ddd;
    font-family: "Raleway";
}

.center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}

.popup {
    width: 350px;
    height: 280px;
    padding: 30px 20px;
    background: #f5f5f5;
    border-radius: 10px;
    box-sizing: border-box;
    z-index: 2;
    text-align: center;
    opacity: 0;
    top: -200%;
    transform: translate(-50%, -50%) scale(0.5);
    transition: opacity 300ms ease-in-out, top 1000ms ease-in-out, transform 1000ms ease-in-out;
}

.popup.active {
    opacity: 1;
    top: 50%;
    transform: translate(-50%, -50%) scale(1);
    transition: transform 300ms cubic-bezier(0.18, 0.89, 0.43, 1.19);
}

.popup .icon {
    margin: 5px 0px;
    width: 50px;
    height: 50px;
    border: 2px solid #34f234;
    text-align: center;
    display: inline-block;
    border-radius: 50%;
    line-height: 60px;
}

.popup .icon i.fa {
    font-size: 30px;
    color: #34f234;
}

.popup .title {
    margin: 5px 0px;
    font-size: 30px;
    font-weight: 600;
}

.popup .description {
    color: #222;
    font-size: 15px;
    padding: 5px;
}

.popup .dismiss-btn {
    margin-top: 15px;
}

.popup .dismiss-btn button {
    padding: 10px 20px;
    background: #111;
    color: #f5f5f5;
    border: 2px solid #111;
    font-size: 16px;
    font-weight: 600;
    outline: none;
    border-radius: 10px;
    cursor: pointer;
    transition: all 300ms ease-in-out;
}

.popup .dismiss-btn button:hover {
    color: #111;
    background: #f5f5f5;
}

.popup>div {
    position: relative;
    top: 10px;
    opacity: 0;
}

.popup.active>div {
    top: 0px;
    opacity: 1;
}

.popup.active .icon {
    transition: all 300ms ease-in-out 250ms;
}

.popup.active .title {
    transition: all 300ms ease-in-out 300ms;
}

.popup.active .description {
    transition: all 300ms ease-in-out 350ms;
}

.popup.active .dismiss-btn {
    transition: all 300ms ease-in-out 400ms;
}
        </style>
    </head>

    <body>
        <div class="row">
            <div class="col-75">
                <div class="container">
                    <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST"> <center>
                        <div class="row">
                        

                             <div class="col-50" >
                                <h3>Payment</h3>
                                <label for="fname">Accepted Cards</label>
                                <div class="icon-container">
                                    <i class="fa fa-cc-visa" style="color:navy;"></i>
                                    <i class="fa fa-cc-amex" style="color:blue;"></i>
                                    <i class="fa fa-cc-mastercard" style="color:red;"></i>
                                    <i class="fa fa-cc-discover" style="color:orange;"></i>
                                </div>
                                <label for="cname">Name on Card</label>
                                <input type="text" id="cname" name="name"  required>
                                <label for="email"> Email</label>
                                <input type="text" id="email" name="email"  required>
                                <label for="adr"> Address</label>
                                <input type="text" id="adr" name="address"  required>
                                <label for="ccnum">Credit card / Debit card number</label>
                                <input type="text" id="ccnum" name="cardnumber"  required>
                                <label for="adr"> Amount</label>
                                <input type="text" id="amount" name="amount"  required>
                                
                              
                               <div class="row">
                                    <div class="col-50">
                                        <label for="expyear">Exp Year</label>
                                        <input type="text" id="datepicker" required>
                                    </div>
                                    <script>
                                        $(function() {
                                            $("#datepicker").datepicker();
                                            $("#datepicker").on("change",function(){
                                                var selected = $(this).val();
                                                alert(selected);
                                            });
                                        });
                                        </script>
                                    <div class="col-50">
                                        <label for="cvv">CVV</label>
                                        <input type="text" id="cvv" name="cvv" required>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <label>
                   
                        <input type="submit" value="Pay" class="btn" name="submit" id="submit">
                        
                    </form></center>
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