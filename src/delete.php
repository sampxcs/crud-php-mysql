<?php 
include 'db.php';

$id = $_GET['id'];

$mysqli->query("DELETE FROM task WHERE id = '$id'");

if($mysqli->error) {
  $_SESSION['message'] = "Task could not be deleted! ".$mysqli->error;
  $_SESSION['type'] = "danger";
  header("Location: index.php");
  exit();
}

$_SESSION['message'] = "Task deleted successfully!";
$_SESSION['type'] = "success";
header("Location: index.php");
?>