<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizaa - Manage Admin</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <!-- Should add header part here -->

    <!-- conteriner -->
    <div class="main-content">
        <div class="wrapper">
            <h2>Manage Admin</h2>
            <br>
            <?php
                if (isset($_SESSION['add'])){

                    echo $_SESSION['add']; //Displaying the session Message
                    unset($_SESSION['add']);// removing the session Message
                } 
                
                if (isset($_SESSION['delete'])){

                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if (isset($_SESSION['update'])){

                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>


            <br><br><br>

            <a href="add-admin.php" class="btn-primary">Add Admin</a>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Full Name</th>
                    <th>Username</th>
                    <th>Actions</th>
                </tr> 

                <?php
                    //Query to get all admin
                    $sql = "SELECT * FROM tbl_admin";
                    //execute tthe query
                    $result = mysqli_query($con, $sql);

                    //check wether the query is executed or not
                    if ($result == TRUE){

                        //Count rows to check wether we have data in database or not
                        $rows_count = mysqli_num_rows($result);//function to get all the rows in database

                        $sn = 0;

                        //check the number of rows
                        if ($rows_count > 0){
                            // we have data in database
                            while($rows = mysqli_fetch_assoc($result)){
                                //using while loop to get all the data from databse

                                //GEt individual data
                                $id  = $rows['id'];
                                $full_name = $rows['fullname'];
                                $username = $rows['username'];

                                //Displaing vlaue in our table

                                ?>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $full_name; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td>
                                        <a href="<?php echo SITEURL;?>admin/update-admin.php?id=<?php echo $id;?>" class="btn-secondary">Update Admin</a>
                                        <a href="<?php echo SITEURL;?>admin/delete-admin.php?id=<?php echo $id;?>" class="btn-danger">Delete Admin</a>    
                                    </td>
                                <?php
                                
                            }
                        }
                        else{
                            //we do not have data in database
                        }
                    }
                
                
                
                ?>

            </table>
        </div>
    </div>
    <!-- end container -->

    <!-- shold add footer part here -->
    
</body>
</html>