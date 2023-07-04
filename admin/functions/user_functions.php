<?php
include "main_functions.php";

function select_user_actions() {

    if (isset($_GET['usrSource'])) {
        $source = $_GET['usrSource'];
    } else {
        $source = '';
    }

    switch($source) {

        case "add_user":
            include "includes/add_user.php";
            break;

        case "delete_user":
            delete_user();
            break;

        case "edit_user":
            include "includes/edit_user.php";
            break;

        default: 

        include "includes/view_users.php";

        break;    
    }
}

function view_all_users() {
    global $conn;

    $query = "SELECT * FROM users";

    $users = mysqli_query($conn, $query);

    confirm_query($users);

    while ($row = mysqli_fetch_assoc($users)) {
        $id = $row['id'];
        $username = $row['username'];
        $firstname = $row['firstname'];
        $lastname = $row['lastname'];
        $email = $row['email'];
        $user_image = $row['user_image'];
        $role = $row['role'];
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$username}</td>";
        echo "<td>{$firstname}</td>";
        echo "<td>{$lastname}</td>";
        echo "<td>{$email}</td>";
        echo "<td><img width=70 src='./user_images/$user_image'/></td>";
        echo "<td>{$role}</td>";
        echo "<td><a href='users.php?usrSource=approve&id={$id}'>Approve</a></td>";
        echo "<td><a href='users.php?usrSource=deny&id={$id}'>Deny</a></td>";
        echo "<td><a href='users.php?usrSource=delete_user&id={$id}'>Delete</a></td>";
        echo "<td><a href='users.php?usrSource=edit_user&id={$id}'>Edit</a></td>";
        echo "</tr>";
    }     
}

function add_user() {
    global $conn;
    
    if (isset($_POST['add_user'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $firstname = $_POST['fname'];
        $lastname = $_POST['lname'];
        $email = $_POST['email'];
        $user_image = $_FILES['user_image']['name'];
        $role = $_POST['role'];

        $img_temp = $_FILES['user_image']['tmp_name'];
        move_uploaded_file($img_temp, "./user_images/$user_image");

        // Password encryption
        $salt = "$2y$10$";
	    $hash = "lcp9uf3f3jmsoc93pkp9lkvp9did23owjfwifh";

        $hash_salt = $salt . $hash;
	    $encrypt_passw = crypt($password, $hash_salt);
        $encrypt_passw = mysqli_real_escape_string($conn, $encrypt_passw);

        $query = "INSERT INTO users ";
        $query .= "(username, password, firstname, lastname, email, user_image, role, randSalt) ";
        $query .= "VALUES ('{$username}', '{$encrypt_passw}', '{$firstname}', '{$lastname}', '{$email}', '{$user_image}', '{$role}', '{$hash_salt}')"; 

        $user_query = mysqli_query($conn, $query);

        confirm_query($user_query);

        header("Location: users.php");
    }
}
        
function delete_user() {
    global $conn;

    if (isset($_GET['usrSource'])) {
        $id = $_GET['id']; 

        $delete_query = "DELETE FROM users WHERE ";
        $delete_query .= "id = {$id}";    

        $result = mysqli_query($conn, $delete_query);

        confirm_query($result);

        header("Location: users.php");
    } 
}