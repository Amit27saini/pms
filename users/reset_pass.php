<?php
include('../global/header.php');
if (!isset($_SESSION['login_user'])) {
    header("Location:login.php?1");
}
include('../global/connection.php');
if (isset($_POST["lemail"]) && isset($_POST["prepassword"])) {
    echo $useremail =  $_POST["lemail"];
    echo $prepassword =  $_POST["prepassword"];
    echo $Currentpassword =  $_POST["Currentpassword"];
    echo $fpassword_hash = password_hash($Currentpassword, PASSWORD_DEFAULT);
    echo $resetdata = "SELECT email , password  from users where email = '$useremail'";
    $result = $conn->query($resetdata);
    echo $row = $result->fetch_assoc();
    if ($row["password"] == !'') {
        $verify = password_verify($prepassword, $row["password"]);
        echo $verify;
        if ($verify) {
            $passwordqueary = "UPDATE users SET password='$resetdata' WHERE id='$useremail'";
            $pass_updated = $conn->query($passwordqueary);
            if ($pass_updated) {
                header("Location: http://localhost/pms/reset_pass.php?success=1");
                echo "  hiii";
            } else {
                header("Location: http://localhost/pms/reset_pass.php?success=0");
                echo "by";
            }
        }
    } else {
        echo "<td> no class</td>";
    }
}
?>
<div class="container">
    <div class=" ">
        <div class="row justify-content-center my-5">
            <div class="col-6 form-clr p-4 my-3">
                <div class=" p-1 text-center">
                    <h2> Reset Your Password</h2>
                </div>
                <form action="" method="post" class="row g-3">
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="lemail" name="lemail" placeholder="Enter Email">
                    </div>
                    <div class="col-md-12">
                        <label for="fpassword" class="form-label">Previous Password</label>
                        <input type="password" class="form-control" name="prepassword" id="fpassword">
                    </div>
                    <div class="col-md-12">
                        <label for="fpassword" class="form-label"> Current Password</label>
                        <input type="password" class="form-control" name="Currentpassword" id="fpassword">
                    </div>
                    <div class="col-12 text-center">
                        <button type="submit" id="pjtbtn" class="btn btn-clr btn-hv px-4"><b>Update</b></button>

                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
<?php include('global/footer.php'); ?>