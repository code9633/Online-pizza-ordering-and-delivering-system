<?php include('section/header.php')?>

<?php 
    //check whether the id is set or not
    if (isset($_GET['id'])){
        //get the all the details
        $id = $_GET['id'];

        //sql query to get the selectd food
        $sql2 = "SELECT * FROM pizza WHERE id = $id";
        //execute the query
        $result2 = mysqli_query($con, $sql2);

        //get the value based on query executed
        $row2 = mysqli_fetch_assoc($result2);

        //get the individual values selected food
        $titile = $row2['title'];
        $description = $row2['description'];
        $price = $row2['price'];
        $current_image = $row2['image_name'];
        $current_category = $row2['category_id'];
        $featured = $row2['featured'];
        $active = $row2['active'];

    }
    else{

        //redirect to manage food
        header('location'.SITEURL.'admin/manage-pizza.php');
    }


?>


<div class="main-content">
    <div class="wrapper">
        <h1>Update Food</h1>
        <br><br>

        <form action="" method="POST" enctype = "multipart/form-data">
            <table class = "tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name = "title"  value = <?php echo $title;?>>
                    </td>
                </tr>

                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" cols="30" rows="5" <?php $description;?> ></textarea>
                    </td>
                </tr>

                <tr>
                    <td>Price</td>
                    <td>
                        <input type="number" name="price" value="<?php echo $price;?>">
                    </td>
                </tr>

                <tr>
                    <td>Current Image:</td>
                    <td>
                        <?php 
                            //check whether the image is avilable or not
                            if ($current_image == ""){
                                //image not available 
                                echo "<div class = 'error'>Image not Available.</div>";

                            }
                            else{
                                //image availble
                                ?>
                                    <img src="<?php echo SITEURL;?>image/food/<?php echo $current_image;?>" width="150px">
                                <?php
                            }
                        
                        
                        ?>
                    </td>
                </tr>
                
                <tr>
                    <td>Select New Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>

                <tr>
                    <td>Category</td>
                    <td>
                        <select name="category">
                            <?php
                                //query to get active categories
                                $sql = "SELECT * FROM category WHERE active = 'Yes'";
                                //execute the query
                                $result = mysqli_query($con, $sql);
                                //count rows
                                $count = mysqli_num_rows($result);

                                //check ahether the ctegory available or not
                                if ($count>0){
                                    //category available
                                    while($row = mysqli_fetch_assoc($result)){
                                        $category_title = $row['title'];
                                        $category_id = $row['id'];
                                        
                                        // echo "<option vlaue = '$category_id'>$category_title</option>"; 
                                        ?>
                                            <option <?php if ($current_category == $category_id){echo "Selected";}?> value="<?php echo $category_id;?>"><?php echo $category_title;?></option>
                                        <?php
                                    }
                                }
                                else{
                                    //categoyr not available
                                    echo "<option vlaue = '0'>Category Not Available.</option>";
                                }
                            
                            
                            ?>
                            <option value="0">Test category</option>
                        </select>
                    </td>
                </tr>

                <tr>
                    <td>Featured</td>
                    <td>
                        <input <?php if($featured == 'Yes'){echo "checked";}?> type="radio" name= "featured" value = "Yes">Yes
                        <input <?php if($featured == 'No'){echo "checked";}?> type="radio" name="featured" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>Active</td>
                    <td>
                        <input <?php if ($active == 'Yes'){echo "checked";}?> type="radio" name= "active" value = "Yes">Yes
                        <input <?php if($active == 'No'){echo "checked";}?> type="radio" name="active" value="No">No
                    </td>
                </tr>

                <tr>
                    <td>
                        <!-- we want to remove current image if new images selected  and updated then we need to remove current image and certain id 
                        after then need to pass the image name   -->
                        <input type="hidden" name = "id" value = "<?php echo $id;?>">
                        <input type="hidden" name="curent_image" value="<?php echo $current_image;?>">
                        <input type="submit" name="submit" value="Update Food" class="btn-secondary"> 
                    </td>
                </tr>
            </table>
        </form>
        
        <?php
            if (isset($_POST['submit'])){
                
                // echo "Button Clicked";

                //1.get all the details from the form
                //2.Upload the image if selected
                //3. Remove the image if new image is uploaded and current image exist
                //4. Update the food in databse
                //Redirect to manage food with session

                //1. get all the details from the form
                $id = $_POST['id'];
                $title = $_POST['title'];
                $description = $_POST['description'];
                $price = $_POST['price'];
                $current_image = $_POST['current_image'];
                $category = $_POST['category'];

                $featured = $_POST['featured'];
                $active = $_POST['active'];

                //2 upload the image if selected

                //check whether upload button is clicked or not
                if (isset($_FILES['image']['name'])){

                    //upload button clicekd_
                    $image_name = $_FILES['image']['name'];

                    //check whether the file is avialble or not
                    if ($image_name != ""){
                        //image is available
                        
                        //A.uploading new image

                        //Rename the image
                        $ext = end(explode('.', $image_name)); //get the extension of the image
                        $image_name = "Food-Name-".rand(000,999).'.'.$ext; //This will be renamed image


                        //get the source path and destination path
                        $src_path = $_FILES['image']['temp_name'];
                        $dest_path = "../images/food/".$image_name;

                        //upload the image
                        $upload = move_uploaded_file($src_path, $dest_path);

                        //check whether the image is uploaded or not
                        if ($upload == false){
                            
                            $_SESSION['upload'] = "<div class = 'error'>Failed to Upload the Image.</div>";
                            //Rediredt to the manage food
                            header('location:'.SITEURL.'admin/manage-food.php');
                            //stop the session
                            die();
                        }

                        // B. Remove the current if it is available
                        //3. remove the image if new image is uploaded andc current image exist

                        if ($current_image!= ""){

                            //curent image is available
                            $remove_path = "../images/food/".$current_image;

                            $remove = unlink($remove_path);

                            //check whether the image is removed or not
                            if($remove == false){
                                //false to remove current image
                                $_SESSION['remove_failed'] = "<div class = 'error'>Fail to Remove the current Image.</div>";
                                //redirect the manageg food
                                header('loaction:'.SITEURL.'admin/manage-food.php');
                                //stop the process
                                die();
                            }
                        }


                    }


                }
                else{
                    $image_name = $current_image;
                }
                
                //4. update the food in database
                $sql3 = "UPDATE 'pizza' SET
                    title = '$title',
                    description = '$description',
                    price = '$price', 
                    image_name = '$image_name',
                    category_id = '$category',
                    featured = '$active',
                    active = '$active'
                   
                    WHERE id = $id
                ";

                //execute the query

                $result3 = mysqli_query($con, $sql3);

                //chek whether the query is executed or not
                if ($result3 == true){
                    //query executed and food updeated
                    $_SESSION['update'] = "<div class = 'success'>Food Updated Succesfully.</div>";
                    header('loacation'.SITEURL.'admin/manage-food.php');
                }
                else{
                    //failed to update food
                    $_SESSION['update'] = "<div class = 'error  '>Fialed to Update Food.</div>";
                    header('loacation'.SITEURL.'admin/manage-food.php');
                }

                //5.redirect to mange food with session

            }
        
        
        
        ?>



    </div>
</div>

<?php include('section/footer.php')?>