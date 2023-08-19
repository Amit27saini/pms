<?php
// login.php
include("global/connection.php");
session_start();
$useremail =  $_POST["lemail"];
$userpassword =  $_POST["lpassword"];
$logindata = "SELECT full_name, email , password  from users where email = '$useremail'";
$result = $conn->query($logindata);
$row = $result->fetch_assoc();
if ($row["password"] == !'') {
  $verify = password_verify($userpassword, $row["password"]);
   $verify;
  if ($verify) {
    $_SESSION['login_user'] = $row["full_name"];
    header("Location: http://localhost/pms/index.php?success=1");
  }
} else {
  echo "wrong password";
}
