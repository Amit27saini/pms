<!-- project delete query -->
<?php
include('session.php');
include('connection.php');
if(isset($_GET['id']))
echo $id=$_GET['id'];
$query = "DELETE FROM new_projects WHERE id='$id'";
$result = $conn->query($query);
if($result)
header("Location: http://localhost/pms/project.php?deleted=1");
?>     