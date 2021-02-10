<!-- Navbar -->
<?php
include '../db/entity/user.php';
$user = new User();


if(isset($_SESSION["user"])){

  $user = unserialize($_SESSION["user"]);
  if(!($user->get_user_status()==0  )){
     $uri =  $_SESSION["uri"] ;
     header('Location: '.$uri.'/page/login.php');
     exit();
  }
}else{
   header('Location: ../page/login.php');
     exit();
}

?>
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="../page/dashboard.php" class="nav-link">Home</a>
      </li>
   </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <a href="../page/logout.php" class="btn btn-sm btn-danger">Logout</a>
    </ul>
  </nav>
  <!-- /.navbar -->