<?php

include "main_functions.php";

function select_comment_actions() {

    if (isset($_GET['commentSrc'])) {
        $source = $_GET['commentSrc'];

    } else {
        $source = '';
    }

    switch($source) {

        case "add_post":
            include "includes/add_comment.php";
            break;

        case "delete":
            delete_comment();
            break;

        case "edit_post":
            include "includes/edit_comment.php";
            break;

        default: 

        include "includes/view_all_comments.php";

        break;    
    }
}

function view_all_comments() {
    global $conn;

    $query = "SELECT * FROM comments";

    $comments = mysqli_query($conn, $query);

    confirm_query($comments);

    while ($row = mysqli_fetch_assoc($comments)) {
        $id = $row['id'];
        $post_id = $row['post_id'];
        $author = $row['author'];
        $email = $row['email'];
        $content = $row['content'];
        $status = $row['status'];
        $date = $row['date'];

        $query = "SELECT * FROM posts WHERE id = {$post_id}";
        $post_query = mysqli_query($conn, $query);

        confirm_query($post_query);

        $post = mysqli_fetch_assoc($post_query);
        $post_id = $post['id'];
        $post_title = $post['title'];

        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$author}</td>";
        echo "<td>{$email}</td>";
        echo "<td>{$content}</td>";
        echo "<td>{$status}</td>";
        echo "<td><a href='../post.php?id={$post_id}'>{$post_title}</a></td>";
        echo "<td>{$date}</td>";
        echo "<td><a href='comments.php?commentSrc=approve_comment&id={$id}'>Approve</a></td>";
        echo "<td><a href='comments.php?commentSrc=deny_comment&id={$id}'>Deny</a></td>";
        echo "<td><a href='comments.php?commentSrc=delete&id={$id}'>Delete</a></td>";
        echo "<td><a href='comments.php?commentSrc=edit_comment&id={$id}'>Edit</a></td>";
        echo "</tr>";
    }     
}

function edit_comment() {
    global $conn;

    if (isset($_GET['commentSrc'])) {
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

        $image = $_FILES['image']['name'];
        $img_temp = $_FILES['image']['tmp_name'];


        $tags = $_POST['tags'];
        $content = $_POST['content'];
        $date = date('d-m-y');
        $comment_count = 4;

        $update_query = "UPDATE comments SET ";
        $update_query .= "title = '{$title}', category_id = {$category}, author = '{$author}', status = '{$status}', image = '{$image}', tags = '{$tags}', content = '{$content}', date = now(), comment_count = {$comment_count} ";
        $update_query .= "WHERE id = {$id}";

        $result = mysqli_query($conn, $update_query);
        
        confirm_query($result);
    }
}


function delete_comment() {
    global $conn;

    if (isset($_GET['commentSrc'])) {  
        $id = $_GET['id']; 

        $delete_query = "DELETE FROM comments WHERE ";
        $delete_query .= "id = {$id}";    

        $result = mysqli_query($conn, $delete_query);

        confirm_query($result);

        header("Location: comments.php");
    } 
}