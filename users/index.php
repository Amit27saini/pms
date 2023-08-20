
<?php
include('../global/header.php');
if (!isset($_SESSION['login_user'])) {
    header("Location: http://localhost/pms/login.php?1");
}
include('../global/connection.php');
// include('session.php');
$sql = "SELECT users.id,users.full_name,users.email,users.user_type_id,gender.type, users_types.name
FROM users
INNER JOIN users_types
ON users.user_type_id = users_types.id
 INNER JOIN gender
 ON users.gender_id = gender.id ORDER BY users.id DESC ";
$result = $conn->query($sql);
?>
<?php if (isset($_SESSION['login_user'])) { ?>
    <div class="container">

        <div class="mt-3  ">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page"><b>User</b></li>
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

        <div class="mb-5">
            <div class=" container">
                <div class="row ">
                    <div class="col">
                        <div class="text-end">
                            <form action=" add.php">
                                <button type="submit" class="btn btn-hv btn-clr"><b>New User</b></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mt-2">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table shadow table-hover table-sm align-middle">
                            <thead class="text-center ">
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Full Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">User Type</th>
                                    <th scope="col">Gender</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody class="table-group-divider">
                                <?php $count = 0 ?>
                                <?php while ($user = $result->fetch_assoc()) { 
                                    $count++; $id=$user['id'] ?>
                                    <tr class="text-center">
                                        <th scope="row"><span  class="badge badge-sm bg-secondary " ><?php echo $user['id'] ?></span></th>
                                        <td><?php echo $user['full_name'] ?></td>
                                        <td><?php echo $user['email'] ?></td>
                                        <td><?php echo $user['name'] ?></td>
                                        <td><?php echo $user['type'] ?></td>
                                        <td>
                                            <a type="button" class="btn btn-primary btn-sm" href="edit.php?id=<?php echo $id ?>"><b>Edit</b></a>

                                            <a type="button" class="btn btn-danger btn-sm" href="delete.php?id=<?php echo $id ?>"><b>Delete</b></a>
                                        </td>
                                    </tr>
                                <?php }
                                echo $_SESSION['users'] = $count ?>
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php } include('../global/footer.php'); ?>
   