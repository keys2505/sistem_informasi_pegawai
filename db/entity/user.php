<?php

class User {
	public $id_user = "";
	public $username = "";
	public $password = "";
	public $fullname = "";
	public $email = "";
	public $user_type = 0;
	public $user_status = 0;

  function get_id_user() {
	return $this->id_user;
  }
 function set_id_user($id_user) {
	 $this->id_user = $id_user;
  }
  function get_username() {
	return $this->username;
  }
 function set_username($username) {
	 $this->username = $username;
  }
  function get_password() {
	return $this->password;
  }
 function set_password($password) {
	 $this->password = $password;
  }
  function get_fullname() {
	return $this->fullname;
  }
 function set_fullname($fullname) {
	 $this->fullname = $fullname;
  }
  function get_email() {
	return $this->email;
  }
 function set_email($email) {
	 $this->email = $email;
  }
  function get_user_type() {
	return $this->user_type;
  }
 function set_user_type($user_type) {
	 $this->user_type = $user_type;
  }
  function get_user_status() {
	return $this->user_status;
  }
 function set_user_status($user_status) {
	 $this->user_status = $user_status;
  }

  function auto_set($resut_db){
  	while($row = $resut_db->fetch_assoc()) {
	    $this->id_user =  $row["ID_USER"];
	    $this->username =  $row["USERNAME"];
	    $this->password =  $row["PASSWORD"];
	    $this->email =  $row["EMAIL"];
	    $this->fullname =  $row["FULLNAME"];
	    $this->user_type =  $row["USER_TYPE"];
	    $this->user_status =  $row["USER_STATUS"];
	}
  }
  
}

?>