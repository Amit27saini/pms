<?php
include('../global/header.php');
include('../global/connection.php');
// get all projects  data
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM new_projects where id='$id'";
    $project_result = $conn->query($query);
    $project_row = $project_result->fetch_assoc();
    $project_row['project'];
}
// get all projects status type
$sql = "SELECT * FROM project_status";
$result = $conn->query($sql);
// post  all projects  updated data
if(isset($_POST['fproject']) && isset($_POST['fdetails']))
{
    $fproject= $_POST['fproject'];
    $fdetails =$_POST['fdetails'];
    $duedate =$_POST['duedate'];
    $fstatus =$_POST['fstatus'];
    $fdes = $_POST['fdes'];
    $sqlqueary="UPDATE new_projects SET project='$fproject',project_details='$fdetails',due_date='$duedate', status_id='$fstatus',description='$fdes' WHERE id='$id'";
    $result = $conn->query($sqlqueary);
    if($result)
    header("Location: http://localhost/pms/projects/index.php?success=1");
    else
    header("Location: http://localhost/pms/projects/index.php?success=0");
}

?>
<?php if (isset($_SESSION['login_user'])) { ?>
    <div class="container">
        <div class="mt-4  py-1">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item "><a href="index.php" class="text-decoration-none"><b>Project</b></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><b>Edit Project</b></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class=" ">
            <?php
            if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong> Successfully Added!</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php } ?>
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
                        <h2> Edit Project</h2>
                    </div>

                    <form action="" method="post" class="row g-3">
                        <div class="col-md-6">
                            <label for="inputtext" class="form-label">Project</label>
                            <input type="text" class="form-control" id="inputproject" value="<?php echo $project_row['project']?>" name="fproject" placeholder="Enter Project Name">
                        </div>

                        <div class="col-6">
                            <label for="inputAddress" class="form-label">Project Details</label>
                            <input type="text" class="form-control" id="inputAddress" value="<?php echo $project_row['project_details']?>" name="fdetails" placeholder="Project Details">
                        </div>

                        <div class="col-md-6">
                            <label for="inputedate" class="form-label">Due Date</label>
                            <input type="date" class="form-control" value="<?php echo $project_row['due_date']?>"    name="duedate" id="duedate">
                        </div>
                        <div class="col-md-6">
                            <label for="inputStatus" class="form-label">status</label>
                            <select id="inputStatus" name="fstatus" class="form-select">
                                <option selected>Choose...</option>
                                <?php while ($row = $result->fetch_assoc()) { ?>
                                    <option value="<?php echo $row['id'] ?>" <?php if($project_row['status_id']==$row['id']) echo 'selected' ?>><?php echo $row['status'] ?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label for="Details" class="form-label">Description</label>
                            <textarea type="text" class="form-control" id="inputDetails" name="fdes" placeholder="Description"><?php echo $project_row['description']?></textarea>
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
                            <button type="submit" id="pjtbtn" class="btn btn-clr btn-hv">Update</button>

                        </div>
                    </form>

                </div>
            </div>
        </div>

    </div>
<?php } include('../global/footer.php');  ?>
 