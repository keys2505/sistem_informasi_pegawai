<?php 
include '../db/db_connection.php';
include '../db/entity/karyawan.php'; 
date_default_timezone_set('Asia/Jakarta');

if($_GET['ID_KARYAWAN'] == null){

	$sqlInsert = "INSERT INTO `karyawan` (`ID_KARYAWAN`, `NAMA_KARYAWAN`, `ALAMAT`, `TEMPAT_LAHIR`, `TANGGAL_LAHIR`, `JENIS_KELAMIN`, `STATUS_PERKAWINAN`, `JABATAN`, `DEPARTEMENT`, `STATUS_RESIGN`) VALUES (";

	$sqlInsert = $sqlInsert."'".date("Y").date("m").date("d").date("H").date("i").date("s")."',";
	$sqlInsert = $sqlInsert."'".$_GET['NAMA_KARYAWAN']."',";
	$sqlInsert = $sqlInsert."'".$_GET['ALAMAT']."',";
	$sqlInsert = $sqlInsert."'".$_GET['TEMPAT_LAHIR']."',";
	$sqlInsert = $sqlInsert."'".$_GET['TANGGAL_LAHIR']."',";
	$sqlInsert = $sqlInsert."'".$_GET['JENIS_KELAMIN']."',";
	$sqlInsert = $sqlInsert."'".$_GET['STATUS_PERKAWINAN']."',";
	$sqlInsert = $sqlInsert."'".$_GET['JABATAN']."',";
	$sqlInsert = $sqlInsert."'".$_GET['DEPARTMENT']."',";
	$sqlInsert = $sqlInsert."'".$_GET['STATUS_RESIGN']."'";
	$sqlInsert = $sqlInsert.") ;";

	 $conn = new DBConnection();
	 $conn -> get_connetion();
	
	if ($conn->execute_query($sqlInsert) === TRUE) {
	  echo "TRUE";
	} else {
	  echo "Error: " . $sqlInsert . "<br>" . $conn->error;
	}

	$conn -> close_connetion();

}else{
	$sqlUpadate="UPDATE `karyawan` SET         
	";

	$sqlUpadate = $sqlUpadate."`NAMA_KARYAWAN` = '".$_GET['NAMA_KARYAWAN']."' , ";
	$sqlUpadate = $sqlUpadate."`ALAMAT` = '".$_GET['ALAMAT']."' ,";
	$sqlUpadate = $sqlUpadate."`TEMPAT_LAHIR` = '".$_GET['TEMPAT_LAHIR']."' , ";
	$sqlUpadate = $sqlUpadate."`TANGGAL_LAHIR` = '".$_GET['TANGGAL_LAHIR']."' , ";
	$sqlUpadate = $sqlUpadate."`JENIS_KELAMIN` = '".$_GET['JENIS_KELAMIN']."' , ";
	$sqlUpadate = $sqlUpadate."`STATUS_PERKAWINAN` = '".$_GET['STATUS_PERKAWINAN']."' , ";
	$sqlUpadate = $sqlUpadate."`JABATAN` = '".$_GET['JABATAN']."' , ";
	$sqlUpadate = $sqlUpadate."`DEPARTEMENT` = '".$_GET['DEPARTMENT']."' , ";
	$sqlUpadate = $sqlUpadate."`STATUS_RESIGN` = '".$_GET['STATUS_RESIGN']."' ";

	$sqlUpadate = $sqlUpadate." WHERE `ID_KARYAWAN` = '".$_GET['ID_KARYAWAN']."'";

	 $conn = new DBConnection();
	 $conn -> get_connetion();
	 
	  if ($conn->execute_query($sqlUpadate) === TRUE) {
	  echo "TRUE";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn -> close_connetion();
	
}
?>