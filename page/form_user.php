<?php ob_start();
 session_start();?>

<?php 
include '../db/db_connection.php';


$id_user = $_GET['ID_USER'];



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
  var parameter= "?ID_USER="+document.getElementById("ID_USER").value;
  parameter+= "&USERNAME="+document.getElementById("USERNAME").value;
  parameter+= "&PASSWORD="+document.getElementById("PASSWORD").value;
  parameter+= "&FULLNAME="+document.getElementById("FULLNAME").value;
  parameter+= "&EMAIL="+document.getElementById("EMAIL").value;
  parameter+= "&USER_TYPE="+document.getElementById("USER_TYPE").value;
  parameter+= "&USER_STATUS="+document.getElementById("USER_STATUS").value;
  
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       // document.getElementById("ajax_result").innerHTML = this.responseText;
       pesanSimpan(this.responseText);
       
      }
    };
    xmlhttp.open("GET", "../ajax/ajax_form_user.php"+parameter , true);
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
          window.location.href = "../page/user.php";
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

function deleteUser(){
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
  var parameter= "?ID_USER="+document.getElementById("ID_USER").value;
  
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
       pesanDelete(this.responseText);
      }
    };
    xmlhttp.open("GET", "../ajax/ajax_delete_user.php"+parameter , true);
    xmlhttp.send();
  
}

</script>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

<!-- include file header -->
  <?php include '../page/header.php'  ?>

<!-- include file sidebar -->
  <?php include '../page/sidebar.php'  ?>

<?php
$userObj = new User();
if($id_user != 0){
  $sql = " SELECT * FROM user where ID_USER = '".$id_user."'";
  $conn = new DBConnection();
  $conn -> get_connetion();
  $result =  $conn -> execute_query($sql);

  if ($result->num_rows > 0) {
    $userObj -> auto_set($result);
  }
  $conn -> close_connetion();
}

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <?php if($id_user==0){?>
              <h1 class="m-0 text-dark">Input User</h1>
            <?php }else{ ?>
              <h1 class="m-0 text-dark">Edit User</h1>
            <?php }?>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">User</a></li>
              <?php if($id_user==0){?>
                <li class="breadcrumb-item active">Input User</li>
              <?php }else{ ?>
                <li class="breadcrumb-item active">Edit User</li>
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
              Input User
            </h3>
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>
          <div class="card-body" id="SEARCH_FORM">
            <input type="hidden" class="form-control" id="ID_USER" value="<?php echo $userObj -> get_id_user(); ?>" >
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label >Username:</label>
                    <input type="text" class="form-control" id="USERNAME" placeholder="Username" value="<?php echo $userObj -> get_username(); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label >Fullname:</label>
                    <input type="text" class="form-control" id="FULLNAME" placeholder="Nama Lengkap" value="<?php echo $userObj -> get_fullname(); ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                    <label >Password:</label>
                    <input type="password" class="form-control" id="PASSWORD" placeholder="Password" value="<?php echo $userObj -> get_password(); ?>">
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                    <label >Email:</label>
                    <input type="email" class="form-control" id="EMAIL" placeholder="Email" value="<?php echo $userObj -> get_email(); ?>">
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Tipe User:</label>
                  <select class="form-control select2bs4" style="width: 100%;" id="USER_TYPE">
                    <option value="0" <?php echo ($userObj -> get_user_type() == 0) ? 'selected':''?> >Staff User</option>
                    <option value="1" <?php echo ($userObj -> get_user_type() == 1) ? 'selected':''?>>Administrator</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="form-group">
                  <label>Status User:</label>
                  <select class="form-control select2bs4" style="width: 100%;" id="USER_STATUS">
                    <option value="0" <?php echo $userObj -> get_user_status() == 0 ? 'selected':'' ?> >Aktif</option>
                    <option value="1" <?php echo $userObj -> get_user_status() == 1 ? 'selected':''?> >Non Aktif</option>
                  </select>
              </div>
            </div>
            </div>
            <div class="row">
              <div class="col-sm-6">
              <a href="javascript:simpan();" class="btn btn-primary">Simpan</a>
              <?php if($id_user!=0){?>
              <a href="javascript:deleteUser();" class="btn btn-danger">Delete</a>  
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

   
</script>
</html>
