<?php

include "main_functions.php";

function select_comment_actions() {

    if (isset($_GET['commentSrc'])) {
        $source = $_GET['commentSrc'];

    } else {
        $source = '';
    }

    switch($source) {

        case "approve":
            approve_comment();
            break;

        case "deny_comment":
            deny_comment();
            break;

        case "delete":
            delete_comment();
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
        $post_title = $post['title'];

        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$author}</td>";
        echo "<td>{$email}</td>";
        echo "<td>{$content}</td>";
        echo "<td>{$status}</td>";
        echo "<td><a href='../post.php?id={$post_id}'>{$post_title}</a></td>";
        echo "<td>{$date}</td>";
        echo "<td><a href='comments.php?commentSrc=approve&id={$id}'>Approve</a></td>";
        echo "<td><a href='comments.php?commentSrc=deny_comment&id={$id}'>Deny</a></td>";
        echo "<td><a href='comments.php?commentSrc=delete&id={$id}'>Delete</a></td>";
        echo "</tr>";
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

function approve_comment() {
    global $conn;

    if (isset($_GET['commentSrc'])) {
        $id = $_GET['id']; 

        $approve_query = "UPDATE comments SET status = 'approved' ";
        $approve_query .= "WHERE id = {$id}";

        $result = mysqli_query($conn, $approve_query);

        confirm_query($result);

        header("Location: comments.php");
    }
}

function deny_comment() {
    global $conn;

    if (isset($_GET['commentSrc'])) {
        $id = $_GET['id']; 

        $deny_query = "UPDATE comments SET status = 'denied' ";
        $deny_query .= "WHERE id = {$id}";

        $result = mysqli_query($conn, $deny_query);

        confirm_query($result);

        header("Location: comments.php");
    }
}
