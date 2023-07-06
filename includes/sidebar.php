<div class="col-md-4">

<!-- Blog Search Well -->
<div class="well">
    <h4>Blog Search</h4>
    <form action="search.php" method="post">
        <div class="input-group">
            <input type="text" class="form-control" name="search">
            <span class="input-group-btn">
                <button class="btn btn-default" type="submit" name="submit">
                    <span class="glyphicon glyphicon-search"></span>
            </button>
            </span>
        </div>
    </form>
    <!-- /.input-group -->
</div>


<!-- Login Form -->
<div class="well">
    <h4>Login</h4>
    <form action="includes/login.php" method="post">
        <div class="form-group">
            <input type="text" class="form-control" name="username" placeholder="Username">
        </div>
        <div class="input-group">
            <input type="password" class="form-control" name="password" placeholder="Enter password">
            <span class="input-group-btn">
                <button class="btn btn-primary" type="submit" name="login">Log In</button>
            </span>
        </div>
    </form>
    <!-- /.input-group -->
</div>

<!-- Blog Categories Well -->





<div class="well">
    <h4>Blog Categories</h4>
    <div class="row">
        <div class="col-lg-6">
            <ul class="list-unstyled">
            <?php

                $query = "SELECT * FROM categories";

                $categories = mysqli_query($conn, $query);

                if (!$categories) {
                    die ("Query err!" . mysqli_error($conn));
                }

                while ($row = mysqli_fetch_assoc($categories)) {
                    $id = $row['id'];
                    $title = $row['title'];

                    echo "<li><a href='index.php?category_id={$id}'>{$title}</a></li>";
                }  
            ?>
            </ul>
        </div>
        <!-- /.col-lg-6 -->
        <!-- <div class="col-lg-6">
            <ul class="list-unstyled">
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
                <li><a href="#">Category Name</a>
                </li>
            </ul>
        </div> -->
        <!-- /.col-lg-6 -->
    </div>
    <!-- /.row -->
</div>

<!-- Side Widget Well -->
<?php include "widget.php" ?> 

</div>