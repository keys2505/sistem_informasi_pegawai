<?php

class Karyawan {
	public $id_karyawan = "";
	public $nama_karyawan = "";
	public $alamat = "";
	public $tempat_lahir = "";
	public $tanggal_lahir = "";
	public $jenis_kelamin = "";
	public $status_perkawinan = "";
	public $jabatan = "";
	public $departement = "";
	public $status_resign = 0;
	

  function get_id_karyawan() {
	return $this->id_karyawan;
  }
 function set_id_karyawan($id_karyawan) {
	 $this->id_karyawan = $id_karyawan;
 } 
 function get_nama_karyawan() {
	return $this->nama_karyawan;
  }
 function set_nama_karyawan($nama_karyawan) {
	 $this->nama_karyawan = $nama_karyawan;
 } 
 function get_alamat() {
	return $this->alamat;
  }
 function set_alamat($alamat) {
	 $this->alamat = $alamat;
 } 
function get_tempat_lahir() {
	return $this->tempat_lahir;
  }
 function set_tempat_lahir($tempat_lahir) {
	 $this->tempat_lahir = $tempat_lahir;
 } 
 function get_tanggal_lahir() {
 	if($this->tanggal_lahir == ""){
 		return date("Y-m-d");
 	}else{
	return $this->tanggal_lahir;
	}
  }
 function set_tanggal_lahir($tanggal_lahir) {
	 $this->tanggal_lahir = $tanggal_lahir;
 } 
 function get_jenis_kelamin() {
	return $this->jenis_kelamin;
  }
 function set_jenis_kelamin($jenis_kelamin) {
	 $this->jenis_kelamin = $jenis_kelamin;
 } 
  function get_status_perkawinan() {
	return $this->status_perkawinan;
  }
 function set_status_perkawinan($status_perkawinan) {
	 $this->status_perkawinan = $status_perkawinan;
 } 
  function get_jabatan() {
	return $this->jabatan;
  }
 function set_jabatan($jabatan) {
	 $this->jabatan = $jabatan;
 } 
  function get_departement() {
	return $this->departement;
  }
 function set_departement($departement) {
	 $this->departement = $departement;
 } 
 function get_status_resign() {
	return $this->status_resign;
  }
 function set_status_resign($status_resign) {
	 $this->status_resign = $status_resign;
 } 
 

  function auto_set($resut_db){
  	while($row = $resut_db->fetch_assoc()) {
	    $this->id_karyawan =  $row["ID_KARYAWAN"];
	    $this->nama_karyawan =  $row["NAMA_KARYAWAN"];
	    $this->alamat =  $row["ALAMAT"];
	    $this->tempat_lahir =  $row["TEMPAT_LAHIR"];
	    $this->tanggal_lahir =  $row["TANGGAL_LAHIR"];
	    $this->jenis_kelamin =  $row["JENIS_KELAMIN"];
	    $this->status_perkawinan =  $row["STATUS_PERKAWINAN"];
	    $this->jabatan =  $row["JABATAN"];
	    $this->departement =  $row["DEPARTEMENT"];
	    $this->status_resign =  $row["STATUS_RESIGN"];
	   
	}
  }
  
}

?>