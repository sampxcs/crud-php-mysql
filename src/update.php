<?php 
include 'db.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  $result = $mysqli->query("SELECT * FROM task WHERE id = '$id'");

  if ($result->num_rows) {
    $row = $result->fetch_array(1);
    $title = $row['title'];
    $description = $row['description'];
  }
}

if (isset($_POST['update'])) {
  $id = $_GET['id'];
  $title = $_POST['title'];
  $description = $_POST['description'];
  
  $mysqli->query("UPDATE task SET title = '$title', description = '$description' WHERE id = '$id'");

  if (!$mysqli->error) {
    $_SESSION['message'] = "Task updated successfully!";
    $_SESSION['type'] = "success";
    header("Location: index.php");
    exit();
  } 

  $_SESSION['message'] = "Task could not be updated! ".$mysqli->error;
  $_SESSION['type'] = "danger";
}
?>

<?php 
include 'includes/header.php';

if(isset($_SESSION['message'])) {
  echo '<div class="alert" data-type='.$_SESSION['type'].'>'.$_SESSION['message'].' </div>';
  session_destroy();
} 
?>

<form action="update.php?id=<?php echo $id ?>" method="POST">
  <h1>Edit Task</h1>
  <input 
    name="title"
    oninput="this.setCustomValidity('');this.classList.add('input')"
    oninvalid="this.setCustomValidity('Task title is required, max length is 45 chars')"
    pattern=".{0,45}"
    placeholder="Title"
    required
    title="Task title is required, max length is 45 chars"
    type="text"
    value="<?php echo $title; ?>"
  />
  <textarea 
    name="description" 
    oninput="this.setCustomValidity('');this.classList.add('input')"
    oninvalid="this.setCustomValidity('Task description is required')"
    placeholder="Description" 
    required
    ttile="Task description is required"
  ><?= $description ?></textarea>
  <button name="update">Update</button>
</form>

<?php include 'includes/footer.php' ?>
