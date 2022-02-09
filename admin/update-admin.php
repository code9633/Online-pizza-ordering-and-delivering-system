<?php
    //adding header and naviation bar
    include('includes/header.php');
    ob_start();
    include('includes/navbar.php');
?>
<!-- A.Get the data from the database and display the particular field -->
<?php

    //1. Get the id of selected admin
    $id = $_GET['id'];

    //2. Create sql query to set the daitails
    $sql = "SELECT * FROM admin WHERE id = $id";

    //Execute the query
    $result = mysqli_query($con, $sql);

    //check whether the queyry is executed or not
    if($result == true){
        //check whther the data is available or not
        $count_rows = mysqli_num_rows($result);
        //Check whether have admin data or not
        if($count_rows == 1){
            //get the deatails
            
            $row = mysqli_fetch_assoc($result);

            $fullname = $row['fullname'];
            $username = $row['username'];
            $email = $row['email'];
        }
        else{
            //failed to get the details
            //redirect  to  in register page
            header('location: register.php');
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
        <form action="" method="POST">
            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username"  class="form-control" value="<?php echo $username;?>" required >
            </div>
            <div class="form-group">
                <label> Full Name </label>
                <input type="text" name="fullname"  class="form-control" value ="<?php echo $fullname;?>" required >
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email"  class="form-control"value ="<?php echo $email;?>" required>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="id" value="<?php echo $id;?>">
                <a href="register.php" class="btn btn-danger">Cancel</a>
                <button type="submit" name="updatebtn" class="btn btn-primary">Update</button>
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
    //get all the value form form to update
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
   

    //create a sql querry to update admin
    $sql2 = "UPDATE admin SET 
        fullname = '$fullname',
        username = '$username',
        email = '$email'
        WHERE id = '$id'
    ";

    //execute the query
    $result2 = mysqli_query($con, $sql2);

    //check whetere the query executed successfully or not
    if($result2 == true){
        //Query executed and admin update

        $_SESSION['update'] = "<p class= 'success'>Admin Updated Succesfully.</p>";
        //redirect to register page
        header('location:register.php');

    }
    else{
        //failed to update admin
        $_SESSION['update'] = "<p class ='error'>Failed to delete admin</p>";
        //redirect to the admin page
        header('location:register.php');
    }
  
}

// adding footer part 
include('includes/footer.php');
include('includes/scripts.php');

?>

