<?php
function mysql_entities_fix_string($conn, $string){
	return htmlentities(mysql_fix_string($conn, $string));
}
function mysql_fix_string($conn, $string){
	return $conn->real_escape_string($string);
}