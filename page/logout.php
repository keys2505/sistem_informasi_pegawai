<?php 
ob_start(); 
session_start();

   $uri =  $_SESSION["uri"] ;
   session_destroy();
   header('Location: '.$uri.'/page/login.php');
   exit();


?>