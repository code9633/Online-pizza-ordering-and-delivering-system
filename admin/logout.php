<?php

//Include config.php
    include("../constant/config.php");
//1.desroy the session
    session_destroy();
//2.Reditrected the session
    header("location:".SITEURL."admin/login.php")

?>