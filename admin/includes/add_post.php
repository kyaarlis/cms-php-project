                    <?php add_post(); ?>
                    
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="title">Post Title</label>
                            <input class="form-control" type="text" id="title" name="title">
                        </div>

                        

                        <div class="form-group">
                            <label for="cat_id">Post Category</label>

                            <select name="category_id" id="cat_id">
                                <?php display_categories(); ?>
                            </select>  
                        </div>

                        <div class="form-group">
                            <label for="author">Post Author</label>
                            <input class="form-control" type="text" id="author" name="author">
                        </div>

                        <div class="form-group">
                            <label for="status">Post Status</label>
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