<?php

include('includes/header.php');
include('includes/navbar.php');

?>

<div class="container-fluid">

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
      <div class="card-header py-3">
        <form action="add-pizza.php" method="POST">
          <h6 class="m-0 font-weight-bold text-primary">Manage Pizza
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
                  if (isset($_SESSION['upload'])){

                    echo $_SESSION['upload'];
                    unset ($_SESSION['upload']);
                  }

                  if (isset($_SESSION['unauthorized'])){
                    
                    echo $_SESSION['unauthorized'];
                    unset($_SESSION['unauthorized']);
                  }
                  
              ?>
          </div>

          <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th> S.N </th>
                          <th> Title </th>
                          <th> Price </th>
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
                      $sql = "SELECT * FROM food";

                      //Execute the query
                      $result = mysqli_query($con, $sql);

                      if($result == true){
                          //Count rows to check wether we have data in database or not
                        $row_count = mysqli_num_rows($result);

                        //create serial number variable and design value
                        $sn = 1;
                
                        if ($row_count > 0){
                          //we have data in database
                          //get the data and displayed

                          while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $price = $row['price'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];
                          

                            ?>
                            <tr>
                              <td><?php echo $sn++;?></td>
                              <td><?php echo $title;?></td>
                              <td><?php echo $price;?></td>

                              <td>
                                <?php

                                    //check whther the image is avilable or not
                                    if($image_name != ""){
                                      //Display the image
                                      ?>
                                          <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" width="200px" height="100px" >
                                      <?php
                                    
                                    }
                                    else{
                                      //Display the message
                                      echo "<p class = 'error'>Image Not Added</p>";
                                    }
                                
                                ?>
                              </td>
                              
                              <td><?php echo $featured;?></td>
                              <td><?php echo $active;?></td>

                              <td>
                                  <form action="update-pizza.php?id=<?php echo $id;?>" method="POST">
                                    <button type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
                                  </form>
                              </td>
                              <td>
                                  <form action="delete-pizza.php?id=<?php echo $id;?>&image_name=<?php echo $image_name;?>" method="POST">
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
                                <td colspan="8" class="error " style="text-align: center;">Food not Added Yet.</td>
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