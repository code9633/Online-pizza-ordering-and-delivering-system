<?php

include "config.php";

session_start();
error_reporting(0);

if (isset($_POST['submit'])){
    $email = $_POST['useremail'];
    $pass = md5($_POST['userpass']);

    $sql = "SELECT * FROM user_register WHERE email = '$email' AND password = '$pass'";
    $result = mysqli_query($con, $sql);

    if ($result ->num_rows > 0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        header("Location: index.php");
    }
    else{
        echo "<script>alert('OOPs, Your email or password is wrong!')</script>";
    }
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizaa - Login</title>
    <link rel="stylesheet" href="css/users.css">
</head>
<body>
    <div class="navigation-container">
        <div class="navigation-content">
            <div class="logo">            
                <a href="index.php"><img src="/images/logo.png" alt="logo image"></a>
            </div>         
        </div>
    </div>
    <div class="container">
        <form  action="" method="POST" class="login-email">
            <p class = "login-text" style="font-size: 2rem; font-weight : 800">Login</p>
            <div class="input-group">
                <input type="email" name="useremail" placeholder="email" value="<?php echo $email ;?>" required >
            </div>
            <div class="input-group">
                <input type="password" name="userpass" placeholder="Password" >
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Login</button>
            </div>
            <p class="login-register-text" href="">Don't have an account? <a href="register.php">Register Here</a> </p>

        </form>
    </div>


    <div class="footer">
        <div class="navigation-footer-content">
            <div class="logo"> 
                <img src="images/logo.png">
            </div>
            <div class="footer-menu">
                <ul>
                    <li><a href="#">ABOUT US</a></li>
                    <li><a href="#">CONTACT US</a></li>
                    <li><a href="#">TEAM</a></li>
                    <li><a href="#">SUPPORT</a></li>
                </ul>
            </div>
            <div class="social">
                <ul>
                    <li><a href="#"><img src="/images/facebook.png" alt=""></a></li>
                    <li><a href="#"><img src="/images/twitter.png" alt=""></a></li>
                    <li><a href="#"><img src="/images/youtube.png" alt=""></a></li>
                </ul>                 
            </div>
        </div>
          
        <div class="copyright">
            <p>Copyright 2021 Things.Going To Internet</p>
        </div>
    </div> 
    
</body>
</html>