<?php 
    //inlcude config file 
    include('../constant/config.php');

    // echo "Delte page"; 

    //check whether the id and image name value is set or not

    if(isset($_GET['id']) and isset($_GET['image_name'])){

        //get the value and delete
        // echo "get value and get delete";
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        //remove the physical image file is available

        if ($image_name != ""){
            //image is avaolable . so remove it

            $path = "../images/category/".$image_name;
            //remove the image
            $remove = unlink($path);

            //if failed to remove image then add adn error message and stop the process
            if ($remove == false){
                //set the sesson message 
                $_SESSION['remove'] = "<div class ='error'>Failed to remove category image</div>";
                //redirect to manage category page
                header('location:'.SITEURL.'admin/manage-category.php');
                //stop the process
                die();

            }
        }

        //delete the data from database
        //sql query delete data from database
        $sql = "DELETE FROM category WHERE id = '$id' ";

        //execute the query
        $result = mysqli_query($con, $sql);
        
        //check whether the data is delete from database
        if ($result == true){
            //det sucess messgae and redirect
            $_SESSION['delete'] = "<div class = 'sucess'>Category Deleted succesfully .</div>";
            //redirect to manage category
            header('location:'.SITEURL.'admin/manage-category.php');
        }

         
    }
    else{
        //redirect to manage category page
        header('location'.SITEURL.'admin/manage-category.php');
        //redirected to manage category
        header('location:'.SITEURL.'admin/manage-category.php');
        
    }


?>