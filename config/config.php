<?php
// error_reporting(0);
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$_SESSION['config'] = 1;

	class Database {
		private static $instance;
		private $servername = "localhost";
		private $username = "root";
		private $password = "";
		private $db_name = "memehub";
		public $con;

		private function __construct() {
			try {
				$this->con = new mysqli($this->servername, $this->username, $this->password, $this->db_name);
			} catch (Exception $e) {
				$error = $e->getMessage();
				echo 'db not connected' . $error;
			}
		}

		public static function getInstance() {
			if (self::$instance === null) {
				self::$instance = new self();
			}
			return self::$instance;
		}
	}
