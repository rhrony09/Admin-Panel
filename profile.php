<?php
include('./includes/session.php');

if (empty($row)) {
    $row = $user;
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
                    <div class="col-6">
                        <h1>Profile : <?php echo $user['name'] ?></h1>
                    </div>
                    <div class="col-6">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active"><?php echo $user['name'] ?></li>
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
                    <img src="<?php echo './assets/img/admin/' . $row['profile_pic']; ?>" class="img-circle elevation-3 profile-pic" alt="User Image" />
                </div>
                <div class="card-body">
                    <div class="profile-bg p-4">
                        <!-- Row 1 -->
                        <div class="row pb-4">
                            <div class="col-4 col-md-1 text-right">
                                <span>Name:</span>
                            </div>
                            <div class="col-8 col-md-3">
                                <span><?php echo $user['name'] ?></span>
                            </div>
                            <div class="col-4 col-md-1 text-right">
                                <span>Role:</span>
                            </div>
                            <div class="col-8 col-md-2">
                                <span><?php if ($user['role'] == 1) {
                                            echo "Admin";
                                        } elseif ($user['role'] == 2) {
                                            echo "Developer";
                                        } else {
                                            echo "Employee";
                                        } ?></span>
                            </div>
                            <div class="col-4 col-md-2 text-right">
                                <span>Username:</span>
                            </div>
                            <div class="col-8 col-md-3">
                                <span><?php echo $user['username'] ?></span>
                            </div>
                        </div>
                        <!-- /Row 1 -->
                        <!-- Row 2 -->
                        <div class="row pb-4">
                            <div class="col-4 col-md-1 text-right">
                                <span>Email:</span>
                            </div>
                            <div class="col-8 col-md-6">
                                <span><?php echo $user['email'] ?></span>
                            </div>
                            <div class="col-4 col-md-2 text-right">
                                <span>Created On:</span>
                            </div>
                            <div class="col-8 col-md-3">
                                <span><?php echo $user['created_on'] ?></span>
                            </div>
                        </div>
                        <!-- /Row 2 -->
                        <!-- Row 3 -->
                        <div class="row">
                            <div class="col-md-auto">
                                <a href="#update-admin" data-toggle="modal" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-user-edit"></i> Update Profile</a>
                                <a href="#password-change" data-toggle="modal" class="btn btn-secondary btn-sm btn-flat"><i class="fas fa-unlock-alt"></i> Change Password</a>
                            </div>
                        </div>
                        <!-- /Row 3 -->
                    </div>
                </div>
            </div>
            <!-- Content End -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include('./includes/modals.php') ?>
    <?php include('./includes/footer.php') ?>