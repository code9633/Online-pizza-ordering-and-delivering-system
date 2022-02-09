<!-- include the configuration -->
<?php include('../constant/config.php')?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzaa - Login Admin</title>
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <div class = "login">
        <h1 class="text-center">Login</h1>

        <?php
            if (isset($_SESSION['login'])){

                echo $_SESSION['login'];
                unset($_SESSION['login']);
            }

            if (isset($_SESSION['no-login-message'])){

                echo $_SESSION['no-login-session'];
                unset($_SESSION['no-login-session']);
            }

            
        ?>

        <br><br>

        <!-- login form start here -->
        <form action="" method="POST">
            Username:
            <input type="text" name="username" placeholder="Enter username">
            Password:
            <input type="passwword" name="password" placeholder="Enter Password">

            <input type="submit" name="submit" value="Login">
        </form>
        <!-- Login Form end here -->
    </div>
</body>
</html>

<?php

//check whether the submit button is clicked or not
if(isset($_POST['submit'])){
    //process for ligin
    //1.get te data from login form
    $username = $_POST['username'];
    $password = md5($_POST['password']);

    //2.sql tn chwck whether the user with username ans password exist or not
    $sql = "SELECT *FROM admin WHERE username = '$userrname' AND password = '$password'";

     //3.execute the query
     $result = mysqli_query($con, $sql);

     //4.count rows check wheter he uer exists or not
     $count = mysqli_num_rows($res);

     if ($count == 1){
        //user acvilable
        //login susccess
        $_SESSION['login'] = "<div class = 'sucess'>Login Succesfull.</div> ";

        $_SESSION['user'] = $username; //To check whether that the user is loged in or not

        //redirect to the home page/Dashboard
        header("location:".SITEURL."admin/admin-login.php");

     }
     else{
         //user is not availabe;
         //login failed
         $_SESSION['login'] = "<div class = 'error text-center'>Login Failed.</div>";
         //redirect to the home page/dashboard

     }

}

?>