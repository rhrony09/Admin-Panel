<?php
include('./includes/session.php');

if ($user['role'] == 0 || $user['role'] > 2) {
    $_SESSION['error'] = 'You are not authorized to access this page';
    die(header('location: dashboard.php'));
}

?>
<?php include('./includes/header.php') ?>

<!-- Site wrapper -->
<div class="wrapper">
    <?php include('./includes/navbar.php') ?>
    <!-- Main Sidebar Container -->
    <?php include('./includes/sidebar.php') ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <?php
                if (isset($_SESSION['error'])) {
                    echo "<div class='alert alert-danger alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-warning'></i> Error!</h4>" . $_SESSION['error'] . "</div>";
                    unset($_SESSION['error']);
                }
                if (isset($_SESSION['success'])) {
                    echo "<div class='alert alert-success alert-dismissible'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4><i class='icon fa fa-check'></i> Success!</h4>" . $_SESSION['success'] . "</div>";
                    unset($_SESSION['success']);
                }
                ?>
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Admin List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Admin List</li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Content Start -->
            <div class="card">
                <div class="card-header">
                    <a href="#add-new-admin" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fa fa-plus"></i> New</a>
                </div>
                <div class="card-body">
                    <table id="example" class="table table-bordered text-center" width="100%">
                        <thead>
                            <th>Photo</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Role</th>
                            <?php if ($user['role'] == 1 || $user['role'] == 2) : ?>
                                <th>Action</th>
                            <? endif ?>
                        </thead>
                        <tbody>
                            <?php
                            $sql = "SELECT * FROM admin";
                            $query = $conn->query($sql);

                            while ($row = $query->fetch_assoc()) {
                            ?>
                                <tr>
                                    <td><img src="<?php echo './assets/img/admin/' . $row['profile_pic']; ?>" width="30px" height="30px"></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['username']; ?></td>
                                    <td><?php echo $row['email']; ?></td>
                                    <td><?php if ($row['role'] == 1) {
                                            echo "Admin";
                                        } elseif ($row['role'] == 2) {
                                            echo "Developer";
                                        } else {
                                            echo "Employee";
                                        } ?></td>

                                    <?php if ($user['role'] == 1 || $user['role'] == 2) : ?>
                                        <td>
                                            <a href='<?php echo "admin_view.php?view=user&id=" . $row['id']; ?>' class="btn btn-primary btn-sm btn-flat" data-id="<?php echo $row['id']; ?>"><i class="fas fa-eye"></i> View</a>
                                            <?php if (($user['username'] != $row['username'] && $user['username'] == 'rony') || ($user['username'] != $row['username'] && $row['role'] != 2)) : ?>
                                                <button class="btn btn-danger btn-sm btn-flat admin-delete" data-id="<?php echo $row['id']; ?>"><i class="fas fa-trash"></i> Delete</button>
                                            <? endif ?>
                                        </td>
                                    <? endif ?>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- Content End -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include('./includes/modals.php') ?>
    <?php include('./includes/footer.php') ?>