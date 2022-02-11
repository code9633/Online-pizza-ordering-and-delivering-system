<?php

include('includes/header.php');
ob_start();
include('includes/navbar.php');

?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Add Pizza </h6> 
    </div>
    <div>
        <?php
            if (isset($_SESSION['upload'])){

                echo $_SESSION['upload'];
                unset($_SESSION['upload']);
            }   
        
        ?>
    </div>

    <div class="card-body">
      <form action="" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

          <div class="form-group">
            <label> Title </label>
            <input type="text" name="title" class="form-control" placeholder="Title of the pizza" required>
          </div>

          <div class="form-group">
            <label> Description </label>
            <textarea type="text" name="description" class="form-control" placeholder="Description of the pizza"></textarea>
          </div>

          <div class="form-group">
            <label> Price </label>
                <div class="input-group-prepend">
                    <span class="input-group-text">$</span>
                    <input type="number" name="price" class="form-control" >
                    <span class="input-group-text">.00</span>
                </div>
          </div>
         
          <div class="form-group">
            <label for="customFile"> Upload Image </label>
            <input type="file" name="image" class="form-control" id="customFile">
          </div>

          <div class="form-group">
              <label> Category </label>
              <select class="custom-select " name="category">
                  <?php
                        // Create php code to display categrories from database
                        // 1. Create SQL to get all active categories from database

                        $sql = "SELECT * FROM category WHERE active = 'Yes'";

                        // Execute the query
                        $result = mysqli_query($con, $sql);

                        //Count rows to check whether we have cattegories or not
                        $count = mysqli_num_rows($result);

                        //if count is greater than zero we have categorized or not
                        if ($count >0){
                            //have categories in database
                            while($row = mysqli_fetch_assoc($result)){
                                //get the details of the categroies
                                $id = $row['id'];
                                $title = $row['title'];
                                ?>
                                <option value="<?php echo $id;?>"><?php echo $title;?></option>
                                <?php
                            }
                        }
                        else{
                            //categroies not have in database
                            ?>
                                <option value="0">NO CATEGORY FOUND.</option>
                            <?php
                        } 
                  
                  ?>
              </select>

          </div>

          <div class="form-group">
            <label> Featured  </label> 
            <span> &nbsp; &nbsp; &nbsp;</span>
            <input type="radio" name="featured" id="inlineRadio1" value="Yes" > Yes
           
            <span> &nbsp;</span>
            <input type="radio" name="featured" id="inlineRadio1" value="No" > No
            
          </div>

          <div class="form-group">
            <label> Active </label> 
            <span> &nbsp; &nbsp; &nbsp;</span>
            <input type="radio" name="active" id="inlineRadio1" value="Yes" > Yes
            
            <span> &nbsp;</span>
            <input type="radio" name="active" id="inlineRadio1" value="No" > No
           
          </div>

        </div>
        <div class="modal-footer">
            <a href="manage-pizza.php" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="submit" class="btn btn-primary">SAVE</button>
        </div>
      </form>

    </div>
  </div>
</div>

<?php
//check whether the submit button is clicked or not
if(isset($_POST['submit'])){

    //1.get the data from form
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category = $_POST['category'];

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
        //get the value from form 
        $active = $_POST['active'];
    }
    
    else{
        //set the default value
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

            $temm = explode('.', $image_name);
            $ext = end($temm);

            //rename the image
            $image_name = "pizza_name_".rand(000,999).'.'.$ext;

            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "../images/pizza/".$image_name;

            // B. upload the image
            $upload = move_uploaded_file($source_path, $destination_path);

            //check whether the image is uoloaded or not
            //adn if the imahe is not uploaded them we stop the process and redirect with wrror message
            if ($upload == false){

                //set message 
                $_SESSION['upload'] = "<p class='error'>*Failed to Upload Image.</div>";
                //rdirect to add  category page
                header('location:add-pizza.php');
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
    $sql2 = "INSERT INTO food SET
        title = '$title',
        price = $price,
        image_name = '$image_name',
        category_id = '$category',
        featured = '$featured',
        active = '$active'
    ";

    //3.execute the query and save in database
    
    $result2 = mysqli_query($con, $sql2);

    //4. check whether the query secuted or not and data added or not

    if($result2 == true){
        //query executed and category added
        $_SESSION['add'] = "<p class = 'success'>*Pizza Added Succesfully.</p>";
        //redirect to the manage category page
        header('location:manage-pizza.php');
    }
    else{
        //failed to add category
        $_SESSION['add'] = "<p class = 'error'> *Failed to Add Pizza.</p>";
        //redirect to the manage category page
        header('location:manage-pizza.php');
    }
}        

?>

<!-- End of the add categroy part -->