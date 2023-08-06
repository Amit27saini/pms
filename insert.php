<?php
include('session.php');
include('connection.php');
$fproject= $_POST['fproject'];
$fdetails =$_POST['fdetails'];
$duedate =$_POST['duedate'];
$fstatus =$_POST['fstatus'];
$fdes = $_POST['fdes'];
$sqlqueary="insert into new_projects(project,project_details,due_date,status_id,description)
values('$fproject','$fdetails','$duedate','$fstatus','$fdes')";
$result = $conn->query($sqlqueary);
if($result)
header("Location: http://localhost/pms/add.php?success=1");
else
header("Location: http://localhost/pms/add.php?success=0");
?>     