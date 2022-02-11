<?php
    //include conatant page
    include('../constant/config.php');
    
    if(isset($_GET['id']) && isset($_GET['image_name'])){
        //process to delete
        // echo "process to delte";

        //1. Get id and image name
        //2. remove the image if avilable
        //3. Delete food from databse
        //4. redirect to manage food with session message

        //1. get id and image name
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //2. remove imabge name if available
        //check wheter the image name avilable or not and delete only if avilablle

        if($image_name != ""){
            //if has image and need to rmove from folde
            //get the image path
            $path = "../images/pizza/".$image_name;

            //remove image file from folder
            $remove = unlink($path); // return the true or false vlaue

            //check ehether the image is removevd or not

            if ($remove == false){
                //failed to remove image
                $_SESSION['upload'] = "<p class = 'error'>*Failed to Remove Image.</p>";
                //redirect to manage food
                header('location:manage-pizza.php');
                //stop the prcess of deleting food
                die();
            }

        }

        //3. Delete food from database
        $sql = "DELETE FROM food WHERE id =$id";
        //execute the query
        $result = mysqli_query($con, $sql);

        //check whether the query executed or not and set the session message respactively
        //4. redirect to manage fod $session message

        if ($result == true){
            //food deleted
            $_SESSION['delete'] = "<p class = 'success'>*Pizza Deleted Successfully.</p>";
            header('location:'.SITEURL.'admin/manage-pizza.php');
        }
        else{
            //failed to delete the food
            $_SESSION['delete'] = "<p class = 'error'> Fail to Delete.</p>";
            header('location:'.SITEURL.'admin/manage-pizza.php');
        }


    }
    else{
        //rediect to manage food page
        // echo "redirect";

        $_SESSION['unsutorized '] = "<p class = 'error'>Unauthorized Acces.</p>";
        header('location:'.SITEURL.'admin/manage-pizza.php');
    }

?>

