<!-- Header -->
<?php 
 include "db/db.php";
 include "includes/header.php"; ?>

  <!-- Navigation -->
  <?php include "includes/navbar.php" ?> 

  <?php 
    if (isset($_GET['id'])) {
        $post_id = $_GET['id'];
    }
    
    global $conn;
    
    $query = "SELECT * FROM posts WHERE id = {$post_id}";
    
    $post = mysqli_query($conn, $query);
    
    confirm_query($post);

    while ($row = mysqli_fetch_assoc($post)) {
        $id = $row['id'];
        $author = $row['author'];
        $title = $row['title'];
        $status = $row['status'];
        $image = $row['image'];
        $tags = $row['tags'];
        $comments = $row['comment_count'];
        $content = $row['content'];
        $date = $row['date'];
    }
   ?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->

                <!-- Title -->
                <h1><?php echo $title; ?></h1>

                <!-- Author -->
                <p class="lead">
                    by <a href="index.php?author=<?php echo $author; ?>"><?php echo $author; ?></a>
                </p>

                <hr>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $date; ?></p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" width="300" src="images/<?php echo $image; ?>" alt="">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $content; ?></p>

                <!-- <button ></button> -->
                <a class="btn btn-danger" href="post.php?id=<?php echo $id; ?>&liked">Like Button</a>
                
                <hr>

                <?php

                    if (isset($_GET['liked'])) {
                        $query = "UPDATE posts SET likes = likes + 1";

                        $result = mysqli_query($conn, $query);

                        confirm_query($result);

                        $post = mysqli_fetch_assoc($result);
                        $likes = $post['likes'];

                        header("Location: posts.php");
                    }

                    $post_query = "SELECT likes FROM posts";

                    $result = mysqli_query($conn, $post_query);

                    confirm_query($result);

                    $post = mysqli_fetch_assoc($result);
                    $likes = $post['likes'];
                
                ?>
                <h3>Likes: <?php echo $likes; ?></h3>

                <!-- Blog Comments -->
               <?php include "includes/comments.php"; ?>

            </div>

                <!-- Blog Categories Well -->
                <?php include "includes/sidebar.php"; ?>
           

        </div>
        <!-- /.row -->

        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Your Website 2014</p>
                </div>
            </div>
            <!-- /.row -->
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
