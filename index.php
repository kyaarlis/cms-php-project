<!-- Header -->
 <?php 
 include "db/db.php";
 include "includes/header.php";
 include "home_functions/posts_functions.php";
  ?>

  <!-- Navigation -->
  <?php include "includes/navbar.php" ?> 

  <title>Home</title>

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
                <?php display_posts(); ?>

                <hr>

            </div>

            <!-- Blog Sidebar Widgets Column -->
              <?php include "includes/sidebar.php"; ?>
        

        </div>
        <!-- /.row -->

        <hr>

    <!-- Footer -->
    <?php include "includes/footer.php" ?>


