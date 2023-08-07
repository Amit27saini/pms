<?php
include('session.php');
include('connection.php');
 $fullname = $_POST['fullname']; 
 $email = $_POST['femail'];
 $fpassword = $_POST['fpassword'];
 $fusertype = $_POST['fusertype'];
$fgender = $_POST['fgender'];
$fpassword_hash = password_hash($fpassword, 
PASSWORD_DEFAULT);
 $sql="insert into users(full_name,email,password,user_type_id,gender_id)
values('$fullname','$email','$fpassword_hash','$fusertype','$fgender')";
$userresult=$conn->query($sql);
if($userresult)
header("Location: http://localhost/pms/add_user.php?success=1");
else
header("Location: http://localhost/pms/add_user.php?success=0");
?>     