<?php
include('../global/header.php');
include('../global/connection.php');
// get all projects  data
if (isset($_GET['task-id'])) {
    $task_id = $_GET['task-id'];
    $query = "SELECT * FROM tasks where id='$task_id '";
    $task_result = $conn->query($query);
    $task_row = $task_result->fetch_assoc();
    $task_row['project_id'];
}
// get all users name
$sql = "SELECT id,full_name FROM users";
$result = $conn->query($sql);
// task update query
if (isset($_POST['ftask']) && isset($_POST['fuser'])) {
    $ftask = $_POST['ftask'];
    $fuser = $_POST['fuser'];
    $fdetails = $_POST['fdetails'];
    $sqlqueary = "UPDATE tasks SET name='$ftask',task_details='$fdetails',user_id='$fuser' WHERE id='$task_id'";
    $taskresult = $conn->query($sqlqueary);
    if ($taskresult)

        header("Location: http://localhost/pms/projects/view.php?id=" .$task_row['project_id']);
    else

        header("Location: http://localhost/pms/projects/view.php?id=0");
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
                            <li class="breadcrumb-item active" aria-current="page"><a href="view.php?id=<?php echo $task_row['project_id'] ?>" class="text-decoration-none"><b>View</b></a></li>
                            <li class="breadcrumb-item active" aria-current="page"><b>Edit</b></li>

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

                    <form method="post" class="row g-3">
                        <div class="col-md-6">
                            <div class="d-flex flex-column align-items-start">
                                <label for="inputtask" class="form-label ">Task</label>
                                <input type="text" class="form-control" id="inputtask" value=" <?php echo $task_row['name'] ?>" name="ftask" placeholder="Enter Task Name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex flex-column align-items-start">
                                <label for="inputuser" class="form-label">Assign to</label>
                                <select id="inputuser" name="fuser" class="form-select">
                                    <option selected>Choose...</option>
                                    <?php while ($row = $result->fetch_assoc()) { ?>
                                        <option value="<?php echo $row['id'] ?>" <?php if ($task_row['user_id'] == $row['id']) echo 'selected' ?>><?php echo $row['full_name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-6                                               ">
                            <div class="d-flex flex-column align-items-start">
                                <label for="inputDetails" class="form-label">Task Details</label>
                                <input type="text" class="form-control" id="inputDetails" value=" <?php echo $task_row['task_details'] ?>" name="fdetails" placeholder="Task Details">
                            </div>
                        </div>
                        <div class="col-6                                               ">
                            <div class="d-flex flex-column align-items-start">
                                <input type="hidden" class="form-control" id="project_id" name="project_id" placeholder="Task Details" value="<?php echo $project_id ?>">
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
<?php }
include('../global/footer.php');  ?>