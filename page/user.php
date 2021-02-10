<?php ob_start();
 session_start();?>

<?php

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
  <link rel="stylesheet" href="../asset/css/dataTables.bootstrap4.css">
  
</head>
<script type="text/javascript">
  function onloadPage() {
 

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("list_user").innerHTML = this.responseText;
        reloadDataTable();
      }
    };
    xmlhttp.open("GET", "../ajax/ajax_list_user.php" , true);
    xmlhttp.send();
  
}


function addUser(){
  window.location.href = "../page/form_user.php?ID_USER=0";
}

function editUser(id_user){
  window.location.href = "../page/form_user.php?ID_USER="+id_user;
}


function pesanDelete(pesan){
  if(pesan == 'TRUE'){
   Swal.fire({
        icon: 'success',
        title: 'Data Berhasil Terhapus'
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location.href = "../page/user.php";
        } 
      })
  }else{
    Swal.fire({
        icon: 'error',
        title: 'Gagal Menghapus Data',
        text: ''+pesan
      })
  }
}

function deleteAjax(id_user) {
  var parameter= "?ID_USER="+id_user;
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       pesanDelete(this.responseText);
      }
    };
    xmlhttp.open("GET", "../ajax/ajax_delete_user.php"+parameter , true);
    xmlhttp.send();
  
}

function deleteUser(id_user){
  Swal.fire({
    icon: 'warning',
    title: 'Apakah anda yakin?',
    text: 'Data yang telah dihapus tidak bisa dikembalian',
    showDenyButton: false,
    showCancelButton: true,
    confirmButtonText: `Delete`,
    denyButtonText: `Cancel`,
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      deleteAjax(id_user);
    } 
  })
}

</script>
<body class="hold-transition sidebar-mini" onload="onloadPage();">
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
            <h1 class="m-0 text-dark">List User</h1>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Karyawan</a></li>
              <li class="breadcrumb-item active">List User</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-list"></i>
              List User
            </h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <div class="card-body">

              <div id="list_user">
                
              </div>

            <!-- /.row -->
             <a href="javascript:addUser();" class="btn btn-success">Tambah</a>
          </div>
          <!-- /.card-body -->
        </div>
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
<script src="../asset/js/jquery.dataTables.min.js" ></script>
<script src="../asset/js/dataTables.bootstrap4.min.js" ></script>
</body>
<script type="text/javascript">
     function reloadDataTable(){
        $('#DATA_USER').DataTable({
          "paging": true,
          "lengthChange": false,
          "searching": true,
          "ordering": false,
          "info": true,
          "autoWidth": false,
        });
      }
</script>
</html>
