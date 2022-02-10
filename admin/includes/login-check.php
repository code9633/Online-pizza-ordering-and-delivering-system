<?php

    //Authorization access control
    //Check whether the uer is logged in or not

    if(!isset($_SESSION['user'])){ //user is not logged in(if user session is not set)

        //user is not logged in
        //redirect to login page with message
        $_SESSION['no-login-message'] =  "<p style ='text-align:center;color: red;'>Access Denied!! Please Login..</p> ";
        //redirect to login page
        header('location:'.SITEURL.'admin/login.php');   
    }

?>