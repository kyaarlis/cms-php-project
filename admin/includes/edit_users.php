<?php edit_user(); ?>
                <?php 
                if (isset($_GET['id'])) {
                    $user_id = $_GET['id'];
                }

                global $conn;

                $query = "SELECT * FROM users WHERE id = {$user_id}";

                $users = mysqli_query($conn, $query);
            
                confirm_query($users);
            
                while ($user = mysqli_fetch_assoc($users)) {
                    $id = $user['id'];
                    $username = $user['username'];
                    $password = $user['password'];
                    $firstname = $user['firstname'];
                    $lastname = $user['lastname'];
                    $user_image = $user['user_image'];
                    $email = $user['email'];
                    $role = $user['role'];
                }
                ?>
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" id="username" name="username" value="<?php echo $username; ?>">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control" type="text" id="password" name="password" value="<?php echo $password; ?>">
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
                            <label for="image" class="form-label">User Image</label>
                            <img width="100" src="./user_images/<?php echo $user_image; ?>" alt="image">
                            <input type="hidden" name="current_image" value="./user_images/<?php echo $user_image; ?>">
                            <input class="form-control" type="file" id="image" name="image">
                        </div>    

                        <div class="form-group">
                            <label for="role">User Role</label>
                            <select name="role" id="role">
                                <option value='admin'>admin</option>
                                <option value='subscriber' selected>subscriber</option>
                            </select>  
                        </div>

                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name='edit_user' value="Edit User">
                        </div>
                      </form>