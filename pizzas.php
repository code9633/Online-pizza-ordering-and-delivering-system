<?php include('front-section/header.php');?>

        <div class="container-wrapper">
            <div class="page-bg" style=" background-image: url(upload/bg-pizza.jpg); "></div>
            <div id="fullwidth-container">
                <!-- start container -->
                <div class="page-title-wrapper">
                    <div class="page-title-outher">
                        <div class="page-title-inner">
                            <span class="page-title-icon flaticon-pizza-slice"></span>
                            <h1 class="page-title">Pizzas</h1>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
                <div class="page-wrapper">
                    <div class="offer-menu2-wrapper">
                        <div class="offer-menu2-items">

                        <?php 
                            //Create the sql query to display categries from database
                            $sql = "SELECT * FROM food";
                            
                            //Execute the query
                            $result = mysqli_query($con, $sql);

                            //count variable to check whether the category is available or not
                            $count = mysqli_num_rows($result);

                            if ($count > 0){
                                //Pizza is available
                                while($row = mysqli_fetch_assoc($result)){
                                    //Get the value like id, title, image name, price, description
                                    $id = $row['id'];
                                    $title = $row['title'];
                                    $image_name = $row['image_name'];
                                    $description = $row['description'];
                                    $price = $row['price'];
                                    
                                    ?>
                                        <div class="offer-menu2-item-single">
                                            <img class="offer-menu2-frame" src="images/frame.png">
                                            <div class="offer-menu2-shadow"></div>
                                            <div class="offer-menu2-thumb">
                                                <img class="offer-menu2-inner-frame" src="images/inner-shadow.png">
                                            </div>
                                            <div class="offer-menu2-thumb-image"><img src="images/pizza/<?php echo $image_name;?>" style= "width:313px; heigth: 220px;" ></div>
                                            <div class="clear"></div>
                                            <span class="offer-menu2-icon flaticon-pizza-slice"></span>
                                            <div class="offer-menu2-details">
                                                <div class="single-offer-menu2-title"><?php echo $title;?></div>
                                                <div class="single-offer-menu2-content">
                                                    <p><?php echo $description;?></p>
                                                </div>
                                                <div class="single-offer-menu2-price">$<?php echo $price;?></div>
                                            </div>
                                        </div>

                                    <?php
                                }
                            }
                            else{
                                //Pizzas category is not availble
                                echo "<div class = 'error'>Category is not added.</div>";
                            }
                        
                        
                        ?>
                            
                            
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <!-- end page wrapper -->
            </div>
            <!-- end container -->
            <div class="clear"></div>
        </div>
        <!-- end container-wrapper -->

    </div>

<?php 
include('front-section/script.php');
include('front-section/footer.php');
?>