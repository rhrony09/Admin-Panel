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
            <h1>Home</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./dashboard.php">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
        <div class="card-body">
          <h3>Ki Khobor <?= $user['name'] ?>? Game khalba? Ai khane click koro tahole. <a href="./game1.php">Play Game</a></h3>
        </div>
      </div>
      <!-- Content End -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php include('./includes/footer.php') ?>