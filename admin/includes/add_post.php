                    <?php
                    include "functions.php";

                    if (isset($_POST['add_post'])) {
                        $title = $_POST['title'];
                        $category_id = $_POST['cat_id'];
                        $author = $_POST['author'];
                        $status = $_POST['status'];

                        $image = $_FILES['image']['name'];
                        $img_temp = $_FILES['image']['tmp_name'];


                        $tags = $_POST['tags'];
                        $content = $_POST['content'];
                        $date = date('d-m-y');
                        $comment_count = 4;

                        move_uploaded_file($img_temp, "../images/$image");

                        $query = "INSERT INTO posts ";
                        $query .= "(title, category_id, author, status, image, tags, content, date, comment_count) ";
                        $query .= "VALUES ('{$title}', {$category_id}, '{$author}', '{$status}', '{$image}', '{$tags}', '{$content}', now(), {$comment_count})"; 

                        $post_query = mysqli_query($conn, $query);

                        confirm_query($post_query);
                    }
                    
                    ?>
                    
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Post title</label>
                            <input class="form-control" type="text" id="title" name="title">
                        </div>

                        <div class="form-group">
                            <label for="cat_id">Post Category Id</label>
                            <input class="form-control" type="number" id="cat_id" name="cat_id">
                        </div>

                        <div class="form-group">
                            <label for="author">Post Author</label>
                            <input class="form-control" type="text" id="author" name="author">
                        </div>

                        <div class="form-group">
                            <label for="status">Post Title</label>
                            <input class="form-control" type="text" id="title" name="status">
                        </div>

                        <div class="form-group">
                            <label for="img" class="form-label">Post Image</label>
                            <input class="form-control" type="file" id="img" name="image">
                        </div>

                        <div class="form-group">
                            <label for="tags">Post Tags</label>
                            <input class="form-control" type="text" id="tags" name="tags">
                        </div>

                        <div class="form-group">
                            <label for="content">Post Content</label>
                            <textarea class="form-control" type="text" rows="5" id="content" name="content"></textarea>
                        </div>


                        <div class="form-group">
                            <input class="btn btn-primary" type="submit" name='add_post' value="Publish Post">
                        </div>
                      </form>