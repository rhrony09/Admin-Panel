<?php
include './includes/session.php';

if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $id = $_POST['id'];
    $filename = $_FILES['photo']['name'];

    if (empty($id)) {
        $id = $user['id'];
    }

    $sql = "SELECT * FROM admin where id = '$id'";
    $query = $conn->query($sql);
    $row = $query->fetch_assoc();

    if (empty($email)) {
        $email = $row['email'];
    }

    if (!empty($filename)) {
        $filename = $row['username'] . '-' . $filename;
        echo $filename;
        move_uploaded_file($_FILES['photo']['tmp_name'], './assets/img/admin/' . $filename);
    } else {
        $filename = $row['profile_pic'];
        echo $filename;
    }

    $sql = "UPDATE admin SET name = '$name', email = '$email', profile_pic = '$filename', role = '$role' WHERE id = '$id'";
    if ($conn->query($sql)) {
        $_SESSION['success'] = 'Admin profile updated successfully';
    } else {
        $_SESSION['error'] = $conn->error;
    }
} else {
    $_SESSION['error'] = 'Fill up required details first';
}

if (empty($_POST['id'])) {
    header('location: profile.php');
} else {
    header('location: admin_view.php?view=user&id=' . $_POST['id']);
}
