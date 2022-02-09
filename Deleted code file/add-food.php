<?php include('section/header.php');?>

<div class="main-content">
    <div class="wrapper">
        <h1>Add Pizza</h1>
        <br><br>

        <?php
            if (isset($_SESSION['upload'])){

                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }   
        
        ?>


        <form action="" method="POST" enctype="multipart/form-data">
            <table class = "tbl-30">
                <tr>
                    <td>Title:</td>
                    <td>
                        <input type="text" name="title" placeholder="Title of the food">
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td>
                        <textarea name="description" cols="30" rows="5" placeholder="Description of thr food"></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price:</td>
                    <td>
                        <input type="number" name="price">
                    </td>
                </tr>
                <tr>
                    <td>Select Image:</td>
                    <td>
                        <input type="file" name="image">
                    </td>
                </tr>
                <tr>
                    <td>Category:</td>
                    <td>
                        <select name="category">

                            <?php 
                                //create php code to diplay categries from database
                                //1.create SQL to get all active categorie from database

                                $sql = "SELECT * FROM category WHERE active = 'Yes'";

                                //execute the query
                                $result = mysqli_query($con, $sql);

                                //count rows to check wheter we have categories or not
                                $count = mysqli_num_rows($result);

                                //if count is greater zer we have categoried or not
                                if ($count > 0){
                                    //we have categories
                                    while($row = mysqli_fetch_assoc($result)){
                                        //get the details of categories'
                                        $id = $row['id'];
                                        $title = $row['title'];

                                        ?> 
                                            <option value="<?php echo $id ;?>"><?php echo $title;?></option>
                                        
                                        <?php
                                    }

                                }
                                else{
                                    //we dont have categories
                                    ?>
                                    <option value="0">No Category Found</option>
                                    <?php
                                }

                                //2.Display on dropdown   
                            
                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Featured:</td>
                    <td>
                        <input type="radio" name ="featured" value="Yes">Yes
                        <input type="radio" name="featured" value="No">No
                    </td>
                </tr>
                <tr>
                    <td>Active:</td>
                    <td>
                        <input type="radio" name ="active" value="Yes">Yes
                        <input type="radio" name="active" value="No">No
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="submit" value="Add Pizaa"></td>
                </tr>
            </table>

        </form>

        <?php
            //check whether the submit button clicked or not
            if (isset($_POST['submit'])){
                //add th food in database
                // echo "Clicked add food";

                //1.Get the data From from
                $title = $_POST['title'];
                $description = $_POST['price'];
                $price = $_POST['price'];
                $category = $_POST['category'];

                //check whether radio button for featured and active are checked or not

                if (isset($_POST['featured'])){
                    
                    $featured = $_POST['featured'];
                }
                else{
                    $featured = "No";  //setting the default value
                }

                if (isset($_POST['acitve'])){

                    $active = $_POST['active'];
                }
                else{
                    $featured = "No"; //setting up the defuallt value
                }


                //2 upload the image if selected

                //check the image select imge is clicked or not ans upload thi image if the image is seleced

                if (isset($_FILES['image']['name'])){
                    
                    //get the details of the selected image

                    $image_name = $_FILES['image']['name'];

                    //check whether the image is selectd or not  and upload image only if selected
                    if ($imamge_name != ""){
                        //image is selected
                        //A. rename the image
                        //get the extension of selected image (jpg,pg,etc)

                        $ext = end(explode('.', $image_name));

                        //create new name for image

                        $image_name = "Pizza Name-".rand(000, 999).".".$ext; // new imagee name may be  "food-name-000.jpg

                        //B. upload the image
                        //Get the src path and destination path

                        //Source path is the current location of the image
                        $src = $_FILES['image']['tmp_name'];

                        //destination path for image to be uploaded
                        $dst = "../images/pizza/".$image_name;

                        //finally upload pizza image 

                        $upload = move_uploaded_file($src, $dst);

                        //check whether the image upload or not
                        if ($upload == false){
                            //failed to upload the image
                            //redirect to add food page with error message
                            $_SESSION['upload'] = "<div class = 'error'>Failed to Upload Image</div>";
                            header('location'.SITEURL.'admin/add-food.php');
                            //stop the proces
                            die();

                        }

                    }
                    

                }
                else{

                    $image_name = ""; // setting default value as blank

                }

                //3.insert into daabase
                
                ///create sql query to save or add food

                $sql2 = "INSERT INTO pizza SET 
                    tittle = '$tittle',
                    price = $price,
                    image_name = '$image_name',
                    category_id = $category,
                    featured = '$featured',
                    active = '$active'
    
                ";

                //execute the query 
                $result2 = mysqli_query($con, $sql2);

                //check whtehr the edata insertd or not
                if($result2 == true){
                    //data inserted succesfully
                    $_SESSION['add'] = "<div class = 'sucess'>Food Added Succesfully .</div>";
                }
                else{
                    //failed to insert data
                    $_SESSION['add'] = "<div class = 'error'>Failed to Add Food.</div>";
                    header('location'.SITEURL.'admin/manage-food.php');
                }

                //4. Redirect with messaag to manaege-pizza page

            }
            
        ?>
    </div>
</div>

<?php include('section/footer.php');?>