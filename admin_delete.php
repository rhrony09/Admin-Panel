<?php
include 'includes/session.php';

if (isset($_GET['delete'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM admin WHERE id = '$id'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    if (($user['username'] != $row['username'] && $user['username'] == 'rony') || ($user['username'] != $row['username'] && $row['role'] != 2)) {
        $sql = "DELETE FROM admin WHERE id = '$id'";
        if ($conn->query($sql)) {
            $_SESSION['success'] = 'Admin deleted successfully';
        } else {
            $_SESSION['error'] = $conn->error;
        }
    } else {
        $_SESSION['error'] = 'You are not allowed to delete this user.';
        die(header('location: admin.php'));
    }
} else {
    $_SESSION['error'] = 'Select Admin to delete first';
}

header('location: admin.php');
