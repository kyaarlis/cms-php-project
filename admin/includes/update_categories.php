                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="title">Edit</label>

                                    <?php
                                    if (isset($_GET['edit'])) {
                                        $id = $_GET['edit']; 

                                        $query = "SELECT * FROM categories WHERE id = $id ";   
                                        $categories_id = mysqli_query($conn, $query);

                                        while ($row = mysqli_fetch_assoc($categories_id)) {
                                            $category_id = $row['id'];
                                            $title = $row['title'];
                                    ?>
                                    <input value="<?php if (isset($title)) {echo $title;} ?>" class="form-control" type="text" name="title">
                                    <?php } } ?>

                                    <?php
                                    if (isset($_POST['update'])) {
                                        $title = $_POST['title']; 

                                        $update_query = "UPDATE categories SET title = '{$title}' WHERE id = {$id}";

                                        $result = mysqli_query($conn, $update_query);
                                        if (!$result) {
                                            die ('Failed query!' . mysqli_error($conn));
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="update" value="Edit Category">
                                </div>
                            </form>