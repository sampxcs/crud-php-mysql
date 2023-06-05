<?php 
include 'db.php';
include 'includes/header.php';
?>

<h1>ToDoList CRUD app with PHP, MySQL & Docker</h1>

<?php if(isset($_SESSION['message'])) {
  echo '<div class="alert" data-type='.$_SESSION['type'].'>'.$_SESSION['message'].' </div>';
  session_destroy();
} ?>

<form action="create.php" method="POST">
  <input 
    name="title"
    oninput="this.setCustomValidity('');this.classList.add('input')"
    oninvalid="this.setCustomValidity('Task title is required, max length is 45 chars')"
    pattern=".{0,45}"
    placeholder="Title"
    required
    title="Task title is required, max length is 45 chars"
    type="text" 
  />
  <textarea 
    name="description" 
    oninput="this.setCustomValidity('');this.classList.add('input')"
    oninvalid="this.setCustomValidity('Task description is required')"
    placeholder="Description" 
    required
    ttile="Task description is required"
  ></textarea>
  <button>Submit</button>
</form>


<?php 
$tasks = $mysqli->query("SELECT * FROM task");
if($tasks->num_rows) {
?>
<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Description</th>
      <th>Created At</th>
      <th>Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      $tasks = $mysqli->query("SELECT * FROM task");
      foreach($tasks as $task) { ?>
      <tr>
        <td><?= $task['id'] ?></td>
        <td><?= $task['title'] ?></td>
        <td><?= $task['description'] ?></td>
        <td><?= $task['createdAt'] ?></td>
        <td class="actions_container">
          <a href="/update.php?id=<?php echo $task['id'] ?>">
            <button>
              <svg xmlns="http://www.w3.org/2000/svg" height="1em" fill="currentColor" viewBox="0 0 512 512"><path d="M471.6 21.7c-21.9-21.9-57.3-21.9-79.2 0L362.3 51.7l97.9 97.9 30.1-30.1c21.9-21.9 21.9-57.3 0-79.2L471.6 21.7zm-299.2 220c-6.1 6.1-10.8 13.6-13.5 21.9l-29.6 88.8c-2.9 8.6-.6 18.1 5.8 24.6s15.9 8.7 24.6 5.8l88.8-29.6c8.2-2.7 15.7-7.4 21.9-13.5L437.7 172.3 339.7 74.3 172.4 241.7zM96 64C43 64 0 107 0 160V416c0 53 43 96 96 96H352c53 0 96-43 96-96V320c0-17.7-14.3-32-32-32s-32 14.3-32 32v96c0 17.7-14.3 32-32 32H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h96c17.7 0 32-14.3 32-32s-14.3-32-32-32H96z"/></svg>
            </button>
          </a>
          <a href="/delete.php?id=<?php echo $task['id'] ?>">
            <button>
              <svg xmlns="http://www.w3.org/2000/svg" height="1em" fill="currentColor" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg>
            </button>
          </a>
        </td>
      </tr>
    <?php }} ?>
  </tbody>
</table>
<?php include 'includes/footer.php'; ?>








