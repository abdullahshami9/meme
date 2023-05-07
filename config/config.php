<?php 
class Database{
	private $servername = "localhost";
	private $username = "root";
	private $password = "";
	private $db_name = "memehub";
    public $con;

    function __construct()
    {
        try{
        	$this->con=new mysqli($this->servername,$this->username,$this->password,$this->db_name);
        }catch (Exception $e) {
			$error = $e->getMessage();
			echo 'db not connected'.$error;
		}
    }
}
