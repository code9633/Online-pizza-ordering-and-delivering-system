<?php include('section/header.php')?>
<body>
    <div class="main-content">
        <div class="wrapper">
            <h2>Manage Pizza</h2>
            <br><br>

            <a href="<?php echo SITEURL?>admin/add-food.php" class="btn-primary">Add Pizza</a>

            <br><br><br>
            <?php
                if (isset($_SESSION['add'])){

                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }  

                if (isset($_SESSION['delete'])){

                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
                if (isset($_SESSION['upload'])){

                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                if (isset($_SESSION['unauthorized'])){
                    
                    echo $_SESSION['unauthorized'];
                    unset($_SESSION['unauthorized']);
                }

                if (isset($_SESSION['update'])){
                    
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>

            <table class="tbl-full">
                <tr>
                    <th>S.N.</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Featured</th>
                    <th>Active</th>
                    <th>Actions</th>
                </tr> 

                <?php 
                
                    //create sql querry to get all the food 
                    $sql = "SELECT * FROM tbl_food";

                    //execute the query
                    $result = mysqli_query($con, $sql);

                    //count rows to check whether the we have foods or not
                    $count = mysqli_num_rows($result);

                    //create serial number variable and set default as 1
                    $sn = 1;


                    if ($count > 0){
                        //we have food in database
                        //get the foods from database and display

                        while ($row = mysqli_fetch_assoc($res)){
                            //get the value from indiviual columns
                            $id = $row['id'];
                            $title = $row['title'];
                            $price = $row['price'];
                            $image_name = $row['featured'];
                            $active = $row['acitve'];

                            ?>
                            <tr>
                                <td><?php echo $sn++;?></td>
                                <td><?php echo $title;?></td>
                                <td>$ <?php echo $price;?></td>
                                <td>
                                    <?php 
                                        //check whether we have image or not
                                        if ($image_name = ""){
                                            //we donthave image , display error message
                                            echo "<div class = 'error'>Image not Added.</div>";

                                        }
                                        else{
                                            //we have image, Display image
                                            ?>
                                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name;?>" width="150px">

                                            <?php
                                        }
                                    
                                    
                                    
                                    ?>
                                </td>
                                <td><?php echo $featured;?></td>
                                <td><?php echo $active;?></td>
                                <td>
                                    <a href="<?php echo SITEURL;?>admin/update-food.php?id = <?php echo $id;?>&image_name = <?php echo $image_name;?> " class = "btn-secondary">Update Food</a>
                                    <a href="<?php echo SITEURL;?>admin/delete-food.php?id = <?php echo $id;?>&image_name =<?php echo $image_name;?>" class = "btn-danger">Delete Food</a>
                                </td>
                            </tr>

                            <?php 
                        }

                    }
                    else{
                        //food not added in database
                        echo "<tr><td colspan = '7' class = 'error '>Food not Added Yet.</tr>";
                    }
                
                
                ?>

            </table>
        </div>
    </div>
</body>

<?php include('section/footer.php') ?>