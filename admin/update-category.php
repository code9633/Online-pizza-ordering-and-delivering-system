<?php
    //adding header and naviation bar
    include('includes/header.php');
    ob_start();
    include('includes/navbar.php');
?>
<!-- A.Get the data from the database and display the particular field -->
<?php

    // Check Whether id and all other details
    if(isset($_GET['id'])){
        // 1.Get the ID in particular category
        $id = $_GET['id'];

        // 2. Create sql query to set the daitails
        $sql = "SELECT * FROM category WHERE id = $id";

        //Execute the query
        $result = mysqli_query($con, $sql);

        //check whether the queyry is executed or not
        if($result == true){
            //check whther the data is available or not
            $count_rows = mysqli_num_rows($result);
            //Check whether have category data or not
            if($count_rows == 1){
                //get the deatails
                
                $row = mysqli_fetch_assoc($result);

                $title = $row['title'];
                $current_image = $row['image_name'];
                $featured = $row['featured'];
                $active = $row['active'];
            }
            else{
                //failed to get the details
                $_SESSION['no-category-details'] = "<p class = 'error'>*Category Not Found!</>";
                //redirect  to  in register page
                header('location:manage-category.php');
            }
        }
        else{
            // Redirect to the manage category
            header('location:manage-catgory.php');
        }

    }
    

?>

<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Edit Admin Profile </h6> 
    </div>

    <div class="card-body">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label> Title </label>
                <input type="text" name="title"  class="form-control" value="<?php echo $title;?>" required >
            </div>
            <div class="form-group">
                <label> Current Image </label>
                <?php 
                    if ($current_image != ""){
                        // Display the image
                        ?>
                        <img src="images/category/<?php echo $current_image;?>" width="150px" height="100px">
                        <?php
                    }
                    else{
                        echo "<div class = 'form-group error'> Image Not Added. </div>";
                    }
                ?>
            </div>
            <div class="form-group">
                <label>New Image</label>
                <input type="file" name="image" class="form-control" id="customFile">
            </div>

            <div class="form-group">
                <label> Featured  </label> 
                <span> &nbsp; &nbsp; &nbsp;</span>
                <input <?php if($featured == "Yes"){echo "checked";}?> type="radio" name="featured" value="Yes">Yes 
                <span> &nbsp;</span>
                <input <?php if($featured == "No"){echo "checked";}?> type="radio" name="featured" value = "No">No
            </div>

            <div class="form-group">
                <label> Active  </label> 
                <span> &nbsp; &nbsp; &nbsp;</span>
                <input <?php if($active == "Yes"){echo "checked";}?>  type="radio" name="active" value="Yes">Yes 
                <span> &nbsp;</span>
                <input <?php if($active == "No"){echo "checked";}?>  type="radio" name="active" value = "No">No
            </div>

            <div class="modal-footer">
                <input type="hidden" name = "current_image" value="<?php $current_image;?>"> <!-- Get the name of the current image -->
                <input type="hidden" name = "id" value="<?php echo $id;?>">

                <a href="manage-categ" class="btn btn-danger">CANCEL</a>
                <button type="submit" name="updatebtn" class="btn btn-primary">UPDATE</button>
            </div>
        </form>
  </div>
</div>
</div>

<!-- B. Updated details update and added information to the database -->
<?php 

// check whether the submit button is clicked or not
if (isset($_POST['updatebtn'])){
    // echo "Button Clicked";
    // 1. get all the value form form to update
    $id = $_POST['id'];
    $title = $_POST['title'];
    $current_image = $_POST['current_image'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
   
    //2. Updating the new image if selcted
    //Check whther the image is selected or not
    if (isset($_FILES['image']['name'])){
        //Set the image details
        $image_name = $_FILES['image']['name'];

        //check ehtherr the image is avialbel or not
        if ($image_name != ""){
            // image is avialble
            // A. upload the image

            //auto rename the images
            //get them out them extesion of the image file
            $temp = explode('.',$image_name);
            $ext = end($temp);

            //Rename of the image
            $iamge_name = "food_category_".rand(000, 999).'.'.$ext;

            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "../images/category/".$image_name;

            //upload the image
            $upload = move_uploaded_file($source_path, $destination_path);

            //check whether the images is uploaded or not
            //And if the image is not uploaded then we stop the process and redirect with error message

            if ($upload == false){
                //set the message
                $_SESSION['upload'] = "<div class = 'error'>*Faild to Upload the Image.</div>";
                //redirect to the manage caegoory page
                header('loaction:manage-categpry.php');
                // stop the process
                die();
            }
            //  B. Remove the current image if availble 
            if ($current_image != ""){

                $remove_path = "../images/category/".$current_image;
                $remove = unlink($remove_path);

                //check whether the image is removed or not
                //if failed to remove then display meaasage and stop the prcess
                if ($remove = true){
                    //failed to remove the image
                    $_SESSION['failed_remove'] = "<p class = 'error'>*Failed to Remove the Curent Image. </p>";
                    header('loaction:manage-category.php');
                    die(); //Stop the process

                }

            }
            


        }
        else{
            $iamge_name = $current_image;
        }
    }
    else{
        $image_name = $current_image;
    }

    // 3. Update the dateabse
    $sql2 = "UPDATE category SET 
        title = '$title',
        image_name = '$image_name',
        featured = '$featured',
        active = '$active'
        WHERE id = '$id'
    ";

    // execute the query
    $result2 = mysqli_query($con, $sql2);


    // 4. Redirect to managee category with message
    //check whetere the query executed successfully or not
    if($result2 == true){
        //Query executed and admin update

        $_SESSION['update'] = "<p class= 'success'>*Category updated susccesfully.</p>";
        //redirect to register page
        header('location:manage-category.php');

    }
    else{
        //failed to update admin
        $_SESSION['update'] = "<p class ='error'>*Failed to update category.</p>";
        //redirect to the admin page
        header('location:manage-category.php');
    }
  }

// adding footer part 
include('includes/footer.php');
include('includes/scripts.php');

?>

