<?php
include "main_functions.php";

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

        default: 

        include "includes/view_posts.php";

        break;    
    }
}

function view_all_posts() {
    global $conn;

    $query = "SELECT * FROM posts";

    $posts = mysqli_query($conn, $query);

    if (!$posts) {
        die ("Query err!" . mysqli_error($conn));
    }

    while ($row = mysqli_fetch_assoc($posts)) {
        $id = $row['id'];
        $author = $row['author'];
        $title = $row['title'];
        $category = $row['category_id'];
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
        echo "</tr>";
    }     
}

function add_post() {
    global $conn;
    
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
}


function delete_posts() {
    global $conn;

    if (isset($_GET['source'])) {
        $id = $_GET['id']; 

        $delete_query = "DELETE FROM posts WHERE ";
        $delete_query .= "id = {$id}";    

        $result = mysqli_query($conn, $delete_query);

        if (!$result) {
            die ('Failed query!' . mysqli_error($conn));
        }

        header("Location: posts.php");
    } 
}