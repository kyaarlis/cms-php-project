<?php 
    include "includes/admin_header.php";
 ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <?php include "includes/admin_heading.php" ?>

                <h1>Hi admin <?php echo $_SESSION['username']; ?> !</h1>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
    </div>
    <?php include "includes/admin_footer.php" ?>