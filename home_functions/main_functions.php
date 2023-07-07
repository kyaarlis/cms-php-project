<?php
function confirm_query($result) {
    global $conn;

    if (!$result) {
        die ('Failed query!' . mysqli_error($conn));
    }
}

function title() {
    global $conn;

    if (isset($_GET['category_id'])) {
        $category_id = $_GET['category_id'];

        $query = "SELECT * FROM categories WHERE id = {$category_id}";

        $categories = mysqli_query($conn, $query);

        confirm_query($categories);

        $category = mysqli_fetch_assoc($categories);
        $title = $category['title'];

        echo $title;
    } else {
        echo "Home";
    }
}