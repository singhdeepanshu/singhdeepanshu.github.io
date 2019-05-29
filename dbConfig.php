<?php
/**
 *  This Class Controls the CRUD Operations and Provide a Layer of Abstraction
 */
 class Connection {
	 private $user;
	 private $password;
	 private $host;
	 private $db;
	 public $conn;
	 
	 function __construct() {
		 $this->user = "root";
		 $this->password = "";
		 $this->host = "localhost";
		 $this->db = "events_db";
		 $this->conn = null;
	 }
	 
	 public function connect() {
		 $this->conn = mysqli_connect($this->host,$this->user,$this->password,$this->db) or die(mysqli_error($this->conn));
	 }
	 
	 public function disconnect() {
		 mysqli_close($this->conn);
	 }
	 
	 public function get_handle() {
		 if($this->conn) {
			 return $this->conn;
		 } else {
			 return false;
		 }
	 }
	 
	 public function get($query) {
		 if(mysqli_ping($this->conn)) {
			 //echo $query;
			 $return = mysqli_query($this->conn,$query) or die(json_encode(array('type'=>'error','msg'=>mysqli_error($this->conn))));
			 return $return;
		 } else {
			 die(json_encode(array('type'=>'error','msg'=>mysqli_error($this->conn))));
			 return false;
		 }
	 }
 };
