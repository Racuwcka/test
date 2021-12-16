<?php
require_once 'database/login.php';
$conn = new mysqli($host, $login, $password, $db);
if ($conn->connect_error) die("Fatal error");

if (isset($_SERVER['PHP_AUTH_USER']) &&
    isset($_SERVER['PHP_AUTH_PW']))
{
  $un_temp = mysql_entities_fix_string($conn, $_SERVER['PHP_AUTH_USER']);
  $pw_temp = mysql_entities_fix_string($conn, $_SERVER['PHP_AUTH_PW']);
  $query = "SELECT * FROM users WHERE username='$un_temp'";
  $result = $conn->query($query);

  if (!$result) die("User not found");
  elseif ($result->num_rows){
    $row = $result->fetch_array(MYSQLI_NUM);

    $result->close();

    if (password_verify($pw_temp, $row[3])){
      session_start();
      $_SESSION['forename'] = $row[0];
      $_SESSION['surname'] = $row[1];
      $_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
      $_SESSION['ua'] = $_SERVER['HTTP_USER_AGENT'];
      echo htmlspecialchars("$row[0] $row[1] : Привет $row[0], теперь вы зарегистрированы под именем '$row[2]'");
      die("<p><a href='continue.php'>Click</a></p>");
    }
    else die("Неверная комбинация имя пользователя - пароль");
  }
  else die("Неверная комбинация имя пользователя - пароль");
}
else
{
  header('WWW-Authenticate: Basic realm="Restricted Area"');
  header('HTTP/1.0 401 Unauthorized');
  die("Please enter your username and password");
}

$conn->close();

function mysql_entities_fix_string($conn, $string){
  return htmlentities(mysql_fix_string($conn, $string));
}
function mysql_fix_string($conn, $string){
  return $conn->real_escape_string($string);
}