<?php
session_start();
include('../global/connection.php');
 $ftask= $_POST['ftask'];
 $fdetails =$_POST['fdetails'];
 $project_id= $_POST['project_id'];
 $fuser =$_POST['fuser'];
$task_sql = "INSERT INTO tasks(name,task_details,project_id,user_id) values('$ftask','$fdetails','$project_id','$fuser')";
if($conn->query($task_sql))
header("Location: view.php?id= $project_id");
else
echo "wrongquery". $conn->error;
?>     