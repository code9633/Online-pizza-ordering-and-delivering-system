<?php
 include "config.php";

 session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzaa - Home Page</title>
    <link rel="stylesheet" href="css/index.css">
</head>
<body style="background-image: url(images/bg2.png);">
    <!---------------------------- Menu section start----------------------------->
    <div class="navigation-container">
        <div class="navigation-content">
            <div class="logo">
                <img src="images/logo.png" alt="logo image">
            </div>
            <div class= "menu">
                <ul>
                    <li><a href="#">MENU</a></li>
                    <li><a href="#">PROMOS</a></li>
                    <li><a href="#">ONLINE ORDER</a></li>
                </ul>            
            </div>
            <div class="user">
                <?php 
                    if (isset($_SESSION['username']) and !empty($_SESSION['username'])){
                ?>
                <a class="login-register-btn" href="#">Log Out</a>
                 
                <?php } else{?>  
                <a class="login-register-btn" href="login.php">Sign In / Register</a>
                <?php }?>       
                
            </div>

            <div class="user-display-name">
            <?php 
                    if (isset($_SESSION['username']) and !empty($_SESSION['username'])){
                ?>
                <p class="user-name">Hi,<?php echo $_SESSION['username']; ?></p>
                 
                <?php } else{?>  
                    <p>&nbsp;</p>
                <?php }?> 

            </div>

            <div class="cart">
                <img height="30px" src="images/cart.png">
                <a href="#">Cart</a>
            </div>
            
        </div>
    </div>
    <!------------------------ Menu section end -------------------------------------------->

    <!------------------- Main content section start---------------------------------------- -->
    <div class="content-container">
        <div class="whats-new">
            <img src="images/WHATS NEW.png">
        </div>
        <div class="content">
            <div class="first-row">
                <div class="new" style="background-image: url(images/new.png);">
                    <p>GRILLED CHICKEN</p>
                    <P>SUMMER PIZZA</P>
                    <button>HOT & SPICY</button>
                </div>
                <div class="find">
                    <div class="search" style="background-image: url(images/find.png);">
                        <p>FIND LOCATION</p>
                        <div class="text">
                            <input type="text" placeholder="Search Something Here">
                            <button>Search</button>
                        </div>
                    </div>
                    <div class="order" style="background-image: url(images/order.png);">
                        <a href="#"><font stytle = "color: yellow">ORDER </font>ONLINE</a>
                    </div>
                </div>
            </div>
            <div class="second-row">
                <div class="food-one" style="background-image: url(images/food-1.png);">
                    <div class="name">
                        <p>VEGGIE</p>
                        <P>SPECIAL</P>
                    </div>
                    <div class="price">
                        <button>$9<sup>99</sup></button>
                    </div>
                </div>
                <div class="food-two" style="background-image: url(images/food-2.png);">
                    <div class="name">
                        <p>CHICKEN WRAP</p>
                        <P>SPECIAL</P>
                    </div>
                    <div class="price">
                        <button>$9<sup>00</sup></button>
                    </div>
                </div>
                <div class="food-three" style="background-image: url(images/food-3.png);">
                    <div class="name">
                        <p>PRAWN</p>
                        <P>SUMMER SPECIAL</P>
                    </div>
                    <div class="price">
                        <button>$5<sup>00</sup></button>
                    </div>
                </div>
            </div>
            <div class="third-row">
                <div class="flavor" style="background-image: url(images/flavor.png);">
                    <p>FLAVOR MENU</p>
                    <p>VEGETABLE HAND TOSED</p>
                </div>
                <div class="breakfast" style="background-image: url(images/breakfast.png);">
                    <p>BREAKFAST MENU</p>
                    <P>PARANTHA ROLL</P>
                </div>
            </div>    
        </div>
    </div>
    <!-------------------------- Main section end ---------------------------------- -->

    <!-------------------------- Footer section start-------------------------- -->
    <div class="footer">
        <div class="navigation-content">
            <div class="logo"> 
                <img src="images/logo.png">
            </div>
            <div class="menu footer-menu">
                <ul>
                    <li><a href="#">ABOUT US</a></li>
                    <li><a href="#">CONTACT US</a></li>
                    <li><a href="#">TEAM</a></li>
                    <li><a href="#">SUPPORT</a></li>
                </ul>
            </div>
            <div class="social">
                <ul>
                    <li><a href="#"><img src="images/facebook.png" alt=""></a></li>
                    <li><a href="#"><img src="images/twitter.png" alt=""></a></li>
                    <li><a href="#"><img src="images/youtube.png" alt=""></a></li>
                </ul>                 
            </div>
        </div>
          
        <div class="copyright">
            <p>Copyright 2021 Things.Going To Internet</p>
        </div>
    </div>  
    <!-- ------------------------- Footer section end ------------------------------------ -->
</body>
</html>