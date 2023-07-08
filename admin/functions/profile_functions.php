<?php

function edit_profile() {
    global $conn;

    if (isset($_POST['edit_profile'])) {
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $user_role = $_POST['role'];

        $update_query = "UPDATE users SET ";
        $update_query .= "username = '{$username}', firstname = '{$firstname}', lastname = '{$lastname}', email = '{$email}', role = '{$user_role}' ";
        $update_query .= "WHERE id = {$_SESSION['user_id']}";

        $result = mysqli_query($conn, $update_query);
        
        confirm_query($result);
        header("Location: profile.php");
    }
}