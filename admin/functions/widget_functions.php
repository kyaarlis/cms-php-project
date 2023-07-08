<?php

function post_count() {
    global $conn;

    $post_query = "SELECT * FROM posts";

    $posts = mysqli_query($conn, $post_query);

    confirm_query($posts);

    $post_count = mysqli_num_rows($posts);

    echo $post_count;
}

function comment_count() {
    global $conn;

    $comment_query = "SELECT * FROM comments";

    $comments = mysqli_query($conn, $comment_query);

    confirm_query($comments);

    $comment_count = mysqli_num_rows($comments);

    echo $comment_count;
}

function user_count() {
    global $conn;

    $user_query = "SELECT * FROM users";

    $users = mysqli_query($conn, $user_query);

    confirm_query($users);

    $user_count = mysqli_num_rows($users);

    echo $user_count;
}

function categories_count() {
    global $conn;

    $categories_query = "SELECT * FROM categories";

    $categories = mysqli_query($conn, $categories_query);

    confirm_query($categories);

    $categories_count = mysqli_num_rows($categories);

    echo $categories_count;
}