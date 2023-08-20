<!-- project delete query -->
<?php
session_start();
include('../global/connection.php');
if(isset($_GET['task-id']))
echo $task_id=$_GET['task-id'];
$query = "DELETE FROM tasks WHERE id='$task_id'";
$result = $conn->query($query);
if($result)
header("Location: view.php?id=". $_GET['project-id']);
?>     