<?php
include('header&footer/header.php');
include('connection.php');
include('session.php');
$sql = "SELECT * FROM users_types";
$result = $conn->query($sql);
$sql_gen = "SELECT * FROM gender";
$result_gen = $conn->query($sql_gen);
?>
<?php if (isset($_SESSION['login_user'])) { ?>
    <div class="container">
        <div class="mt-4  py-1">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="User.php" class="text-decoration-none"><b>User</b></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><b>Add User</b></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class=" ">
            <?php
            if (isset($_GET['success'])) {
                if ($_GET['success']) { ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong> Successfully Added!</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
            <?php }
            } ?>
            <?php
            if (isset($_GET['success']) && $_GET['success'] == 0) { ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong><?php echo "Error: " . "<br>" . $conn->error; ?></strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
            <div class="row justify-content-center">
                <div class="col-6 form-clr p-4 my-3">
                    <div>
                        <h2> Add New User</h2>
                    </div>

                    <form action="insert_user.php" method="post" class="row g-3">
                        <div class="col-md-6">
                            <label for="fullname" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter full Name">
                        </div>

                        <div class="col-6">
                            <label for="femail" class="form-label">Email Details</label>
                            <input type="email" class="form-control" id="femail" name="femail" placeholder="Enter Email">
                        </div>

                        <div class="col-md-6">
                            <label for="fpassword" class="form-label">Password</label>
                            <input type="password" class="form-control" name="fpassword" id="fpassword">
                        </div>
                        <div class="col-md-6">
                            <label for="fusertype" class="form-label">User Type</label>
                            <select id="fusertype" name="fusertype" class="form-select">
                                <option selected>Choose...</option>
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="fgender" class="form-label">Gender</label>
                            <select id="fgender" name="fgender" class="form-select">
                                <option selected>Choose...</option>
                                </option>
                                <?php while ($gender = $result_gen->fetch_assoc()) { ?>
                                    <option value="<?php echo $gender['id'] ?>"><?php echo $gender['type'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="gridCheck">
                                <label class="form-check-label" for="gridCheck">
                                    Check me out
                                </label>
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" id="pjtbtn" class="btn btn-clr btn-hv">Add</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
<?php include('header&footer/footer.php'); } ?>
<?php if (!isset($_SESSION['login_user'])) {
    header("Location:login.php?1");
}