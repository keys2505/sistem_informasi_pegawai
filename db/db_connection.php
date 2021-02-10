<?php

class DBConnection {
	public $conn = null;
	public $result = null;
	public $servername = "localhost";
	public $username = "admin";
	public $password = "admindimata";
	public $dbname = "tugas_web";

	 // function __construct() {
	 //    get_connetion();
	 //  }
  // Methods
  function get_connetion() {
		   // Create connection
		$this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
		// Check connection
		if ($this->conn->connect_error) {
		  die("Connection failed: " . $this->conn->connect_error);
		}
	return $this->conn;
  }

  function get_server_name() {
	return $this->servername;
  }


  // Methods
  function execute_query($sql) {
		$this->result = $this->conn->query($sql);
	return $this->result;
  }

  // Methods
  function close_connetion() {
  	$this->conn->close();
    return $this->conn;
  }
}

?>