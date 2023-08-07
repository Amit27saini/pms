<?php
include('header&footer/header.php');
include('connection.php');
// include('session.php');
$sql = "SELECT users.id,users.full_name,users.email,users.user_type_id,gender.type, users_types.name
FROM users
INNER JOIN users_types
ON users.user_type_id = users_types.id
 INNER JOIN gender
 ON users.gender_id = gender.id ";
$result = $conn->query($sql);
?>
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
                        <form action="add_user.php">
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
                            <?php $count=0?>
                            <?php while ($user = $result->fetch_assoc()) { $count++ ?>
                                <tr class="text-center">
                                    <th scope="row"><?php echo $user['id'] ?></th>
                                    <td><?php echo $user['full_name'] ?></td>
                                    <td><?php echo $user['email'] ?></td>
                                    <td><?php echo $user['name'] ?></td>
                                    <td><?php echo $user['type'] ?></td>
                                    <td>
                                        <button type="button" class="btn btn-primary btn-sm" onclick="edit()"><b>Edit</b></button>

                                        <button type="button" class="btn btn-danger btn-sm" onclick="deleted()"><b>Delete</b></button>
                                    </td>
                                </tr>
                            <?php } echo $_SESSION['users']=$count?>
                        </tbody>
                    </table>
                </div>

            </div>

        </div>
    </div>
</div>

<?php include('header&footer/footer.php'); ?>