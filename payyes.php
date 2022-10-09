<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Book Vehicle</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="booknow.css" />
    <!-- popup css -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap');


.popup-screen{
  z-index: 999999;
  position: fixed;
  background: rgba(255, 255, 255, 0.1);
  backdrop-filter: blur(10px);
  width: 100%;
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  visibility: hidden;
  transition: 0.5s ease;
  transition-property: visibility;
}

.popup-screen.active{
  visibility: visible;
}

.popup-box{
  position: relative;
  background: rgba(255, 255, 255, 0.8);
  backdrop-filter: blur(10px);
  max-width: 350px;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  margin: 20px;
  padding: 50px 40px;
  border-radius: 20px;
  box-shadow: 0 5px 25px rgb(0 0 0 / 20%);
  transform: scale(0);
  transition: 0.5s ease;
  transition-property: transform;
}

.popup-screen.active .popup-box{
  transform: scale(1);
}

.popup-box h2{
  font-size: 2.1em;
  font-weight: 800;
  margin-bottom: 20px;
}

.popup-box p{
  font-size: 1em;
  margin-bottom: 30px;
}

.popup-box .btn{
  color: #fff;
  background: red;
  font-size: 1.1em;
  font-weight: 500;
  text-decoration: none;
  text-transform: uppercase;
  padding: 7px 27px;
  border-radius: 3px;
}

.close-btn{
  position: absolute;
  font-size: 1em;
  top: 0;
  right: 0;
  margin: 15px;
  cursor: pointer;
  opacity: 0.5;
  transition: 0.3s ease;
  transition-property: opacity;
}

.close-btn:hover{
  opacity: 1;
}


    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    

</head>
<body>
    <div class="container">
<div class="popup-screen">
      <div class="popup-box">
        <i class="fas fa-times close-btn"></i>
        <h2>Please Note</h2>
       <p> YOur Payment is Successful</p>
       <button class="btn" id="Cbook" ><a style="color: white;text-decoration:none;" href="home.php">Go To Home</a></button>
      </div>

      <script type="text/javascript" >
    const popupScreen = document.querySelector(".popup-screen");
    const popupBox = document.querySelector(".popup-box");
    const closeBtn = document.querySelector(".close-btn");
    document.getElementById("Cbook").addEventListener("click",function(){document.getElementsByClassName("popup-screen")[0].classList.remove("active");});
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
    
</body></html>