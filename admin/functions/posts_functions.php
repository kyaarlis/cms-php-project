<?php

function select_post_actions() {

    if (isset($_GET['source'])) {
        $source = $_GET['source'];

    } else {
        $source = '';
    }

    switch($source) {

        case "add_post":
            include "includes/add_post.php";
            break;

        case "delete_post":
            delete_posts();
            break;

        case "edit_post":
            include "includes/edit_post.php";
            break;

        default: 

        include "includes/view_posts.php";

        break;    
    }
}

function view_all_posts() {
    global $conn;

    $query = "SELECT * FROM posts";

    $posts = mysqli_query($conn, $query);

    confirm_query($posts);

    while ($row = mysqli_fetch_assoc($posts)) {
        $id = $row['id'];
        $author = $row['author'];
        $title = $row['title'];
        $category_id = $row['category_id'];

        $query = "SELECT * FROM categories WHERE id = {$category_id}";

        $categories = mysqli_query($conn, $query);
        
        confirm_query($categories);

        $category = mysqli_fetch_assoc($categories);
        $category = $category['title'];

        $status = $row['status'];
        $image = $row['image'];
        $tags = $row['tags'];
        $comments = $row['comment_count'];
        $date = $row['date'];
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$author}</td>";
        echo "<td>{$title}</td>";
        echo "<td>{$category}</td>";
        echo "<td>{$status}</td>";
        echo "<td><img width=100 src='../images/$image'/></td>";
        echo "<td>{$tags}</td>";
        echo "<td>{$comments}</td>";
        echo "<td>{$date}</td>";
        echo "<td><a href='posts.php?source=delete_post&id={$id}'>Delete</a></td>";
        echo "<td><a href='posts.php?source=edit_post&id={$id}'>Edit</a></td>";
        echo "</tr>";
    }     
}

function add_post() {
    global $conn;
    
    if (isset($_POST['add_post'])) {
        $title = $_POST['title'];
        $category_id = $_POST['category_id'];
        $author = $_POST['author'];
        // $status = $_POST['status'];

        $image = $_FILES['image']['name'];
        $img_temp = $_FILES['image']['tmp_name'];


        $tags = $_POST['tags'];
        $content = $_POST['content'];

        move_uploaded_file($img_temp, "../images/$image");

        $query = "INSERT INTO posts ";
        $query .= "(title, category_id, author, image, tags, content, status, date) ";
        $query .= "VALUES ('{$title}', {$category_id}, '{$author}', '{$image}', '{$tags}', '{$content}', 'public', now())"; 

        $post_query = mysqli_query($conn, $query);

        confirm_query($post_query);

        header('Location: posts.php');
    }
}

function display_categories() {
    global $conn;

    $query = "SELECT * FROM categories";

    $categories = mysqli_query($conn, $query);

    confirm_query($categories);

    while ($row = mysqli_fetch_assoc($categories)) {
        $id = $row['id'];
        $category = $row['title'];

        echo "<option value='{$id}'>{$category}</option>";
    }
}

function tailored_categories() {
    global $conn;

    $query = "SELECT * FROM categories";

    $categories = mysqli_query($conn, $query);

    confirm_query($categories);

    while ($row = mysqli_fetch_assoc($categories)) {
        $id = $row['id'];
        $category = $row['title'];

        if (isset($_GET['id'])) {
            $post_id = $_GET['id'];
        }

        $query = "SELECT * FROM posts WHERE id = {$post_id}";

        $posts = mysqli_query($conn, $query);
            
        confirm_query($posts);

        $post_row = mysqli_fetch_assoc($posts);

        $cat_id = $post_row['category_id'];

        // Setting option selected for the post it relates to
        $isSelected = ($cat_id == $id) ? 'selected' : '';

        echo "<option value='{$id}' {$isSelected}>{$category}</option>";
    }
}

function edit_post() {
    global $conn;

    if (isset($_GET['source'])) {
        $id = $_GET['id']; 

        $query = "SELECT * FROM posts WHERE id = $id ";   
        $post_id = mysqli_query($conn, $query);

        confirm_query($post_id);
    }

    if (isset($_POST['edit_post'])) {
        $title = $_POST['title'];
        $category = $_POST['category'];
        $author = $_POST['author'];
        $status = $_POST['status'];

        if (empty($_FILES['image']['name'])) {
            $image = $_POST['current_image'];
        } else {
            $image = $_FILES['image']['name'];
        } 

        $img_temp = $_FILES['image']['tmp_name'];

        $tags = $_POST['tags'];
        $content = $_POST['content'];
        $comment_count = 4;

        move_uploaded_file($img_temp, "../images/$image");

        $update_query = "UPDATE posts SET ";
        $update_query .= "title = '{$title}', category_id = {$category}, author = '{$author}', status = '{$status}', image = '{$image}', tags = '{$tags}', content = '{$content}', date = now(), comment_count = {$comment_count} ";
        $update_query .= "WHERE id = {$id}";

        $result = mysqli_query($conn, $update_query);
        
        confirm_query($result);
        header("Location: posts.php");
    }
}


function delete_posts() {
    global $conn;

    if (isset($_GET['source'])) {
        $id = $_GET['id']; 

        $delete_query = "DELETE FROM posts WHERE ";
        $delete_query .= "id = {$id}";    

        $result = mysqli_query($conn, $delete_query);

        confirm_query($result);

        header("Location: posts.php");
    } 
}
