<?php
// session start
session_start();


// create constant to store non repeating value

define('SITEURL', 'http://localhost/Pizza/');
define('LOCALHOST', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD','' );
define('DB_NAME', 'pizza_database');

$con = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD, DB_NAME); // database connection 

if (!$con){
    die("<script>alert('Connection Failed')</script>");
}

?>