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
                    Page Heading
                    <small>Secondary Text</small>
                </h1>

                <!-- First Blog Post -->
                <?php
                $query = "SELECT * FROM posts";

                $post_query = mysqli_query($conn, $query);

                while ($post = mysqli_fetch_assoc($post_query)) {
                    $title = $post['title'];
                    $author = $post['author'];
                    $date = $post['date'];
                    $img = $post['image'];
                    $content = $post['content'];

                    echo "
                    <h2>
                    <a href='#'>{$title}</a>
                </h2>
                <p class='lead'>
                    by <a href='index.php'>{$author}</a>
                </p>
                <p><span class='glyphicon glyphicon-time'></span> Posted on {$date}</p>
                <hr>
                <img class='img-responsive' src={$img} alt=''>
                <hr>
                <p>{$content}</p>
                <a class='btn btn-primary' href='#'>Read More <span class='glyphicon glyphicon-chevron-right'></span></a>";
                }
                
                ?>

                <hr>

            </div>

            <!-- Blog Sidebar Widgets Column -->
              <?php include "includes/sidebar.php" ?>

        </div>
        <!-- /.row -->

        <hr>

    <!-- Footer -->
    <?php include "includes/footer.php" ?>


