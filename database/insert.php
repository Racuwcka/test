<?php
require_once 'login.php';
$conn = new mysqli($host, $login, $password, $db);
if ($conn->connect_error) die("Fatal error");

$query = "INSERT INTO classics VALUES('Charles Dickens', 'The Old Curiosity Shop', 'Fiction', '1841', '9780099533474')";
$result = $conn->query($query);
if (!$result) die("Сбой при доступе к базе данных");