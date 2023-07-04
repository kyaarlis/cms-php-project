                <?php edit_post(); ?>
                <?php 
                if (isset($_GET['id'])) {
                    $post_id = $_GET['id'];
                }

                global $conn;

                $query = "SELECT * FROM posts WHERE id = {$post_id}";

                $posts = mysqli_query($conn, $query);
            
                confirm_query($posts);
            
                while ($row = mysqli_fetch_assoc($posts)) {
                    $id = $row['id'];
                    $cat_id = $row['category_id'];
                    $author = $row['author'];
                    $title = $row['title'];
                    $status = $row['status'];
                    $image = $row['image'];
                    $tags = $row['tags'];
                    $comments = $row['comment_count'];
                    $content = $row['content'];
                }
                ?>
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input class="form-control" type="text" id="title" name="title" value="<?php echo $title; ?>">
                        </div>

                        <div class="form-group">
                            <label for="cat_id">Post Category</label>

                            <select name="category" id="cat_id">
                                <?php tailored_categories(); ?>
                            </select>  
                        </div>

                        <div class="form-group">
                            <label for="author">Post Author</label>
                            <input class="form-control" type="text" id="author" name="author" value="<?php echo $author; ?>">
                        </div>

                        <div class="form-group">
                            <label for="status">Post Status</label>
                            <input class="form-control" type="text" id="title" name="status" value="<?php echo $status; ?>">
                        </div>

                        <div class="form-group">
                            <label for="img" class="form-label">Post Image</label>
                            <img width="100" src="../images/<?php echo $image; ?>" alt="image">
                            <input type="hidden" name="current_image" value="../images/<?php echo $image; ?>">
                            <input class="form-control" type="file" id="img" name="image">
                        </div>

                        <div class="form-group">
                            <label for="tags">Post Tags</label>
                            <input class="form-control" type="text" id="tags" name="tags" value="<?php echo $tags; ?>">
                        </div>

                        <div class="form-group">
                            <label for="content">Post Content</label>
                            <textarea class="form-control" type="text" rows="5" id="content" name="content">
                                <?php echo $content; ?> 
                            </textarea>
                        </div>


                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name='edit_post' value="Edit Post">
                        </div>
                      </form>