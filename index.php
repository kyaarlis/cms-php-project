<!-- Header -->
 <?php 
 include "db/db.php";
 include "includes/header.php"; ?>

  <!-- Navigation -->
  <?php include "includes/navbar.php" ?> 

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <h1 class="page-header">
                    Tech Hub
                    <small>Programmer's forum</small>
                </h1>

                <!-- Blog Post -->
                <?php
                if (isset($_GET['category_id'])) {
                    $category_id = $_GET['category_id'];

                    $query = "SELECT * FROM posts WHERE category_id = {$category_id}";
                } else {
                    $query = "SELECT * FROM posts";
                }
                
                    $post_query = mysqli_query($conn, $query);

                    if (!$post_query) {
                        die ('Query error!' . mysqli_error($conn));
                    }

                     while ($post = mysqli_fetch_assoc($post_query)) {
                        $id = $post['id'];
                        $title = $post['title'];
                        $author = $post['author'];
                        $date = $post['date'];
                        $img = $post['image'];
                        $content = substr($post['content'], 0, 100);
                        ?>

                    <h2>
                        <a href="post.php?id=<?php echo $id; ?>"><?php echo $title; ?></a>
                    </h2>
                    <p class="lead">
                        by <a href="index.php"><?php echo $author; ?></a>
                    </p>
                    <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date; ?></p>
                    <hr>
                    <img class="img-responsive" width="200" src="images/<?php echo $img; ?>" alt="">
                    <hr>
                    <p><?php echo $content; ?></p>
                    <a class="btn btn-primary" href="post.php?id=<?php echo $id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
                <?php } ?>
                
                <hr>

            </div>

            <!-- Blog Sidebar Widgets Column -->
              <?php include "includes/sidebar.php"; ?>
        

        </div>
        <!-- /.row -->

        <hr>

    <!-- Footer -->
    <?php include "includes/footer.php" ?>


