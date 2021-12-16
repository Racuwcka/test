<?php
session_start();
print_r($_SESSION);
if (isset($_SESSION['forename'])) {
  $forename = $_SESSION['forename'];
  $surname = $_SESSION['surname'];

  destroy_session_and_data();

  echo "С возвращением $forename . <br>
        Ваше полное имя $forename $surname . <br>";
        
}
else echo "Please , для входа <a href='authenticate.php'>click</a>.";

function destroy_session_and_data(){
  $_SESSION = array();
  setcookie(session_name(), '', time() - 2592000, '/');
  session_destroy();
}