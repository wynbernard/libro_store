<?php
class Database
{
	private $host = "localhost";
	private $username = "root";
	private $password = "";
	private $dbname = "book_inventory_management";
	public $conn;

	public function __construct()
	{
		$this->connectDB();
	}

	public function connectDB()
	{
		try {
			$dsn = "mysql:host={$this->host};dbname={$this->dbname}";
			$this->conn = new PDO($dsn, $this->username, $this->password);
			$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch (PDOException $e) {
			die("Connection failed: " . $e->getMessage());
		}
	}
}
// Usage
$db = new Database();
$conn = $db->conn;
