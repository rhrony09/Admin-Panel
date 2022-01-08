<?php include('./includes/session.php') ?>
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
                        <h1>Game 1</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active">Game 1</li>
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
                <style>
                    .game {
                        position: relative;
                    }

                    .game button {
                        position: absolute;
                        top: 20px;
                        right: 20px;
                        font-size: 18px;
                        background-color: #fff;
                        height: 45px;
                        width: 45px;
                        border: none;
                        border-radius: 50%;
                    }
                </style>
                <div class="card-body">
                    <div class="game">
                        <iframe src="http://slither.io/" frameborder="0" width="100%" height="400px"></iframe>
                        <button><i class="fas fa-expand"></i></button>
                    </div>
                </div>
                <script>
                    var button = document.querySelector('.game button');
                    button.addEventListener('click', fullscreen);
                    // when you are in fullscreen, ESC and F11 may not be trigger by keydown listener. 
                    // so don't use it to detect exit fullscreen
                    document.addEventListener('keydown', function(e) {
                        console.log('key press' + e.keyCode);
                    });
                    // detect enter or exit fullscreen mode
                    document.addEventListener('webkitfullscreenchange', fullscreenChange);
                    document.addEventListener('mozfullscreenchange', fullscreenChange);
                    document.addEventListener('fullscreenchange', fullscreenChange);
                    document.addEventListener('MSFullscreenChange', fullscreenChange);

                    function fullscreen() {
                        // check if fullscreen mode is available
                        if (document.fullscreenEnabled ||
                            document.webkitFullscreenEnabled ||
                            document.mozFullScreenEnabled ||
                            document.msFullscreenEnabled) {

                            // which element will be fullscreen
                            var iframe = document.querySelector('.game iframe');
                            // Do fullscreen
                            if (iframe.requestFullscreen) {
                                iframe.requestFullscreen();
                            } else if (iframe.webkitRequestFullscreen) {
                                iframe.webkitRequestFullscreen();
                            } else if (iframe.mozRequestFullScreen) {
                                iframe.mozRequestFullScreen();
                            } else if (iframe.msRequestFullscreen) {
                                iframe.msRequestFullscreen();
                            }
                        } else {
                            document.querySelector('.error').innerHTML = 'Your browser is not supported';
                        }
                    }

                    function fullscreenChange() {
                        if (document.fullscreenEnabled ||
                            document.webkitIsFullScreen ||
                            document.mozFullScreen ||
                            document.msFullscreenElement) {
                            console.log('enter fullscreen');
                        } else {
                            console.log('exit fullscreen');
                        }
                        // force to reload iframe once to prevent the iframe source didn't care about trying to resize the window
                        // comment this line and you will see
                        var iframe = document.querySelector('iframe');
                        iframe.src = iframe.src;
                    }
                </script>
            </div>
            <!-- Content End -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include('./includes/footer.php') ?>