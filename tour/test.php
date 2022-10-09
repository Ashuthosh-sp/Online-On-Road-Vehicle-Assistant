<?php
require('header.php');
?>
<div class="popup-screen">
      <div class="popup-box">
        <i class="fas fa-times close-btn"></i>
        <h2>Please Note</h2>
       <p> Our Service is available only to limited locations.Please select the location which is present in the List</p>
       <button class="btn" id="Cbook" >Book Now</button>
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
                            <select id="location" name="location" required>
                            <option value="">Select Location</option>
                            <option value="karkala">karkala</option>
                            <option value="kukundoor">kukundoor</option>
                            <option value="belvai">belvai</option>
                            <option value="karkalatalukoffice">karkalatalukoffice</option>
                                        </select>
                        </div>
                        <div class="inpbox">
                            <span class="flaticon-globe"></span>
                            <input type="text" placeholder="Enter your address" id="address" name="address" required>
                        </div>
                        <div class="inpbox full">
                            <span class="flaticon-taxi"></span>
                            <select id="main_menu" name="main_menu" required>
                <option value="">Select Vehicle</option>
                <option value="car">Car</option>
                <option value="twowheeler">Two wheeler</option>
                <option value="truck">Truck</option>
                <option value="bus">Bus</option>
              </select>
                        </div>

                        <div class="inpbox full">
                            <span class="flaticon-taxi"></span>
                            <select id="sub_menu" name="sub_menu" required>
                            <option value="">Select  Vehicle Brand</option>

              </select>
              
            <script>
                var vehcile={
                    car:['suzuki','hyundai','tata','kia','renault','others'],
                    twowheeler:['tvs','hero','suzuki'],
                    truck:['ashok','bharath','mahindra'],
                    bus:['marcopolo','']
 
                }
                //mains

                var main=document.getElementById('main_menu');
                var sub=document.getElementById('sub_menu');

                //Trigger the event

                main.addEventListener('change',function(){

                    var selected_option=vehcile[this.value];
                    while(sub.options.length>0)
                    {
                        sub.options.remove(0);

                    }

                    Array.from(selected_option).forEach(function(e1)
                    {
                        let option=new Option(e1,e1);
                        sub.appendChild(option);                        
                    }

                );
            });  
            </script>

                        
                        </div>
                        <div class="inpbox full">
                            <span class="flaticon-taxi"></span>
                            <select id="modal" name="modal" required>
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
                            <input type="text" placeholder="Enter your Name" id="cname"  name="cname"required>
                        </div>
                        <div class="inpbox">
                            <span class="flaticon-globe"></span>
                            <input type="text" placeholder="Enter your Email" id="email" name="email" required>
                        </div>
                        <div class="inpbox">
                            <span class="flaticon-globe"></span>
                            <input type="text" placeholder="Enter your Phone Number" id="pnumber" name="pnumber" required>
                        </div>
                        <div class="inpbox">
                            <span class="flaticon-globe"></span>
                            <input type="text" placeholder="Your Complaint" id="complaint" name="complaint"required>
                        </div>


                        
                            <button class="subt" name="submit" >Book</button>

                   
                    </div>
                </div>
            </div>
            </form>
