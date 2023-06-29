<?php 
    include "includes/admin_header.php";
    include "functions.php";
 ?>

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

                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Post Id</th>
                                    <th>Author</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Status</th>
                                    <th>Image</th>
                                    <th>Tags</th>
                                    <th>Comments</th>
                                    <th>Date</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php

                                $query = "SELECT * FROM posts";

                                $posts = mysqli_query($conn, $query);

                                if (!$posts) {
                                    die ("Query err!" . mysqli_error($conn));
                                }

                                while ($row = mysqli_fetch_assoc($posts)) {
                                    $id = $row['id'];
                                    $author = $row['author'];
                                    $title = $row['title'];
                                    $category = $row['category_id'];
                                    $status = $row['status'];
                                    $image = $row['image'];
                                    $tags = $row['tags'];
                                    $comments = $row['comment_count'];
                                    $date = $row['date'];
                                    echo "<tr>";
                                    echo "<td>{$id}</td>";
                                    echo "<td>{$author}</td>";
                                    echo "<td>{$title}</td>";
                                    echo "<td>{$category}</td>";
                                    echo "<td>{$status}</td>";
                                    echo "<td><img width=100 src='../images/$image'/></td>";
                                    echo "<td>{$tags}</td>";
                                    echo "<td>{$comments}</td>";
                                    echo "<td>{$date}</td>";
                                    echo "</tr>";
                                } 
                                
                                ?>
                            </tbody>
                        </table>
  
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>