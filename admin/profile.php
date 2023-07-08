<?php 
include "includes/admin_header.php";
include "functions/profile_functions.php";  
 ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <?php include "includes/admin_heading.php" ?>

                <?php
                // Fetching looged in user data from database
                $query = "SELECT * FROM users WHERE id = {$_SESSION['user_id']}";

                $user_query = mysqli_query($conn, $query);

                confirm_query($user_query);

                $user = mysqli_fetch_assoc($user_query);
                $username = $user['username'];
                $password = $user['password'];
                $firstname = $user['firstname'];
                $lastname = $user['lastname']; 
                $email = $user['email']; 
                $user_image = $user['user_image'];
                $role = $user['role'];

                ?>

                    <div class="row align-items-start">
                            <div class="col-md-6">
                                <img class="img-thumbnail" width="400" src="./user_images/<?php echo $user_image; ?>" alt="userImage">
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col ">
                            <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input class="form-control" type="text" id="username" name="username" value="<?php echo $username; ?>">
                            </div>

                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input class="form-control" type="text" id="firstname" name="firstname" value="<?php echo $firstname; ?>">
                            </div>

                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input class="form-control" type="text" id="lastname" name="lastname" value="<?php echo $lastname; ?>">
                            </div>

                            <div class="form-group">
                                <label for="email">E-Mail Adress</label>
                                <input class="form-control" type="email" id="email" name="email" value="<?php echo $email; ?>">
                            </div>   

                            <div class="form-group">
                                <label for="role">My Role</label>
                                <select name="role" id="role">
                                <?php
                                    if ($role == 'admin') {
                                    echo "<option value='admin' selected>admin</option>";
                                    echo "<option value='subscriber'>subscriber</option>";
                                    } else {
                                        echo "<option value='subscriber' selected>subscriber</option>";
                                        echo "<option value='admin'>admin</option>";
                                    }               
                                ?>
                                </select>  
                            </div>

                            <div class="form-group">
                                <input class="btn btn-primary" type="submit" name='edit_profile' value="Edit Profile">
                            </div>
                        </form>
                        <?php edit_profile(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
    <?php include "includes/admin_footer.php" ?>

    <style>
        body {
            overflow-x: hidden;
        }
    </style>