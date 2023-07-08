<?php include "includes/admin_header.php" ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <?php include "includes/admin_heading.php" ?>

                <?php check_if_user_loggedin(); ?>
               
            </div>
            <!-- /.container-fluid -->

            <!-- Admin Widgets -->
            <?php include "includes/admin_widgets.php" ?>

        </div>
        <!-- /#page-wrapper -->

    <?php include "includes/admin_footer.php" ?>