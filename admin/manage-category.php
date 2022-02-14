<?php

include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
        <form action="add-category.php" method="POST">
          <h6 class="m-0 font-weight-bold text-primary">Manage Category
            <button type="submit" class="btn btn-primary" >
                 Add 
            </button>
          </h6>
        </form> 
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

                  //Displaying the no category found message
                  if(isset($_SESSION['no-category-found'])){
                    echo $_SESSION['no-category-found'];
                    unset($_SESSION['no-category-found']);
                  }

                  //Display the message afer deletion
                  if(isset($_SESSION['delete'])){
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                  }
                  
                  //Display the message if failed to remove the image
                  if (isset($_SESSION['remove'])){

                    echo $_SESSION['remove'];
                    unset ($_SESSION['remove']);
                }
              ?>
          </div>

          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th> S.N </th>
                          <th> Title </th>
                          <th> Image </th>
                          <th> Featured </th>
                          <th> Active </th>
                          <th>EDIT </th>
                          <th>DELETE </th>
                      </tr>
                  </thead>

                  <tbody>
        
                  <?php
                      //Query to get all categories fromm datacbase
                      $sql2 = "SELECT * FROM category";

                      //Execute the query
                      $result2 = mysqli_query($con, $sql2);

                      if($result2 == true){
                          //Count rows to check wether we have data in database or not
                        $row_count = mysqli_num_rows($result2);

                        //create serial number variable and design value
                        $sn = 1;
                
                        if ($row_count > 0){
                          //we have data in database
                          //get the data and displayed

                          while($row = mysqli_fetch_assoc($result2)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                          

                            ?>
                            <tr>
                              <td><?php echo $sn++;?></td>
                              <td><?php echo $title;?></td>

                              <td>
                                <?php

                                    //check whther the image is avilable or not
                                    if($image_name != ""){
                                      //Display the image
                                      ?>
                                          <img src="../images/category/<?php echo $image_name;?>" width="200px" height="100px" >
                                      <?php
                                    
                                    }
                                    else{
                                      //Display the message
                                      echo "<div class = 'error'>Image Not Added</div>";
                                    }
                                
                                ?>
                              </td>
                              
                              <td><?php echo $featured;?></td>
                              <td><?php echo $active;?></td>

                              <td>
                                  <form action="update-category.php?id=<?php echo $id;?>" method="POST">
                                    <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                  </form>
                              </td>
                              <td>
                                  <form action="delete-category.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" method="POST">
                                    <button type="submit" name="delete_btn" class="btn btn-danger"> DELETE</button>
                                  </form>
                              </td>
  
                          </tr>

                          <?php

                          }
                        }
                        else{
                          //we don't have database
                          //Display the message inside tabel
                          ?>
                          <tr>
                            <div>
                                <td colspan="7" class="error " style="text-align: center;">No Category Added.</td>
                            </div> 
                          </tr>
                          <?php
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