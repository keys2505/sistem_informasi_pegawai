<?php ob_start();
 session_start();?>

<?php

include '../db/entity/karyawan.php';
include '../db/db_connection.php';

$jml_karyawan_aktif = 0;
$jml_karyawan_resign = 0;
$jml_user_aktif = 0;
$jml_user_non_aktif = 0;

$sql_karyawan_aktif = "SELECT * FROM karyawan WHERE STATUS_RESIGN = 0;";
$sql_karyawan_resign = "SELECT * FROM karyawan WHERE STATUS_RESIGN = 1;";
$sql_user_aktif = "SELECT * FROM USER WHERE `USER_STATUS` = 0;";
$sql_user_non_aktif = "SELECT * FROM USER WHERE `USER_STATUS` = 1;";

  $conn = new DBConnection();
  $conn -> get_connetion();

  $result_karyawan_aktif =  $conn -> execute_query($sql_karyawan_aktif);
  if ($result_karyawan_aktif->num_rows > 0) {
    while($row = $result_karyawan_aktif->fetch_assoc()) {
      $jml_karyawan_aktif++;
    }
  }

  $result_karyawan_resign =  $conn -> execute_query($sql_karyawan_resign);
  if ($result_karyawan_resign->num_rows > 0) {
    while($row = $result_karyawan_resign->fetch_assoc()) {
      $jml_karyawan_resign++;
    }
  }

  $result_user_aktif =  $conn -> execute_query($sql_user_aktif);
  if ($result_user_aktif->num_rows > 0) {
    while($row = $result_user_aktif->fetch_assoc()) {
      $jml_user_aktif++;
    }
  }

  $result_user_non_aktif =  $conn -> execute_query($sql_user_non_aktif);
  if ($result_user_non_aktif->num_rows > 0) {
    while($row = $result_user_non_aktif->fetch_assoc()) {
      $jml_user_non_aktif++;
    }
  }

   $conn -> close_connetion();

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>HR SYSTEM</title>

  <link rel="stylesheet" href="../asset/css/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../asset/css/adminlte.min.css">
  <link href="../asset/css/sweetalert2.css" rel="stylesheet" >
  
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- include file header -->
  <?php include '../page/header.php'  ?>

<!-- include file sidebar -->
  <?php include '../page/sidebar.php'  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Informasi</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
                 <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $jml_karyawan_aktif; ?></h3>

                <p>Karyawan Aktif</p>
              </div>
              <div class="icon">
                <i class="fas fa-archive"></i>
              </div>
              <a href="../page/form_karyawan.php?ID_KARYAWAN=0" class="small-box-footer">
                Tambah Karyawan <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
                 <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3><?php echo $jml_karyawan_resign; ?></h3>

                <p>Karyawan Resign</p>
              </div>
              <div class="icon">
                <i class="fas fa-archive"></i>
              </div>
              <a href="../page/form_karyawan.php?ID_KARYAWAN=0" class="small-box-footer">
                Tambah Karyawan <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo $jml_user_aktif; ?></h3>

                <p>User Aktif</p>
              </div>
              <div class="icon">
                <i class="fas fa-users-cog"></i>
              </div>
              <a href="../page/form_user.php?ID_USER=0" class="small-box-footer">
                Tambah User <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
          
          <div class="col-lg-3 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?php echo $jml_user_non_aktif; ?></h3>

                <p>User Non Aktif</p>
              </div>
              <div class="icon">
                <i class="fas fa-users-cog"></i>
              </div>
              <a href="../page/form_user.php?ID_USER=0" class="small-box-footer">
                Tambah User <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->


 <!-- include file footer -->
  <?php include '../page/footer.php'  ?>

</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="../asset/js/jquery.min.js" ></script>
<script src="../asset/js/popper.js" type="javascript"></script>
<script src="../asset/js/jquery_admin_lte.min.js" type="javascript"></script>
<script src="../asset/js/adminlte.min.js"></script>
<script src="../asset/js/sweetalert2.js"></script>
</body>
</html>
