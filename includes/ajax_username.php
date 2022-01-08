<?php
include('./conn.php');

if (isset($_POST['username'])) {
    $username = $_POST['username'];

    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        $response = false;
    } else {
        $response = true;
    }

    echo $response;
    die();
}
