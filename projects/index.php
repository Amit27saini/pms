<?php
include('../global/header.php');
if (!isset($_SESSION['login_user'])) {
    header("Location:login.php?1");
}
include('../global/connection.php');
//get project data in table with the help of innner join
// if(isset($_POST['flimit']))
// $limit = $_POST['flimit'];
// else
$limit = 6;

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else
    $page = 1;

echo $offset = ($page - 1) * $limit;

$sql = "SELECT new_projects.id,new_projects.project,new_projects.project_details,new_projects.due_date,project_status.status,project_status.color
FROM new_projects
INNER JOIN project_status
ON new_projects.status_id = project_status.id ORDER BY new_projects.id DESC LIMIt {$offset},{$limit}";
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
                        <div class="text-start">
                            <form method="post">
                                <div class="d-flex row">
                                    <div class="col-2">
                                        <input type="text" class="form-control" id="inputlimit" name="flimit" value="<?php if (isset($_POST['flimit'])) echo $_POST['flimit'];
                                                                                                                        else echo '8' ?>" placeholder="Enter Project Name">
                                    </div>
                                    <div class="px-1 col-5">
                                        <button type="submit" class="btn btn-hv btn-clr"><b> Set Limit</b></button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
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
                                        <th scope="row"><span class="badge badge-sm bg-secondary "><?php echo $user['id'] ?></span></th>

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
                        <!-- pagination -->
                        <?php
                        $query = " SELECT * from new_projects";
                        $pagination = $conn->query($query);
                        $total_record = mysqli_num_rows($pagination);
                        if ($total_record > 0) {
                            $total_record;
                            $total_page = ceil($total_record / $limit);
                            echo '<ul class="pagination">';
                            if ($page > 1) {
                                echo '<li class="page-item">
                                <a class="page-link" href="' . $link . 'projects/index.php?page=' . ($page - 1) . '" tabindex="-1">Previous</a>
                            </li>';
                            }
                            for ($i = 1; $i <= $total_page; $i++) {
                                if ($i ==  $page)
                                    $active = "active";
                                else
                                    $active = "";
                                echo '<li class="page-item ' . $active . '"><a class="page-link" href="' . $link . 'projects/index.php?page=' . $i . '" >' . $i . '</a></li>';
                            }
                            if ($total_page > $page) {
                                echo '<li class="page-item">
                            <a class="page-link" href="' . $link . 'projects/index.php?page=' . ($page + 1) . '" >Next</a>
                             </li>';
                            }

                            echo ' </ul>';
                        } ?>
                    </div>

                </div>

            </div>
        </div>
    </div>
<?php include('../global/footer.php');
} ?>