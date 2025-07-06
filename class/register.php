<?php
include "../database/conn.php";

class User
{
	private $conn;

	public function __construct()
	{
		$this->conn = (new Database())->conn;
	}

	public function register($username, $password)
	{
		// Check if username exists
		$stmt = $this->conn->prepare("SELECT customer_id FROM customer_table WHERE username = :username");
		$stmt->execute(['username' => $username]);

		if ($stmt->rowCount() > 0) {
			return "Username already exists.";
		}

		// Hash and insert new user
		$hashedPassword = password_hash($password, PASSWORD_DEFAULT);
		$stmt = $this->conn->prepare("INSERT INTO customer_table (username, password) VALUES (:username, :password)");

		if ($stmt->execute(['username' => $username, 'password' => $hashedPassword])) {
			return "Registration successful.";
		}

		return "Registration failed.";
	}
}
