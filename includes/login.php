<?php
include "../db/db.php"; 
include "../home_functions/main_functions.php"; 

session_start();

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    mysqli_real_escape_string($conn, $username);
    mysqli_real_escape_string($conn, $password);

    $query = "SELECT * FROM users WHERE username = '{$username}' AND role = 'admin'";

    $login_query = mysqli_query($conn, $query);

    confirm_query($login_query);

    while ($user = mysqli_fetch_array($login_query)) {
        $id = $user['id'];
        $db_username = $user['username'];
        $db_password = $user['password'];
        $db_fname = $user['firstname'];
        $db_lname = $user['lastname']; 
        $role = $user['role']; 
    }

    if ($username !== $db_username && !password_verify($password, $db_password)) {
        header("Location: ../index.php");
    } else if ($username == $db_username && password_verify($password, $db_password)) {

        $_SESSION['username'] = $db_username;
        $_SESSION['firstName'] = $db_fname;
        $_SESSION['lastName'] = $db_lname;
        $_SESSION['userRole'] = $role;

        header("Location: ../admin");
    } else {
        header("Location: ../index.php");
    }

    
}