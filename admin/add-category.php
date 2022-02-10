<?php

include('includes/header.php');
ob_start();
include('includes/navbar.php');

?>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"> Add Category </h6> 
    </div>

    <div class="card-body">
      <form action="" method="POST" enctype="multipart/form-data">

        <div class="modal-body">

          <div class="form-group">
            <label> Title </label>
            <input type="text" name="title" class="form-control" placeholder="Enter Title" required>
          </div>

          <div class="form-group">
            <label for="customFile"> Upload Image </label>
            <input type="file" name="image" class="form-control" id="customFile">
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
            <a href="manage-category.php" class="btn btn-danger">CANCEL</a>
            <button type="submit" name="submit" class="btn btn-primary">SAVE</button>
        </div>
      </form>

    </div>
  </div>
</div>

<?php
//check whether the submit button is clicked or not
if(isset($_POST['submit'])){

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
            $image_name = "food_category_".rand(0000,9999).'.'.$ext;

            $source_path = $_FILES['image']['tmp_name'];

            $destination_path = "../images/category/".$image_name;

            //upload the image
            $upload = move_uploaded_file($source_path, $destination_path);

            //check whether the image is uoloaded or not
            //adn if the imahe is not uploaded them we stop the process and redirect with wrror message
            if ($upload == false){

                //set message 
                $_SESSION['upload'] = "<p class='error'>*Failed to Upload Image.</div>";
                //rdirect to add  category page
                header('location:manage-category.php');
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
        title = '$title',
        image_name = '$image_name',
        featured = '$featured',
        active = '$active'
    ";

    //3.execute the query and save in database
    
    $result = mysqli_query($con, $sql);

    //4. check whether the query secuted or not and data added or not

    if($result == true){
        //query executed and category added
        $_SESSION['add'] = "<div class = 'success'>*Category Added Succesfully.</div>";
        //redirect to the manage category page
        header('location:manage-category.php');
    }
    else{
        //failed to add category
        $_SESSION['add'] = "<div class = 'success'> *Failed to Add Category.</div>";
        //redirect to the manage category page
        header('location:manage-category.php');
    }
}        

?>

<!-- End of the add categroy part -->