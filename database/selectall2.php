<?php
require_once 'login.php';
$conn = new mysqli($host, $login, $password, $db);
if ($conn->connect_error) die("Fatal error");

$query = "Select * from customers";
$result = $conn->query($query);
if (!$result) die("Сбой при доступе к базе данных");

$rows = $result->num_rows;

for ($j = 0; $j < $rows; ++$j){
	$row = $result->fetch_array(MYSQLI_NUM);
	echo htmlspecialchars($row[0]) . " purchased ISBN " . 
		 htmlspecialchars($row[1]) . ":<br>";

	$subquery = "SELECT * FROM classics WHERE isbn='$row[1]'";
	$subresult = $conn->query($subquery);
	if (!$subresult) die("Сбой при доступе к базе данных");

	$subrow = $subresult->fetch_array(MYSQLI_NUM);
	echo "&nbsp;&nbsp;" . htmlspecialchars($subrow[1]) . " by " . 
		 htmlspecialchars($subrow[0]) . ":<br><br>";
}
$result->close();
$conn->close();