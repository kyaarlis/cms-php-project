    <?php add_user(); ?>
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input class="form-control" type="text" id="username" name="username">
                        </div>

                        <div class="form-group">
                            <label for="passwd">Password</label>
                            <input class="form-control" type="password" id="passwd" name="password">
                        </div>

                        <div class="form-group">
                            <label for="fname">First Name</label>
                            <input class="form-control" type="text" id="fname" name="fname">
                        </div>

                        <div class="form-group">
                            <label for="lname">Last Name</label>
                            <input class="form-control" type="text" id="lname" name="lname">
                        </div>

                        <div class="form-group">
                            <label for="email">E-Mail</label>
                            <input class="form-control" type="email" id="email" name="email">
                        </div>

                        <div class="form-group">
                            <label for="img" class="form-label">User Image</label>
                            <input class="form-control" type="file" id="img" name="user_image">
                        </div>

                        <div class="form-group">
                            <label for="role">User Role</label>
                            <select name="role" id="role">
                                <option value='admin'>admin</option>
                                <option value='subscriber' selected>subscriber</option>
                            </select>  
                        </div>


                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name='add_user' value="Register User">
                        </div>
                    </form>