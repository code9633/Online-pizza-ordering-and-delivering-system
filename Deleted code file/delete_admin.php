<?php
//inclide config.php
include("../constant/config.php");

//1. get the Id of Admin to be delted
$id = $_GET['id'];

//2.Create SQL Query to Delete Admin
$sql = "DELETE FROM tbl_admin WHERE id = $id";
//sexcute the query
$result = mysqli_query($con, $sql);
//check whether the query executed susccesfully or not

if ($result == true){
    //query executed succesfullly and admin delted
    // echo "Admin Deleted";
    //redirect to Manage admin page
    $_SESSION['delete'] = "<div class = 'success'>Admin Deleted Succesfully</div>";
    //redirect to manage Admin page
    header("location :".SITEURL."admin/manage-admin.php");
}
else{
    // echo "Failed to delete admin";
    $_SESSION['delete'] = " <div class = 'error'>Failed to delete Admin. Try agian later </div>";
    header("location:".SITEURL."admin/manage-admin.php");

}

//3. redirect to Manage Admin page woth message (sucess/error)







?>