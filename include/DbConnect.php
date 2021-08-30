<?php 
/**
 * 
 */
class DbConnect
{
	private $conn;
	
	function __construct($host, $username, $password, $database)
	{
		$this->conn = new mysqli($host, $username, $password, $database);

		if ($this->conn->connect_error) {
			die("Connection failed: " . $this->conn->connect_error);
		}
	}

	function getConnection()
	{
		return $this->conn;
	}

	function closeDb()
	{
		$this->conn->close();
	}
}