<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizaa - Manage Category</title>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
    <div class="main-content">
        <div class="wrapper">
            <h2>Manage Category</h2>
            <br><br>

            <?php
                if (isset($_SESSION['add'])){
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                } 
                if (isset($_SESSION['remove'])){

                    echo $_SESSION['remove'];
                    unset ($_SESSION['remove']);
                } 
                
                if (isset($_SESSION['delete'])){

                    echo $_SESSION['delete'];
                    unset ($_SESSION['delete']);
                }

                if (isset($_SESSION['no-category-found'])){
                    
                    echo $_SESSION['no-category-found'];
                    unset($_SESSION['no-category-found']);
                }

                if (isset($_SESSION['update'])){

                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if (isset($_SESSION['failed_remove'])){
                    
                    echo $_SESSION['failed_remove'];
                    unset($_SESSION['failed_remove']);
                }
    
            ?>

            <br><br>

            <a href="<?php echo SITEURL;?> admin/add-category.php"  class="btn-primary">Add Category</a>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Image</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Action</th>
                </tr> 

                <?php
                    //query to get all categories from database
                    $sql = "SELECT * FROM category";

                    //execute the query
                    $result = mysqli_query($con, $sql);

                    //get count of the rows
                    $count = mysqli_num_rows($result);

                    //create serial number variable and design value as 1
                    $sn = 1;

                    //check whether we have data in database or not
                    if ($count >0){
                        //we have data in database
                        //get the data and doplayed

                        while($row = mysqli_fetch_assoc($result)){
                            $id = $row['id'];
                            $title = $row['title'];
                            $image_name = $row['image_name'];
                            $featured = $row['featured'];
                            $active = $row['active'];

                            ?>

                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $title; ?></td>

                                <td>
                                    <?php
                                    
                                        //check whether the imahe is available or not
                                        if ($image_name == ""){
                                            //Display the image
                                            ?>
                                            <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" width="100px">
                                            <?php
                                        }
                                        else{
                                            //display the message
                                            echo "<div class = 'error'>Image not Added</div>";
                                        }
                                    
                                    
                                    
                                    
                                    ?>
                                </td>
                                
                                <td><?php echo $featured; ?></td>
                                <td><?php echo $active; ?></td>

                            </tr>


                            <td>
                                <a href="<?php echo SITEURL;?>admin/update-category.php?id = <?php echo $id ;?>&" class="btn-secondary">Update Category</a>
                                <a href="<?php echo SITEURL;?> admin/delete-category.php?id = <?php echo $id;?>&image_name=<?php echo $image_name;?>" class="btn-danger">Delete Category</a>
                            </td>

                                <?php
                        }
                    }
                    else{
                        //we don't have database
                        //we will display the message inside table
                        ?>
                        <tr>
                            <td colspan="6" class = "error">No Category Added</td>
                        </tr>

                        <?php             

                    }           
                
                ?>

               

            </table>
        </div>
    </div>
</body>
</html>