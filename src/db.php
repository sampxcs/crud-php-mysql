<?php 

$mysqli = new mysqli('mysql-db', 'root', 'root', 'crud_php_mysql');

// Check connection
if ($mysqli -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}

session_start()

?>