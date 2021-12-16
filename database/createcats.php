<?php
require_once 'login.php';
$conn = new mysqli($host, $login, $password, $db);
if ($conn->connect_error) die("Fatal error");

$query = "CREATE TABLE cats (
	id SMALLINT NOT NULL AUTO_INCREMENT,
	family VARCHAR(32) NOT NULL,
	name VARCHAR(32) NOT NULL,
	age TINYINT NOT NULL,
	PRIMARY KEY (id)
)";

$result = $conn->query($query);
if (!$result) die("Сбой при доступе к базе данных");