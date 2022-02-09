<?php

include('includes/header.php');
include('includes/navbar.php');

//Process the value fron form and save it in softeware

//Check whether the submit button click or not
if (isset($_POST['registerbtn'])) {

  //Get the data from form
  $full_name = $_POST['fullname'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password']; // pasword decryption
  $confirm_password = $_POST['confirm_password'];

  //1. sql query to save the data in to admin database table
  $sql =  "INSERT INTO admin SET 
          fullname = '$full_name',
          username = '$username',
          email = '$email',
          password = '$password'
        
        ";

  //2. execute the query and save data in database
  $result = mysqli_query($con, $sql);

  //check whether the quweru is executed and data is inserted or not and display apppropraite message
  if ($result == true) {
    //data inserted
    //create a session variable to display message
    $_SESSION['add'] =  "<p class = 'success'>*Admin added Succesfully.</p> ";
    //redirect we page to register.php

  } else {
    //fail to insert data
    //Create session variable to display message
    $_SESSION['add'] =  "<p class = 'error'>*Failed to add Admin Infromation.</p> ";
    //redirect wep page tto register.php
  }
}

?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="" method="POST">

        <div class="modal-body">

          <div class="form-group">
            <label> Username </label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
          </div>
          <div class="form-group">
            <label> Full Name </label>
            <input type="text" name="fullname" class="form-control" placeholder="Enter Full Name" required>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" name="email" class="form-control" placeholder="Enter Email" required>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" onclick="passwordValidation()" name="password" class="form-control" id="password" placeholder="Enter Password" required>
          </div>
          <div class="form-group">
            <label>Confirm Password</label>
            <input type="password" onclick="passwordValidation()" name="confirm_password" class="form-control" id="confirmPassword" placeholder="Confirm Password" required>
            <p id="message"></p>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
         <h6 class="m-0 font-weight-bold text-primary">Admin Profile
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                 Add Admin Profile
            </button>
          </h6>
      </div>

      <div class="card-body">
          <div>
              <?php
                  // Display the session message
                  if (isset($_SESSION['add'])) { //checing whether the sesion is set of not
                      echo $_SESSION['add']; //Display the session message if set
                      unset($_SESSION['add']); //Remove Session messsage
                  }
                  
                  //Display admin update message
                  if(isset($_SESSION['update'])){
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                  }
              ?>
          </div>

          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th> ID </th>
                          <th> Full Name </th>
                          <th>Email </th>
                          <th>Username</th>
                          <th>EDIT </th>
                          <th>DELETE </th>
                      </tr>
                  </thead>

                  <tbody>
        
                  <?php
                      //Query to get all admin
                      $sql2 = "SELECT * FROM admin";
                      //Execute the query
                      $result2 = mysqli_query($con, $sql2);

                      //Check whether the query is executed ot not
                      if ($result2 == true) {
                        //Count rows to check wether we have data in database or not
                          $row_count = mysqli_num_rows($result2);

                          $sn = 1;

                          //Check the number of rows
                          if ($row_count > 0) {
                            //data havein database
                              while ($rows = mysqli_fetch_assoc($result2)) {
                              //using while loop to get all daa from database

                                  //Get individuall data
                                  $id = $rows['id'];
                                  $full_name = $rows['fullname'];
                                  $email = $rows['email'];
                                  $username = $rows['username'];

                              //Displayig value in table
                  ?>

                      <tr>
                          <td><?php echo $sn++; ?></td>
                          <td><?php echo $full_name; ?></td>
                          <td><?php echo $email; ?></td>
                          <td><?php echo $username; ?></td>
                          <td>
                              <form action="update-admin.php?id=<?php echo $id; ?>" method="post">
                                <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                              </form>
                            </td>
                            <td>
                              <form action="" method="post">
                                <input type="hidden" name="delete_id" value="">
                                <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                              </form>
                            </td>
                      </tr>
                  <?php
                              }

                          }

                          else {
                                  //we don't have dta in database
                          }
                      }
                  ?>
                </tbody>
            </table>

        </div>
    </div>
  </div>
</div>
<!-- container fluid -->


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>