<?php include('section/header.php');?>

<div class = "main-content">
    <div class="wrapper">
        <h1>Add Category</h1>
        <br><br>

        <?php
           if (isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
            }
            
            if (isset($_SESSION['upload'])){

                echo $_SESSION['upload'];
                unset($_SESSION['upload']);

            }
                
        ?>

        <br><br>
        <!-- Add category form start here -->
        <form action="" method="POST" enctype="multipart/form-data">
            <table class= "tbl-30">
                <tr>
                    <td>Title</td>
                    <td>
                        <input type="text" name="title" placeholder="Category Title">
                    </td>
                </tr>
                <tr>
                    <td>Select Image</td>
                    <input type="file" name="image">
                </tr>
                <tr>
                    <td>Featured</td>
                    <td>
                        <input type="radio" name = "featured" value="yes">Yes
                        <input type="radio" name = "featured" value="no">No
                    </td>
                </tr>
                <tr>
                    <td>Active</td>
                    <td>
                        <input type="radio" name="active" value="yes">Yes
                        <input type="radio" name="active" value="no">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Category" class = "btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
        <!--add cagegory form end here -->

        <?php 

            //check whether the submit button is clicked or not
            if(isset($_POST['submit'])){
                // echo "clickd the button";

                //1.get the value from category form
                $title = $_POST['title'];

                //for radio input type we need to check wheteher butoon is selectd or not
                if (isset($_POST['featured'])){
                    //get the value from form
                    $featured = $_POST['featured'];
                }
                else{
                    //set the default value
                    $featured = "No";
                }

                if (isset($_POST['active'])){
                    
                    $active = $_POST['active'];
                }
                
                else{
                    $active = "No";
                }

                //check whether the image is selected or not and set the value for image name sccordingly

                // print_r($_FILES['image']);
 
                // die();  //break the code here

                if  (isset($_FILES['image']['name'])){
                    //upload the image
                    //to upload image we nedd image name , source path and destination path
                    $image_name = $_FILES['image']['name'];

                    //Upload the image only if image selected
                    if ($image_name != ""){

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
                    }
                    
                }   

                else{
                    //Don't upload image and set image value as blank
                    $image_name = "";
                }

                //2.create sql query to insert category into databse
                $sql = "INSERT INTO category SET
                    tittle = $title,
                    featured = $featured,
                    active = $active
                ";;

                //3.execute the query and save in database
                
                $result = mysqli_query($con, $sql);

                //4. check whether the query secuted or not and data added or not

                if($result == true){
                    //query executed and category added
                    $_SESSION['add'] = "<div class = 'success'> Category Added Succesfully.</div>";
                    //redirect to the manage category page
                    header('location:'.SITEURL.'admin/manage-category.php');
                }
                else{
                    //failed to add category
                    $_SESSION['add'] = "<div class = 'success'> Failed to Add category.</div>";
                    //redirect to the manage category page
                    header('location:'.SITEURL.'admin/add-category.php');
                }
            }        
            
        ?>

    </div>
</div>

<?php include('section/footer.php')?>