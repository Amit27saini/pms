<?php
include('../global/header.php');
if (!isset($_SESSION['login_user'])) {
    header("Location:login.php?1");
}
include('../global/connection.php');
//get project data in table with the help of innner join
$sql = "SELECT new_projects.id,new_projects.project,new_projects.project_details,new_projects.due_date,project_status.status,project_status.color
FROM new_projects
INNER JOIN project_status
ON new_projects.status_id = project_status.id ORDER BY new_projects.id DESC";
$result = $conn->query($sql);

?>
<?php if (isset($_SESSION['login_user'])) { ?>
    <div class="container">

        <div class="mt-3  ">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"><b>Project</b></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <?php
        if (isset($_GET['success']) && $_GET['success'] == 1) { ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong> Successfully updated!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <?php
        if (isset($_GET['deleted']) && $_GET['deleted'] == 1) { ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong> Successfully deleted!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <div id="demo">
            <div class="alert alert-warning alert-dismissible fade show hide" id="alert" role="alert">
                <strong>You pressed OK!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`
        </div>

        <div class="mb-5">
            <div class=" container">
                <div class="row ">
                    <div class="col">
                        <div class="text-end">
                            <form action="add.php">
                                <button type="submit" class="btn btn-hv btn-clr"><b>New Project</b></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <div class="">
                        <table class="table shadow table-hover table-sm align-middle table-responsive ">
                            <thead class="text-center ">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Project</th>
                                    <th scope="col">Project Details</th>
                                    <th scope="col">Duedate</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php $count = 0 ?>
                                <?php while ($user = $result->fetch_assoc()) {
                                    $count++; ?>
                                    <?php $id = $user['id']; ?>
                                    <tr class="text-center">
                                        <th scope="row"><span  class="badge badge-sm bg-secondary " ><?php echo $user['id'] ?></span></th>
                                        
                                        <td><?php echo $user['project'] ?></td>
                                        <td><?php echo $user['project_details'] ?></td>
                                        <td><?php echo $user['due_date'] ?></td>
                                        <td><span class="badge bg-<?php echo $user['color'] ?>"><?php echo $user['status'] ?></td>
                                        <td>
                                            <a type="button" class="btn btn-success btn-sm" href="view.php?id=<?php echo $id ?>"><b>view</b></a>
                                            <a type="button" class="btn btn-primary btn-sm" href="edit.php?id=<?php echo $id ?>"><b>Edit</b></a>
                                            <a type="button" class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $id ?>"><b>Delete</b></a>
                                        </td>
                                    </tr>
                                <?php }
                                echo $_SESSION['projects'] = $count; ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
<?php include('../global/footer.php');
} ?>