<?php 
include 'db.php';

$title = $_POST['title'];
$description = $_POST['description'];


$mysqli->query("INSERT INTO task (title, description) VALUES ('$title', '$description')");

if($mysqli->error) {
  $_SESSION['message'] = "Task could not be created! ".$mysqli->error;
  $_SESSION['type'] = "danger";
  header("Location: index.php");
  exit();
}

$_SESSION['message'] = "Task created successfully!";
$_SESSION['type'] = "success";
header("Location: index.php");
?>