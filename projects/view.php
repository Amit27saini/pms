<?php
include('../global/header.php');
if (!isset($_SESSION['login_user'])) {
    header("Location:login.php?1");
}
include('../global/connection.php');
// pagination
//get project data in table with the help of innner join
// if(isset($_POST['flimit']))
// $limit = $_POST['flimit'];
// else
$limit = 3;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else
    $page = 1;

echo $offset = ($page - 1) * $limit;
// get project data by id 
if (isset($_GET['id'])) {
    $project_id = $_GET['id'];
    $psql = "SELECT new_projects.id,new_projects.project,new_projects.project_details,new_projects.due_date, new_projects.description ,project_status.status,project_status.color
     FROM new_projects
     INNER JOIN project_status
     ON new_projects.status_id = project_status.id where new_projects.id='$project_id'";
    $presult = $conn->query($psql);
    $project = $presult->fetch_assoc();
}
// get users name  and id 
$sql = "SELECT id,full_name FROM users";
$result = $conn->query($sql);
// get tasks table data
$task_sql = "SELECT tasks.id,tasks.name,tasks.task_details,users.full_name
     FROM tasks
     INNER JOIN users
     ON tasks.user_id = users.id where tasks.project_id='$project_id' LIMIt {$offset},{$limit} ";
$tresult = $conn->query($task_sql);
?>
<div class=" container">
    <!-- breadcrumb -->
    <div class="mt-3  ">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="index.php" class="text-decoration-none "><b>Project</b></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><b>View</b></li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <!-- project  task form -->
    <div class=" container">
        <div class="row ">
            <div class="col">
                <div class="text-end">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-hv btn-clr" data-bs-toggle="modal" data-bs-target="#addModal">
                        Add Task
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Add Task</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="task.php" method="post" class="row g-3">
                                        <div class="col-md-6">
                                            <div class="d-flex flex-column align-items-start">
                                                <label for="inputtask" class="form-label">Task</label>
                                                <input type="text" class="form-control" id="inputtask" name="ftask" placeholder="Enter Task Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex flex-column align-items-start">
                                                <label for="inputuser" class="form-label">Assign to</label>
                                                <select id="inputuser" name="fuser" class="form-select">
                                                    <option selected>Choose...</option>
                                                    <?php while ($row = $result->fetch_assoc()) { ?>
                                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['full_name'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-6                                               ">
                                            <div class="d-flex flex-column align-items-start">
                                                <label for="inputDetails" class="form-label">Task Details</label>
                                                <input type="text" class="form-control" id="inputDetails" name="fdetails" placeholder="Task Details">
                                            </div>
                                        </div>
                                        <div class="col-6                                               ">
                                            <div class="d-flex flex-column align-items-start">
                                                <input type="hidden" class="form-control" id="project_id" name="project_id" placeholder="Task Details" value="<?php echo $project_id ?>">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- Modal -->

                </div>
            </div>
        </div>
    </div>
    <!-- Project view card -->
    <div class="row">
        <div class="col">
            <div class="row my-3">
                <div class=" col-5">
                    <div class="card ">
                        <div class="card-header text-info-emphasis">
                            <h5 class="badge badge-sm bg-danger " data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Project Id"><?php echo $project['id'] ?>
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="badge badge-sm bg-danger " data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="Duedate">
                                        <?php echo $project['due_date'] ?>
                                    </h5>
                                </div>

                                <div class="col text-end">

                                    <h5 class="badge badge-sm bg-<?php echo $project['color'] ?> " data-bs-toggle="tooltip" data-bs-placement="top" data-bs-custom-class="custom-tooltip" data-bs-title="status"><?php echo $project['status'] ?></h5>
                                </div>
                            </div>

                            <div class="d-flex ">
                                <h4 class="card-title">Project:</h4>
                                <h5 class="card-title px-3 pt-1"><?php echo $project['project'] ?></h5>
                            </div>
                            <div class="text-left">
                                <h5 class="card-title "><?php echo $project['project_details'] ?></h5>
                            </div>
                            <div class="text-left">
                                <p class="card-title"><?php echo $project['description'] ?></p>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- task table -->
                <div class=" col-7">
                    <table class="table shadow table-hover table-sm align-middle table-responsive">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Id</th>
                                <th scope="col">Task</th>
                                <th scope="col">Task Details</th>
                                <th scope="col">Assigned To </th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-group-divider text-center">
                            <?php while ($task = $tresult->fetch_assoc()) {
                                $task_id = $task['id']; ?>
                                <tr>
                                    <td><span class="badge badge-sm bg-secondary "><?php echo $task['id'] ?></span></td>
                                    <td><?php echo $task['name'] ?></td>
                                    <td><?php echo $task['task_details'] ?></td>
                                    <td><?php echo $task['full_name'] ?></td>
                                    <td>
                                        <!-- <a type="button" class="btn btn-success btn-sm" href="view.php?task-id="><b>Mark</b></a> -->
                                        <a type="button" class="btn btn-primary btn-sm" href="task-edit.php?task-id=<?php echo $task_id  ?>&project-id=<?php echo $project_id ?>"><b>Edit</b></a>
                                        <a type="button" class="btn btn-danger btn-sm" href="delete-task.php?task-id=<?php echo $task_id  ?>&project-id=<?php echo $project_id ?>"><b>Delete</b></a>
                                    </td>

                                </tr>
                            <?php } ?>


                        </tbody>
                    </table>
                    <!-- pagination -->
                    <?php
                    $query = " SELECT * from users";
                    $pagination = $conn->query($query);
                    $total_record = mysqli_num_rows($pagination);
                    if ($total_record > 0) {
                        $total_record;
                        $total_page = ceil($total_record / $limit);
                        echo '<ul class="pagination">';
                        if ($page > 1) {
                            echo '<li class="page-item">
                                <a class="page-link" href="' . $link . 'projects/view.php?page=' . ($page - 1) .' & id='.$project_id.'" tabindex="-1">Previous</a>
                            </li>';
                        }
                        for ($i = 1; $i <= $total_page; $i++) {
                            if ($i ==  $page)
                                $active = "active";
                            else
                                $active = "";
                            echo '<li class="page-item ' . $active . '"><a class="page-link" href="' . $link . 'projects/view.php?page=' . $i . '& id=' .  $project_id  . ' " >' . $i . '</a></li>';
                        }
                        if ($total_page > $page) {
                            echo '<li class="page-item">
                            <a class="page-link" href="' . $link . 'projects/view.php?page=' . ($page + 1) . ' & id=' . $project_id .' " >Next</a>
                             </li>';
                        }

                        echo ' </ul>';
                    } ?>
                </div>
            </div>
            <!-- task table -->


        </div>
    </div>

</div>




<?php include('../global/footer.php');
?>