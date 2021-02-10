<?php 
include '../db/db_connection.php';
include '../db/entity/karyawan.php'; 

if($_GET['ID_KARYAWAN'] != null){
	$sql="DELETE FROM `tugas_web`.`karyawan` WHERE `ID_KARYAWAN` = '".$_GET['ID_KARYAWAN']."' ";

	 $conn = new DBConnection();
	 $conn -> get_connetion();
	
	if ($conn->execute_query($sql) === TRUE) {
	  echo "TRUE";
	} else {
	  echo "Error: " . $sql . "<br>" . $conn->error;
	}

	$conn -> close_connetion();
}
?>