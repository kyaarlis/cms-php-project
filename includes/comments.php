            
            <?php

            if (isset($_POST['submit'])) {
                $post_id = $_GET['id'];

                $comment_author = $_POST['comment_author'];
                $email = $_POST['email'];
                $content = $_POST['content'];

                $query = "INSERT INTO comments ";
                $query .= "(post_id, author, email, content, status, date) ";
                $query .= "VALUES ($post_id, '{$comment_author}', '{$email}', '{$content}', 'pending', now())";

                $comment_query = mysqli_query($conn, $query);

                confirm_query($comment_query);

                $post_comment_incr_qry = "UPDATE posts SET comment_count = comment_count + 1 WHERE id = {$post_id}";

                $comment_incr_query = mysqli_query($conn, $post_comment_incr_qry);

                confirm_query($comment_incr_query);
            }
            
            ?>
            
            <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="post">
                        <div class="form-group">
                            <input class="form-control" type="text" name="comment_author" placeholder="Author">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="email" name="email" placeholder="E-Mail">
                        </div>

                        <div class="form-group">
                            <textarea class="form-control" rows="3" placeholder="Your comment.." name="content"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <?php

                $post_id = $_GET['id'];

                $query = "SELECT * FROM comments WHERE post_id = {$post_id} ";
                $query .= "AND status = 'approved' ";
                $query .= "ORDER BY id DESC";

                $comment_query = mysqli_query($conn, $query);

                confirm_query($comment_query);

                while ($row = mysqli_fetch_assoc($comment_query)) {
                    $id = $row['id'];
                    $post_id = $row['post_id'];
                    $author = $row['author'];
                    $email = $row['email'];
                    $content = $row['content'];
                    $status = $row['status'];
                    $date = $row['date'];
                ?>

                <!-- Comment -->
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="userImg">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $author; ?>
                            <small><?php echo $date; ?></small>
                        </h4>
                        <?php echo $content; ?>
                    </div>
                </div>

        <?php } ?>
