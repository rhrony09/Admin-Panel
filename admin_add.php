<?php include './includes/session.php';

if (isset($_POST['add'])) {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $role = $_POST['role'];
    $password = $_POST['password'];
    $filename = $_FILES['photo']['name'];

    $sql = "SELECT * FROM admin WHERE username = '$username'";
    $query = $conn->query($sql);

    if ($query->num_rows >= 0) {

        if (!empty($filename)) {
            $filename = $username . '-' . $filename;
            move_uploaded_file($_FILES['photo']['tmp_name'], './assets/img/admin/' . $filename);
        } else {
            $filename = 'profile.jpg';
        }

        //password hass
        $password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO admin (name, username, email, role, password, profile_pic, created_on) VALUES ('$name', '$username', '$email', '$role', '$password', '$filename', NOW())";
        if ($role == 0 && $conn->query($sql)) {
            $_SESSION['success'] = 'Employee added successfully';
        } elseif ($role == 1 && $conn->query($sql)) {
            $_SESSION['success'] = 'Admin added successfully';
        } elseif ($role == 2 && $conn->query($sql)) {
            $_SESSION['success'] = 'Developer added successfully';
        } else {
            $_SESSION['error'] = $conn->error;
        }
    } else {
        $_SESSION['error'] = 'Enter a unique username';
    }
} else {
    $_SESSION['error'] = 'Fill up the form first';
}

header('location: admin.php');
