<!-- user delete query -->
<?php
session_start();
include('../global/connection.php');
if(isset($_GET['id']))
echo $id=$_GET['id'];
$query = "DELETE FROM users WHERE id='$id'";
$result = $conn->query($query);
if($result)
header("Location: index.php?deleted=1");
?>   