<?php
session_start();
if (isset($_SESSION['admin'])) {
    header('location:dashboard.php');
}
?>
<?php include('./includes/header.php') ?>

<!-- Site wrapper -->
<div class="wrapper">
    <div class="login-page">
        <div class="login-box">
            <div class="login-logo">
                <img src="./assets/img/imbd-logo.png" alt="Company Logo"><strong>IMBD Agency</strong>
            </div>
            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                    <p class="login-box-msg">Sign in to access Dashboard</p>

                    <form action="login.php" method="post">
                        <div class="input-group mb-3">
                            <input type="username" class="form-control" name="username" placeholder="Username or Email">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="password" placeholder="Password">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="remember">
                                    <label for="remember">
                                        Remember Me
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block" name="login">Sign In</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>
                    <?php
                    if (isset($_SESSION['error'])) {
                        echo "<div class='callout callout-danger text-center mt-4'><p>" . $_SESSION['error'] . "</p></div>";
                        unset($_SESSION['error']);
                    }
                    ?>
                </div>
                <!-- /.login-card-body -->
            </div>
        </div>
    </div>