<?php
    //process the value from form  and save it in database

    // check whether the submit button click or not
    if (isset($_POST['submit'])){

        //Get the data from form
        $fullname = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']); // password decryption

        //sql auery to save the data into admin databse table
        $sql = "INSERT INTO tbl_admin SET 
            fullname = '$full_name',
            username = '$username',
            password = '$password'  
        ";

        //execute query and save data in database
        $result = mysqli_query($con, $sql) or die (mysqli_error($con, $sql));

        //check whether the (Query is executed ) data is inserted   or not and display appropriate message
        if ($result == TRUE){
            //data inserted
            //create a session variable to display message
            $_SESSION['add'] = "Admin Added Succesfully";
            //redirect web page TO manage admin 
            header("location:".SITEURL.'admin/manage-admin.php');
        }
        else{
            //fail to insert data
            //create sesion variable to display message
            $_SESSION['add'] = "Faild to add Admin Information";
            //redirect web page to manage admin
            header("location:".SITEURL.'admin/manage-admin.php');        

        }

    }

    // else{
    //     //button not clicked

    //     echo "button not clicked";
    // }

?>

<?php include('section/header.php')?>

  <!-- Main content is start -->

    <div class="main-content">
        <div class="wrapper"></div>
        <h1>Add Admin</h1>
        <br><br>

        <?php
            if (isset($_SESSION['add'])){ //checing whether the sesion is set of not
                echo $_SESSION['add']; //Display the session message if set
                unset($_SESSION['add']);//Remove Session messsage
            }      
        
        ?>


        <form action="" method="POST">
            <table class="tbl-30">
                <tr>
                    <td>Full Name :</td>
                    <td><input type="text" name="full_name" placeholder="Enter full name"></td>
                </tr>
                <tr>
                    <td>Username: </td>
                    <td>
                        <input type="text" name="username" placeholder="Enter Username">
                    </td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter Password">
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" name="submit" value="Add Admin " class="btn-secondary">
                    </td>
                </tr>
            </table>
        </form>
    </div>

    <!-- Main content is end -->


<?php include('section/footer.php');?>