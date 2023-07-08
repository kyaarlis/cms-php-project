<?php

function active_posts() {
    global $conn;

    $post_query = "SELECT * FROM posts WHERE status = 'public'";

    $active_posts = mysqli_query($conn, $post_query);

    confirm_query($active_posts);

    $active_posts_count = mysqli_num_rows($active_posts);

    echo $active_posts_count;
}

function draft_posts() {
    global $conn;

    $post_query = "SELECT * FROM posts WHERE status != 'public'";

    $draft_posts = mysqli_query($conn, $post_query);

    confirm_query($draft_posts);

    $draft_posts_count = mysqli_num_rows($draft_posts);

    echo $draft_posts_count;
}

function public_comment_count() {
    global $conn;

    $comment_query = "SELECT * FROM comments WHERE status = 'approved'";

    $comments = mysqli_query($conn, $comment_query);

    confirm_query($comments);

    $public_comment_count = mysqli_num_rows($comments);

    echo $public_comment_count;
}

function hidden_comment_count() {
    global $conn;

    $comment_query = "SELECT * FROM comments WHERE status = 'denied'";

    $comments = mysqli_query($conn, $comment_query);

    confirm_query($comments);

    $hidden_comment_count = mysqli_num_rows($comments);

    echo $hidden_comment_count;
}

function admin_count() {
    global $conn;

    $user_query = "SELECT * FROM users WHERE role = 'admin'";

    $users = mysqli_query($conn, $user_query);

    confirm_query($users);

    $admin_count = mysqli_num_rows($users);

    echo $admin_count;
}

function subscriber_count() {
    global $conn;

    $user_query = "SELECT * FROM users WHERE role = 'subscriber'";

    $users = mysqli_query($conn, $user_query);

    confirm_query($users);

    $subscriber_count = mysqli_num_rows($users);

    echo $subscriber_count;
}