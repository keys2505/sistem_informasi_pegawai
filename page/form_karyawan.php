<?php ob_start();
 session_start();?>

<?php
date_default_timezone_set('Asia/Jakarta');
include '../db/db_connection.php';
include '../db/entity/karyawan.php'; 

$id_karyawan = $_GET['ID_KARYAWAN'];
$karyawan = new Karyawan();
if($id_karyawan != 0){
  $sql = " SELECT * FROM karyawan where ID_KARYAWAN = '".$id_karyawan."'";
  $conn = new DBConnection();
  $conn -> get_connetion();
  $result =  $conn -> execute_query($sql);

  if ($result->num_rows > 0) {
    $karyawan -> auto_set($result);
  }
  $conn -> close_connetion();
}


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
  <link rel="stylesheet" href="../asset/css/select2-bootstrap4.min.css">
  <link rel="stylesheet" href="../asset/css/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="../asset/css/datepicker3.css">
  
 
</head>
<script>
function simpan() {
  var parameter= "?ID_KARYAWAN="+document.getElementById("ID_KARYAWAN").value;
  parameter+= "&NAMA_KARYAWAN="+document.getElementById("NAMA_KARYAWAN").value;
  parameter+= "&DEPARTMENT="+document.getElementById("DEPARTMENT").value;
  parameter+= "&JABATAN="+document.getElementById("JABATAN").value;
  parameter+= "&TEMPAT_LAHIR="+document.getElementById("TEMPAT_LAHIR").value;
  parameter+= "&TANGGAL_LAHIR="+document.getElementById("TANGGAL_LAHIR").value;
  parameter+= "&ALAMAT="+document.getElementById("ALAMAT").value;
  parameter+= "&JENIS_KELAMIN="+document.getElementById("JENIS_KELAMIN").value;
  parameter+= "&STATUS_PERKAWINAN="+document.getElementById("STATUS_PERKAWINAN").value;
  parameter+= "&STATUS_RESIGN="+document.getElementById("STATUS_RESIGN").value;
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       // document.getElementById("ajax_result").innerHTML = this.responseText;
       pesanSimpan(this.responseText);
       
      }
    };
    xmlhttp.open("GET", "../ajax/ajax_form_karyawan.php"+parameter , true);
    xmlhttp.send();
  
}


function pesanSimpan(pesan){
  if(pesan == 'TRUE'){
   Swal.fire({
        icon: 'success',
        title: 'Data Berhasil Tersimpan'
      }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
          window.location.href = "../page/karyawan.php";
        } 
      })
  }else{
    Swal.fire({
        icon: 'error',
        title: 'Gagal Menyimpan Data',
        text: ''+pesan
      })
  }
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

function deleteEmp(){
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
      deleteAjax();
    } 
  })
}

function deleteAjax() {
  var parameter= "?ID_KARYAWAN="+document.getElementById("ID_KARYAWAN").value;
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       pesanDelete(this.responseText);
      }
    };
    xmlhttp.open("GET", "../ajax/ajax_delete_karyawan.php"+parameter , true);
    xmlhttp.send();
  
}

</script>

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
            <?php if($id_karyawan==0){?>
              <h1 class="m-0 text-dark">Input Karyawan</h1>
            <?php }else{ ?>
              <h1 class="m-0 text-dark">Edit Karyawan</h1>
            <?php }?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Karyawan</a></li>
              <?php if($id_karyawan==0){?>
                <li class="breadcrumb-item active">Input Karyawan</li>
              <?php }else{ ?>
                <li class="breadcrumb-item active">Edit Karyawan</li>
              <?php }?>
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
              <i class="fas fa-tag"></i>
              Input Karyawan
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
                    <label >ID Karyawan:</label>
                    <input type="text" class="form-control" id="ID_KARYAWAN" placeholder="AUTO GENERATE"  value="<?php echo $karyawan -> get_id_karyawan(); ?>" disabled="">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label >Departement:</label>
                    <div class="select2-purple">
                     <select class="form-control select2bs4" style="width: 100%;" id="DEPARTMENT">
                            <option value="Accounting" <?php echo ($karyawan -> get_departement() == 'Accounting') ? 'selected':''?> >Accounting</option>
                            <option value="HRD" <?php echo ($karyawan -> get_departement() == 'HRD') ? 'selected':''?> >HRD</option>
                            <option value="HOLDING" <?php echo ($karyawan -> get_departement() == 'HOLDING') ? 'selected':''?> >HOLDING</option>
                            <option value="IT" <?php echo ($karyawan -> get_departement() == 'IT') ? 'selected':''?> >IT</option>
                            <option value="Security" <?php echo ($karyawan -> get_departement() == 'Security') ? 'selected':''?>>Security</option>
                      </select>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label >Nama Karyawan:</label>
                    <input type="text" class="form-control" id="NAMA_KARYAWAN" placeholder="Nama Karyawan" value="<?php echo $karyawan -> get_nama_karyawan(); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label >Jabatan:</label>
                    <div class="select2-purple">
                     <select class="form-control select2bs4" style="width: 100%;" id="JABATAN">
                            <option value="Direktur" <?php echo ($karyawan -> get_jabatan() == 'Direktur') ? 'selected':''?> >Direktur</option>
                            <option value="General Manager" <?php echo ($karyawan -> get_jabatan() == 'General Manager') ? 'selected':''?> >General Manager</option>
                            <option value="Manager" <?php echo ($karyawan -> get_jabatan() == 'Manager') ? 'selected':''?> > Manager</option>
                            <option value="Supervisor" <?php echo ($karyawan -> get_jabatan() == 'Supervisor') ? 'selected':''?> >Supervisor</option>
                            <option value="Staff" <?php echo ($karyawan -> get_jabatan() == 'Staff') ? 'selected':''?> >Staff</option>
                      </select>
                    </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label >Tempat Lahir:</label>
                    <input type="text" class="form-control" id="TEMPAT_LAHIR" placeholder="Tempat Lahir" value="<?php echo $karyawan -> get_tempat_lahir(); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                 <div class="form-group">
                  <label>Tanggal Lahir:</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="far fa-calendar-alt"></i>
                      </span>
                    </div>
                    <input type="text"  class="form-control float-right"  id="TANGGAL_LAHIR" value="<?php echo $karyawan -> get_tanggal_lahir() ; ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label >Alamat:</label>
                    <input type="text" class="form-control" id="ALAMAT" placeholder="Alamat" value="<?php echo $karyawan -> get_alamat(); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Status Perkawinan:</label>
                  <select class="form-control select2bs4" style="width: 100%;" id="STATUS_PERKAWINAN">
                    <option value="TK/0" <?php echo ($karyawan -> get_status_perkawinan() == 'TK/0') ? 'selected':''?>>TK/0</option>
                    <option value="TK/1" <?php echo ($karyawan -> get_status_perkawinan() == 'TK/1') ? 'selected':''?>>TK/1</option>
                    <option value="TK/2" <?php echo ($karyawan -> get_status_perkawinan() == 'TK/2') ? 'selected':''?>>TK/2</option>
                    <option value="TK/3" <?php echo ($karyawan -> get_status_perkawinan() == 'TK/3') ? 'selected':''?>>TK/3</option>
                    <option value="K/0" <?php echo ($karyawan -> get_status_perkawinan() == 'K/0') ? 'selected':''?>>K/0</option>
                    <option value="K/1" <?php echo ($karyawan -> get_status_perkawinan() == 'K/1') ? 'selected':''?>>K/1</option>
                    <option value="K/2" <?php echo ($karyawan -> get_status_perkawinan() == 'K/2') ? 'selected':''?>>K/2</option>
                    <option value="K/3" <?php echo ($karyawan -> get_status_perkawinan() == 'K/3') ? 'selected':''?>>K/3</option>
                  </select>
              </div>
            </div>
          </div>
            <div class="row">
              <div class="col-sm-6">
               <div class="form-group">
                  <label>Jenis Kelamin:</label>
                  <select class="form-control select2bs4" style="width: 100%;" id="JENIS_KELAMIN">
                    <option value="0" <?php echo ($karyawan -> get_jenis_kelamin() == 'LAKI-LAKI') ? 'selected':''?>>LAKI-LAKI</option>
                    <option value="1" <?php echo ($karyawan -> get_jenis_kelamin() == 'PEREMPUAN') ? 'selected':''?>>PEREMPUAN</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
               <div class="form-group">
                  <label>Status Resign:</label>
                  <select class="form-control select2bs4" style="width: 100%;" id="STATUS_RESIGN">
                    <option value="0" <?php echo ($karyawan -> get_status_resign() == 0) ? 'selected':''?>>No</option>
                    <option value="1" <?php echo ($karyawan -> get_status_resign() == 1) ? 'selected':''?>>Yes</option>
                  </select>
                </div>
              </div>
             
            </div>
            <div id="ajax_result"></div>
            <div class="row">
              <div class="col-sm-6">
              <a href="javascript:simpan();" class="btn btn-primary">Simpan</a>
              <?php if($id_karyawan!=0){?>
              <a href="javascript:deleteEmp();" class="btn btn-danger">Delete</a>  
              <?php }?> 
              </div>
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
<script src="../asset/js/bootstrap-datepicker.js" ></script>

</body>
<script type="text/javascript">
   
  $('.select2bs4').select2({
      theme: 'bootstrap4'
    })

    $('#TANGGAL_LAHIR').datepicker({
      autoclose: true,
      todayHighlight: true,
      format: 'yyyy-mm-dd'
    });
</script>
</html>
