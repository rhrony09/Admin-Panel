<?php
include('./conn.php');

if (isset($_POST['email'])) {
    $email = $_POST['email'];

    $sql = "SELECT * FROM admin WHERE email = '$email'";
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        $response = false;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $response = 'invalid';
    } else {
        $response = true;
    }

    echo $response;
    die();
}
