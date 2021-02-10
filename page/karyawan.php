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
  <link rel="stylesheet" href="../asset/css/select2.css">
  <link rel="stylesheet" href="../asset/css/dataTables.bootstrap4.css">
  
</head>
<script>
function search() {
  var search_query= "?ID_KARYAWAN="+document.getElementById("ID_KARYAWAN").value;
  search_query+= "&NAMA_KARYAWAN="+document.getElementById("NAMA_KARYAWAN").value;

  var DEPARTMENT = [];
  for (var option of document.getElementById('DEPARTMENT').options) {
    if (option.selected) {
      DEPARTMENT.push(option.value);
    }
  }
  search_query+= "&DEPARTMENT="+DEPARTMENT;

  var JABATAN = [];
  for (var option of document.getElementById('JABATAN').options) {
    if (option.selected) {
      JABATAN.push(option.value);
    }
  }
  search_query+= "&JABATAN="+JABATAN;

  var STATUS_RESIGN = [];
  for (var option of document.getElementById('STATUS_RESIGN').options) {
    if (option.selected) {
      STATUS_RESIGN.push(option.value);
    }
  }
  search_query+= "&STATUS_RESIGN="+STATUS_RESIGN;

    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("list_karyawan").innerHTML = this.responseText;
        reloadDataTable();
      }
    };
    xmlhttp.open("GET", "../ajax/ajax_list_karyawan.php"+search_query , true);
    xmlhttp.send();
  
}

function onloadPage() {
    var search_query= "?ID_KARYAWAN="+document.getElementById("ID_KARYAWAN").value;
  search_query+= "&NAMA_KARYAWAN="+document.getElementById("NAMA_KARYAWAN").value;

  var DEPARTMENT = [];
  for (var option of document.getElementById('DEPARTMENT').options) {
    if (option.selected) {
      DEPARTMENT.push(option.value);
    }
  }
  search_query+= "&DEPARTMENT="+DEPARTMENT;

  var JABATAN = [];
  for (var option of document.getElementById('JABATAN').options) {
    if (option.selected) {
      JABATAN.push(option.value);
    }
  }
  search_query+= "&JABATAN="+JABATAN;

  var STATUS_RESIGN = [];
  for (var option of document.getElementById('STATUS_RESIGN').options) {
    if (option.selected) {
      STATUS_RESIGN.push(option.value);
    }
  }
  search_query+= "&STATUS_RESIGN="+STATUS_RESIGN;

  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("list_karyawan").innerHTML = this.responseText;
        reloadDataTable();
      }
    };
    xmlhttp.open("GET", "../ajax/ajax_list_karyawan.php"+search_query , true);
    xmlhttp.send();
  
}

function pesanDelete(pesan){
  if(pesan == 'TRUE'){
   Swal.fire({
        icon: 'success',
        title: 'Data Berhasil Terhapus'
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location.href = "../page/karyawan.php";
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

function deleteAjax(id_karyawan) {
  var parameter= "?ID_KARYAWAN="+id_karyawan;
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       pesanDelete(this.responseText);
      }
    };
    xmlhttp.open("GET", "../ajax/ajax_delete_karyawan.php"+parameter , true);
    xmlhttp.send();
  
}

function deleteEmp(id_karyawan){
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
      deleteAjax(id_karyawan);
    } 
  })
}

function addEmp(){
  window.location.href = "../page/form_karyawan.php?ID_KARYAWAN=0";
}

function editEmp(id_karyawan){
  window.location.href = "../page/form_karyawan.php?ID_KARYAWAN="+id_karyawan;
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
            <h1 class="m-0 text-dark">List Karyawan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Karyawan</a></li>
              <li class="breadcrumb-item active">List Karyawan</li>
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
              <i class="fas fa-search"></i>
              Pencarian Karyawan
            </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <div class="card-body" id="SEARCH_FORM">
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label >ID Karyawan</label>
                    <input type="text" class="form-control" id="ID_KARYAWAN" placeholder="ID Karyawan">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label >Departement</label>
                    <div class="select2-purple">
                     <select id="DEPARTMENT" class="select2" multiple="multiple" data-placeholder="Pilih Departement" data-dropdown-css-class="select2-purple" style="width: 100%;">
                            <option value="Accounting">Accounting</option>
                            <option value="HRD">HRD</option>
                            <option value="HOLDING">HOLDING</option>
                            <option value="IT">IT</option>
                            <option value="Security">Security</option>
                      </select>
                  </div>
                </div>
              </div>
            </div>
             <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label >Nama Karyawan</label>
                    <input type="text" class="form-control" id="NAMA_KARYAWAN" placeholder="Nama Karyawan">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label >Jabatan</label>
                    <div class="select2-purple">
                     <select class="select2" multiple="multiple" id="JABATAN" data-placeholder="Pilih Jabatan" data-dropdown-css-class="select2-purple" style="width: 100%;">
                            <option value="Direktur">Direktur</option>
                            <option value="General Manager">General Manager</option>
                            <option value="Kepala Departement">Kepala Departement</option>
                            <option value="Supervisor">Supervisor</option>
                            <option value="Staff">Staff</option>
                      </select>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
               <div class="form-group">
                  <label >Status Resign</label>
                    <div class="select2-purple">
                     <select class="select2" multiple="multiple" id="STATUS_RESIGN" data-dropdown-css-class="select2-purple" style="width: 100%;">
                    <option selected="selected" value="0">No</option>
                    <option value="1">Yes</option>
                  </select>
                </div>
              </div>
            </div>
              <div class="col-sm-6">
               
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
              <a href="javascript:search();" class="btn btn-primary">Search</a>
              <a href="javascript:addEmp();" class="btn btn-success">Tambah</a>
              </div>
            </div>
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
        </div>

        <div class="card card-default color-palette-box">
          <div class="card-header">
            <h3 class="card-title">
              <i class="fas fa-list"></i>
              List Karyawan
            </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <div class="card-body">
              <div id="list_karyawan">
                
              </div>
            <!-- /.row -->
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
<script src="../asset/js/select2.full.js" ></script>
<script src="../asset/js/jquery.dataTables.min.js" ></script>
<script src="../asset/js/dataTables.bootstrap4.min.js" ></script>

</body>
<script type="text/javascript">
   $('.select2').select2();

   function reloadDataTable(){
    $('#DATA_KARYAWAN').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": false,
      "info": true,
      "autoWidth": false,
    });
  }
</script>
</html>
