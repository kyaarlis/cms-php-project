<!-- Header -->
 <?php 
 include "db/db.php";
 include "includes/header.php"; ?>

  <!-- Navigation -->
  <?php include "includes/navbar.php" ?> 

  <title>Home</title>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <!-- Blog Post -->
                <?php
                if (isset($_GET['category_id'])) {
                    $category_id = $_GET['category_id'];

                    $query = "SELECT * FROM posts WHERE category_id = {$category_id} ";
                    $query .= "AND status = 'public' ";
                    $query .= "ORDER BY id DESC";

                } else {
                    $query = "SELECT * FROM posts WHERE status = 'public'";
                }
                
                    $post_query = mysqli_query($conn, $query);

                    confirm_query($post_query);

                    if (mysqli_num_rows($post_query) == 0) {
                        echo "<h1 class='text-center'>Sorry, No Post</h1>";
                    } else {


                    while ($post = mysqli_fetch_assoc($post_query)) {
                        $id = $post['id'];
                        $title = $post['title'];
                        $author = $post['author'];
                        $date = $post['date'];
                        $img = $post['image'];
                        $content = substr($post['content'], 100);
                        ?>
                        
                    <h1 class="page-header">
                        Tech Hub
                        <small>Programmer's forum</small>
                    </h1>
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
                <?php } } ?>

                <hr>

            </div>

            <!-- Blog Sidebar Widgets Column -->
              <?php include "includes/sidebar.php"; ?>
        

        </div>
        <!-- /.row -->

        <hr>

    <!-- Footer -->
    <?php include "includes/footer.php" ?>


