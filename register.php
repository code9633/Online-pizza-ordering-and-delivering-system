<?php
include "config.php";

error_reporting(0);

if(isset($_POST['submit'])){

    $username = $_POST['username'];
    $email = $_POST['useremail'];
    $pass = md5($_POST['userpass']);
    $confirmPass = md5($_POST['confirmPass']);

    if ($_POST['userpass'] == $_POST['confirmPass']){
        $sql = "SELECT * FROM user_register WHERE email = '$email' ";
        $result = mysqli_query($con, $sql);
    
        if ($result ->num_rows >0){
            echo "<script>alert('Email address is already exist!')</script>";
            $_POST['userpass'] = '';
            $_POST['confirmPass'] = '';
        }
        else{
            $sql = "INSERT INTO user_register(username, email, password) VALUES ('$username','$email','$pass')";
            $result = mysqli_query($con, $sql);
            if ($result){
               echo "<script>alert('data was added to the database')</script>";
               $username = '';
               $email = '';
               $_POST['userpass'] = '';
               $_POST['confirmPass'] = '';
            } 
            else{
                echo "<script>alert('oop, Something went wrong')</script>";
            }       

        }
        
    }

    else{
       echo " <script>alert('Password not mstch')</script>";
       $_POST['userpass'] = '';
       $_POST['confirmPass'] = '';
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizaa - Sign up</title>
    <link rel="stylesheet" href="css/users.css">
</head>
<body style=" background-image: url(images/bg.png);">
    <div class="navigation-container">
        <div class="navigation-content">
            <div class="logo">            
                <a href="index.php"><img src="images/logo.png" alt="logo image"></a>
            </div>         
        </div>
    </div>
    <div class="container">
        <form action="" method="POST" class="login-email">
            <p class = "login-text" style="font-size: 2rem; font-weight : 800">Register</p>
            <div class="input-group">
                <input type="text" name="username" placeholder="Username"  value = "<?php echo  "$username"; ?>" required >
            </div>
            <div class="input-group">
                <input type="email" name="useremail" placeholder="Email" value="<?php echo "$email" ; ?>" required >
            </div>
            <div class="input-group">
                <input type="password" name="userpass" placeholder="Password" value="<?php echo $_POST['userpass'];?>" >
            </div>
            <div class="input-group">
                <input type="password" name="confirmPass" placeholder="Confirm Password" value = "<?php echo $_POST['confirmPass']; ?>">
            </div>
            <div class="input-group">
                <button name="submit" class="btn">Register</button>
            </div>
            <p class="login-register-text" href="">Do you have an account? <a href="login.php">Login Here Here</a> </p>

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