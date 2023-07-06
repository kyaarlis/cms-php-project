<?php

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    mysqli_real_escape_string($conn, $username);
    mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}'";

    $login_query = mysqli_query($conn, $query);

    confirm_query($login_query);

    while ($user = mysqli_fetch_array($login_query)) {
        
    }
}