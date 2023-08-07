<?php
// login.php
include("connection.php");
include('session.php');
echo $useremail =  $_POST["lemail"];
echo $userpassword =  $_POST["lpassword"];
echo $logindata = "SELECT full_name, email , password  from users where email = '$useremail'";
$result = $conn->query($logindata);
echo $row = $result->fetch_assoc();
if ($row["password"] == !'') {   
  $verify = password_verify($userpassword, $row["password"]);
  echo $verify;
  if ($verify) {
    $_SESSION['login_user'] = $row["full_name"];
    header("Location:index.php?success=1");
  }
} else {
  echo "<td> no class</td>";
}
// ?>