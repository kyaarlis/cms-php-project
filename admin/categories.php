<?php 
    include "includes/admin_header.php";
    include "functions/categories_functions.php";
 ?>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include "includes/admin_navigation.php" ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <?php include "includes/admin_heading.php" ?>

                        <?php insert_categories(); ?>

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

                            <?php // Update categories logic
                            if (isset($_GET['edit'])) {
                                $id = $_GET['edit'];

                                include "includes/update_categories.php";
                             }
                              ?>

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
                                    <?php find_all_categories(); ?>

                                <?php delete_categories(); ?>
                              
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