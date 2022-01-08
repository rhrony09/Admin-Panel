<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="./dashboard.php" class="brand-link">
        <img src="./assets/img/imbd-logo.png" alt="Company Logo" class="brand-image" />
        <span class="brand-text font-weight-light">IMBD Agency</span>
    </a>

    <!-- Sidebar user -->
    <a href="./profile.php" class="brand-link py-4 mb-2">
        <img src="<?php echo './assets/img/admin/' . $user['profile_pic']; ?>" alt="Company Logo" class="brand-image img-circle elevation-2" />
        <span class="brand-text font-weight-light"><?php echo $user['name']; ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar d-flex flex-column justify-content-between">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="./dashboard.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-gamepad"></i>
                        <p>
                            Games
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview" style="display: none;">
                        <li class="nav-item">
                            <a href="./game1.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Game 1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./game2.php" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Game 2</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        <!-- Admin Area -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar">
                <li class="nav-item">
                    <a href="admin.php" class="nav-link">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Admin Area</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="./logout.php" class="nav-link">
                        <i class="bg-danger p-1 rounded-circle nav-icon fas fa-power-off"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /Admin Area -->
    </div>
    <!-- /.sidebar -->
</aside>