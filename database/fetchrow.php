<?php
require_once 'login.php';
$connection = new mysqli($host, $login, $password, $db);

if ($connection->connect_error) die("Fatal error");

$query = "SELECT * FROM classics";
$result = $connection->query($query);

if (!$result) die ("Fatal Error");

$rows = $result->num_rows;

// print('<pre>');
// var_dump($result);
// print('</pre>');

for ($j = 0; $j < $rows; ++$j){
	$row = $result->fetch_array(MYSQLI_BOTH);

	echo 'Author: ' .htmlspecialchars($row['author']) .'<br>';
	echo 'Title: ' .htmlspecialchars($row['title']) .'<br>';
	echo 'Category: ' .htmlspecialchars($row['2']) .'<br>';
	echo 'Year: ' .htmlspecialchars($row['year']) .'<br>';
	echo 'ISBN: ' .htmlspecialchars($row['4']) .'<br><br>';
}

$result->close();
$connection->close();