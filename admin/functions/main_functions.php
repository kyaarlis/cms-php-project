<?php
function confirm_query($result) {
    global $conn;

    if (!$result) {
        die ('Failed query!' . mysqli_error($conn));
    }
}

function log_out() {
    if (isset($_POST['logout'])) {
        session_destroy();

        header("Location: ../index.php");
    }
}

function check_if_user_loggedin() {
    // If user is not admin or logged in then don't let user in admin 
    // when admin button in clicked

     if (!$_SESSION['username']) {
        header("Location: ../index.php");
    }
}