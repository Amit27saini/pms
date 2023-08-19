<!-- project delete query -->
<?php
session_start();
include('../global/connection.php');
if(isset($_GET['id']))
echo $id=$_GET['id'];
$query = "DELETE FROM new_projects WHERE id='$id'";
$result = $conn->query($query);
if($result)
header("Location: index.php?deleted=1");
?>     