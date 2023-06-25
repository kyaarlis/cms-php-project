<?php include "includes/admin_header.php" ?>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Wellcome to Admin
                            <small>Author</small>
                        </h1>

                        <?php

                        if (isset($_POST['submit'])) {

                            $title = $_POST['title'];
                            $title = mysqli_real_escape_string($conn, $title);

                            if ($title == "" || empty($title)) {
                                echo "This field cannot be empty!";

                            } else {

                                $query = "INSERT INTO categories(title) ";
                                $query .= "VALUES ('$title')";

                                $post_query = mysqli_query($conn, $query);

                                if (!$post_query) {
                                    die('Query failed!' . mysqli_error($conn));
                                }
                            }

                            
                        }
                        
                        ?>

                        <div class="col-xs-6">
                            <form action="categories.php" method="post">
                                <div class="form-group">
                                    <label for="title">Category title</label>
                                    <input type="text" id="title" class="form-control" name="title">
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Category">
                                </div>
                            </form>
                        </div> 

                        <div class="col-xs-6">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Category Title</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $query = "SELECT * FROM categories";

                                    $categories = mysqli_query($conn, $query);

                                    if (!$categories) {
                                        die ("Query err!" . mysqli_error($conn));
                                    }

                                    while ($row = mysqli_fetch_assoc($categories)) {
                                        $id = $row['id'];
                                        $title = $row['title'];

                                        echo "<tr>";
                                        echo "<td>{$id}</td>";
                                        echo "<td>{$title}</td>";
                                        echo "<td><a href='categories.php?delete={$id}'>Delete</a></td>";
                                        echo "</tr>";
                                    } 
                                ?>

                                <?php

                                if (isset($_GET['delete'])) {
                                    $id = $_GET['delete']; 

                                    $delete_query = "DELETE FROM categories WHERE ";
                                    $delete_query .= "id = {$id}";    

                                    $result = mysqli_query($conn, $delete_query);

                                    if (!$result) {
                                        die ('Failed query!' . mysqli_error($conn));
                                    }

                                    header("Location: categories.php");
                                }

                                ?>
                              
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>