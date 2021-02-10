<?php 
include '../db/db_connection.php';
include '../db/entity/user.php'; 

if($_GET['ID_USER'] != null){
	$sql="DELETE FROM `user` WHERE `ID_USER` = '".$_GET['ID_USER']."' ";

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