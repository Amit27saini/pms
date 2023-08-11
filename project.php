<?php
include('header&footer/header.php');
include('connection.php');
// include('session.php');
$sql = "SELECT new_projects.id,new_projects.project,new_projects.project_details,new_projects.due_date,project_status.status
FROM new_projects
INNER JOIN project_status
ON new_projects.status_id = project_status.id";
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
                           <?php $count=0?>
                            <?php while ($user = $result->fetch_assoc()) { $count++ ?>
                                <tr class="text-center">
                                    <th scope="row"><?php echo $user['id'] ?></th>
                                    <td><?php echo $user['project'] ?></td>
                                    <td><?php echo $user['project_details'] ?></td>
                                    <td><?php echo $user['due_date'] ?></td>
                                    <?php if( $user['status']== "On-hold"){?>
                                    <td><span class="badge bg-danger"><?php echo $user['status'] ?></td></td>
                                    <?php }?>
                                    <?php if( $user['status']== "On going"){?>
                                    <td><span class="badge bg-warning"><?php echo $user['status'] ?></td></td>
                                    <?php }?>
                                    <?php if( $user['status']== "Completed"){?>
                                    <td><span class="badge bg-success"><?php echo $user['status'] ?></td></td>
                                    <?php }?>
                                    <?php if( $user['status']== "Overdue"){?>
                                    <td><span class="badge bg-primary"><?php echo $user['status'] ?></td></td>
                                    <?php }?>   
                                    
                                    <td>
                                        <button type="button" class="btn btn-success btn-sm"><b>view</b></button>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="edit()"><b>Edit</b></button>
                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleted()"><b>Delete</b></button>
                                    </td>


                                </tr>
                            <?php } echo $_SESSION['projects']= $count; ?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>
<?php include('header&footer/footer.php');  } ?>
<?php if (!isset($_SESSION['login_user'])) {
    header("Location:login.php?1");
}