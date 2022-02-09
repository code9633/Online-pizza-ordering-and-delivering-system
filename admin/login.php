<?php 

  include('../constant/config.php');

//check whether the submit button is clicked or not
  if (isset($_POST['login_btn'])) {
    //process for ligin
    //1.get te data from login form
    $username = $_POST['username'];
    $password = $_POST['password'];

    //2.sql tn check whether the user with username ans password exist or not
    $sql = "SELECT * FROM admin WHERE username = '$username' AND password = '$password'";

    //3.execute the query
    $result = mysqli_query($con, $sql);

    //4.count rows check wheter he uer exists or not
    $count = mysqli_num_rows($result);

    if ($count > 0) {
      //User available and login sucess

      $_SESSION['user'] = $username; //To check whether that the user is loged in or not
      //redirect to the home page/Dashboard
      header('location:'.SITEURL.'admin/');
    } 

    else {
      //user is not availabe;
      //login failed
      $_SESSION['login'] =  "<p class = 'error'>*Login Failed.</p> ";
      //redirect to the login page agia
    }
  }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title> Pizza | Admin Panel</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href = "css/custom.css" rel= "stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <div class="container">

      <!-- Outer Row -->
      <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-6">

          <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
              <!-- Nested Row within Card Body -->
              <div class="row">
                <div class="col-lg-12">
                  <div class="p-5">
                    <div class="text-center">
                      <h1 class="h4 text-gray-900 mb-4">Login Here!</h1>
                      <div >
                        <?php

                          if (isset($_SESSION['login'])) {
                              echo $_SESSION['login'];
                              unset($_SESSION['login']);
                          }

                          if (isset($_SESSION['no-login-message'])){
                            echo $_SESSION['no-login-message'];
                            unset ($_SESSION['no-login-message']);
                          }      

                        ?>
                      </div>
                     
                    </div>

                    <!-- admin login form start here -->

                    <form class="user" method="POST">

                      <div class="form-group">
                        <input type="text" name="username" class="form-control form-control-user" placeholder="Enter user name..">
                      </div>
                      <div class="form-group">
                        <input type="password" name="password" class="form-control form-control-user" placeholder="Password">
                      </div>

                      <button type="submit" name="login_btn" class="btn btn-primary btn-user btn-block"> Login </button>
                      <hr>
                    </form>

                    <!-- admin login pannel end here -->

                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

      </div>

    </div>

</body>

<?php
  include('includes/scripts.php');
?>

</html>


