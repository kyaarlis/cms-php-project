<?php

function confirm_query($result) {
    global $conn;

    if (!$result) {
        die ('Failed query!' . mysqli_error($conn));
    }
}

function insert_categories() {
    global $conn;

    if (isset($_POST['submit'])) {

        $title = $_POST['title'];
        $title = mysqli_real_escape_string($conn, $title);

        if ($title == "" || empty($title)) {
            echo "This field cannot be empty!";

        } else {

            $query = "INSERT INTO categories(title) ";
            $query .= "VALUES ('$title')";

            $post_query = mysqli_query($conn, $query);

            if (!$post_query) {
                die('Query failed!' . mysqli_error($conn));
            }
        } 
    }
}

function find_all_categories() {
    global $conn;
    $query = "SELECT * FROM categories";

    $categories = mysqli_query($conn, $query);
    
    if (!$categories) {
        die ("Query err!" . mysqli_error($conn));
    }
    while ($row = mysqli_fetch_assoc($categories)) {
        $id = $row['id'];
        $title = $row['title'];
        echo "<tr>";
        echo "<td>{$id}</td>";
        echo "<td>{$title}</td>";
        echo "<td><a href='categories.php?delete={$id}'>Delete</a></td>";
        echo "<td><a href='categories.php?edit={$id}'>Edit</a></td>";
        echo "</tr>";
    } 
}

function delete_categories() {
    global $conn;

    if (isset($_GET['delete'])) {
        $id = $_GET['delete']; 

        $delete_query = "DELETE FROM categories WHERE ";
        $delete_query .= "id = {$id}";    

        $result = mysqli_query($conn, $delete_query);

        if (!$result) {
            die ('Failed query!' . mysqli_error($conn));
        }

        header("Location: categories.php");
    } 
}