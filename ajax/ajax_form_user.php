<?php 
include '../db/db_connection.php';
include '../db/entity/karyawan.php'; 
date_default_timezone_set('Asia/Jakarta');

if($_GET['ID_USER'] == null){

	$sqlInsert = "INSERT INTO `user` (`ID_USER`, `USERNAME`, `PASSWORD`, `FULLNAME`, `EMAIL`, `USER_TYPE`, `USER_STATUS`) VALUES ( ";

	$sqlInsert = $sqlInsert."'".date("Y").date("m").date("d").date("H").date("i").date("s")."',";
	$sqlInsert = $sqlInsert."'".$_GET['USERNAME']."',";
	$sqlInsert = $sqlInsert."'".$_GET['PASSWORD']."',";
	$sqlInsert = $sqlInsert."'".$_GET['FULLNAME']."',";
	$sqlInsert = $sqlInsert."'".$_GET['EMAIL']."',";
	$sqlInsert = $sqlInsert."'".$_GET['USER_TYPE']."',";
	$sqlInsert = $sqlInsert."'".$_GET['USER_STATUS']."'";
	$sqlInsert = $sqlInsert.") ;";

	 $conn = new DBConnection();
	 $conn -> get_connetion();
	echo  $_GET['ID_USER'];
	if ($conn->execute_query($sqlInsert) === TRUE) {
	  echo "TRUE";
	} else {
	  echo "Error: " . $sqlInsert . "<br>" . $conn->error;
	}

	$conn -> close_connetion();

}else{
	$sqlUpadate="UPDATE `user` SET         
	";

	$sqlUpadate = $sqlUpadate."`USERNAME` = '".$_GET['USERNAME']."' , ";
	$sqlUpadate = $sqlUpadate."`PASSWORD` = '".$_GET['PASSWORD']."' ,";
	$sqlUpadate = $sqlUpadate."`FULLNAME` = '".$_GET['FULLNAME']."' , ";
	$sqlUpadate = $sqlUpadate."`EMAIL` = '".$_GET['EMAIL']."' , ";
	$sqlUpadate = $sqlUpadate."`USER_TYPE` = '".$_GET['USER_TYPE']."' , ";
	$sqlUpadate = $sqlUpadate."`USER_STATUS` = '".$_GET['USER_STATUS']."'  ";
	
	$sqlUpadate = $sqlUpadate." WHERE `ID_USER` = '".$_GET['ID_USER']."'";

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