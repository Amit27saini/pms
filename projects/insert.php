<?php
session_start();
include('../global/connection.php');
$fproject= $_POST['fproject'];
$fdetails =$_POST['fdetails'];
$duedate =$_POST['duedate'];
$fstatus =$_POST['fstatus'];
$fdes = $_POST['fdes'];
$sqlquery="insert into new_projects(project,project_details,due_date,status_id,description)
values('$fproject','$fdetails','$duedate','$fstatus','$fdes')";
$result = $conn->query($sqlquery);
if($result)
header("Location: index.php?success=1");
else
header("Location: index.php?success=0");
?>     