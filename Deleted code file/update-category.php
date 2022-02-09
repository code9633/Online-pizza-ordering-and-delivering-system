<?php include('section/header.php')?>

<div class= "main-content">
    <div class="wrapper">
        <h1>Update Category</h1>
        <br><br>

        <?php
            if ($_SESSION['upload']){

                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }      
        
        ?>

        <?php 
            //check whether ID and all other details   
            if (isset($_GET['id'])){
                //get the ID and all other details
                // echo "getiing the data";
                $id = $_GET['id'];
                //create sql query get all other details
                $sql = "SELECT *FROM category WHERE id = $id";

                //exute the query
                $result = mysqli_query($con, $sql);

                //count the rows check whether the is is valid or not
                $count = mysqli_num_rows($result);

                if ($count ==1){
                    //get all the data
                    $row = mysqli_fetch_assoc($result);

                    $title = $row['title'];
                    $current_image = $row['image_name'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                }
                else{
                    //redirect to the manage category woth session message
                    $_SESSION['no-category-found'] = "<div class = 'error'>caegory not Found</div>" ;
                    header('location:'.SITEURL.'admin/manage-category.php');
                }

            }
            else{
                //redirect to the manage category
                header('location:'.SITEURL.'admin/manage-category.php');
            }
        
        
        ?>

        <form action="" method="POST" enctype="multipart/form-data">
            <table class = "tbl-30">
                <tr>
                    <td>Title:</td>
                    <td><input type="text" name= "title" value="<?php echo $title;?>"></td>
                </tr>

                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php 
                            if($current_image != ""){
                                //display the image
                                ?>
                                <img src="<?php echo SITEURL;?>images/category/<?php echo $current_image;?>" width="200px">

                                 <?php
                            }
                            else{
                                echo "<div class= 'error'>Image not added</div>";
                            }
                                      
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>New Image</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                
                <tr>
                    <td>Featured</td>
                    <td>
                        <input <?php if($featured == "Yes"){echo "checked";}?> type="radio" name="featured" value="Yes">Yes 
                        <input <?php if($featured == "No"){echo "checked";}?> type="radio" name="featured" value = "No">No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input <?php if($active == "Yes"){echo "checked";}?>  type="radio" name="active" value="Yes">Yes 
                        <input <?php if($active == "No"){echo "checked";}?>  type="radio" name="active" value = "No">No
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="current_image" value="<?php echo $current_image;?>"> <!--get the value of the current image name -->
                        <input type="hidden" name="id" value= "<?php echo $id;?>">
                        <input type="submit" name="submit" value="Update Category" class= "btn-secondary">
                    </td>
                </tr>
            </table>

        </form>

        <?php
            
            if(isset($_POST['submit'])){ //insert data to database from form  $_post
                // echo "clicked";
                //1.get all the vlaue from our form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $current_image = $POST['current_image'];
                $featured  = $_POST['featured'];
                $acitve = $_POST['active'];

                //2.updating the new image if selected 
                //check whether the image is selected or not
                if (isset($_FILES['image']['name'])){
                    //set the image details
                    $image_name = $_FILES['image']['name'];
                    //check wether the image is  available or not
                    if ($image_name != ""){
                        //image avilable
                        //A.upload the new image 

                        //Auto rename images
                        //get extension of out image(jpg, png, gif, etc) e.g "food1.jpg"

                        $ext = end(explode('.', $image_name));

                        //rename the image
                        $image_name = "food_category_".rand(000,999).'.'.$ext;

                        $source_path = $_FILES['image']['temp_name'];

                        $destination_path = "../images/category".$image_name;

                        //upload the image

                        $upload = move_uploaded_file($source_path, $destination_path);

                        //check whether the image is uoloaded or not
                        //adn if the imahe is not uploaded them we stop the process and redirect with wrror message

                        if ($upload == false){

                            //set message 
                            $_SESSION['upload'] = "<div class='error'>Failed to upload image</div>";
                            //rdirect to add  category page
                            header('loaction:'.SITEURL.'admin/add-category.php');
                            //stop the process
                            die();

                        }
                        //B. remove the current image if avilable
                        if ($current_image != ""){

                        
                            $remove_path = "../images/category/".$current_image;
                            $remove = unlink($remove_path);

                            //check whether the image is removed or not
                            //if failed to remove then display message ad stop the process
                            if ($remove == true){
                                //faileld to remve image
                                $_SESSION['failed_remove'] = "<div class = 'error'>Failed to Remove the Current Image.</div>";
                                header('location:'.SITEURL.'admin/manage-category.php');
                                die(); //stop the process
                            }
                        }

                    }
                    else{
                        $image_name = $current_image;
                    }
                }
                else{
                    $image_name = $current_image;
                }
                
                

                //3.update database
                $sql2 = "UPDATE category SET
                    title = '$title',
                    image_name = '$image_name',
                    featured = '$featured',
                    active = '$active',
                    WHERE id = '$id'
                ";

                //execute the auery
                $resuslt2 = mysqli_query($con, $sql2);
                
                //4.redirect to manage category with message
                //check whether executed or not

                if ($result2 == true){
                    //category uodated
                    $_SESSION['update'] = "<div class = 'sucess'>Category Updated Sucessfully.</div>";
                    header('location'.SITEURL.'admin/manage-category.php');
                }
                else{
                    //failed to update category
                    $_SESSION['update'] = "<div class = 'sucess'>Failed to Update Category.</div>";
                    header('location'.SITEURL.'admin/manage-category.php');
                }

            }
    
        ?>
        
    </div>
</div>


<?php include('section/footer.php')?>