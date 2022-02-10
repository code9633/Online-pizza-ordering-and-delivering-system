<?php
//inclide config.php
include("../constant/config.php");

//1. get the Id of Admin to be delted
$id = $_GET['id'];

//2.Create SQL Query to Delete Admin
$sql = "DELETE FROM admin WHERE id = $id";
//sexcute the query
$result = mysqli_query($con, $sql);
//check whether the query executed susccesfully or not

if ($result == true){
    //query executed succesfullly and admin delted
    // echo "Admin Deleted";
    //redirect to Manage admin page
    $_SESSION['delete'] = "<p class = 'success'>*Admin Deleted Succesfully</p>";
    //redirect to manage register page
    header('location:'.SITEURL.'admin/register.php');
}
else{
    // echo "Failed to delete admin";
    $_SESSION['delete'] = " <p class = 'error'>*Failed to Delete Admin.</p>";
    //redirect to register page
    header('location:'.SITEURL.'admin/register.php');

}

//3. redirect to Manage Admin page woth message (sucess/error)

?>