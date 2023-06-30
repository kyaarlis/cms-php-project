<?php
function confirm_query($result) {
    global $conn;

    if (!$result) {
        die ('Failed query!' . mysqli_error($conn));
    }
}