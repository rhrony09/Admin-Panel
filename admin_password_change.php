<?php
include './includes/session.php';

if (isset($_POST['password'])) {
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];
    $id = $_POST['id'];

    if (empty($id)) {
        $id = $user['id'];
    }

    if ($new_password == $confirm_password) {
        $password = password_hash($new_password, PASSWORD_DEFAULT);
    }

    $sql = "UPDATE admin SET password = '$password' WHERE id = '$id'";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Password updated successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Fill up the form first';
}

if (empty($_POST['id'])) {
    header('location: profile.php');
} else {
    header('location: admin_view.php?view=user&id=' . $_POST['id']);
}
