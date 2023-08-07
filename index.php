<?php
include('header&footer/header.php');
include('connection.php');
$sql = "SELECT new_projects.id,new_projects.project,new_projects.project_details,new_projects.due_date,project_status.status
FROM new_projects
INNER JOIN project_status
ON new_projects.status_id = project_status.id";
$result = $conn->query($sql);
?>
<?php if (isset($_SESSION['login_user'])) { ?>
    <div class="container">
        <div class="my-3 bg-light p-3">
            <div class="progress">
                <div class="progress-bar" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
            </div>
            <div class="row my-4 ">
                <div class="col-3 border-end">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Project</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <button type="button" class="btn btn-success position-relative">
                                view
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?php if (isset($_SESSION['projects']))
                                        echo $_SESSION['projects'];
                                    ?>
                                </span>
                            </button>
                        </div>
                        <div class="col">
                            <img src="images/projecticon.png" class=" w-50" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-3 border-end">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">User</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <button type="button" class="btn btn-success position-relative">
                                view
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    <?php if (isset($_SESSION['users']))
                                        echo $_SESSION['users'];
                                    ?>
                                </span>
                            </button>
                        </div>
                        <div class="col">
                            <img src="images/usericon.png" class="w-50" alt="">
                        </div>
                    </div>

                </div>
                <div class="col-3 border-end">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">Task</h5>
                            <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                            <!-- <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                            <button type="button" class="btn btn-success">view</button>
                        </div>
                        <div class="col">
                            <img src="images/taskicon.png" class="w-50" alt="">
                        </div>
                    </div>

                </div>
                <div class="col-3">
                    <div class="row">
                        <div class="col-7">
                            <h5 class="card-title">Active User</h5>
                            <div>
                                <h6 class="card-subtitle my-2 px-3 text-primary"><?php if (isset($_SESSION['login_user'])) echo   $_SESSION['login_user'] ?></h6>
                            </div>
                        </div>
                        <div class="col-5">
                            <img src="images/activeicon.png" class="w-50" alt="">
                        </div>

                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class=" border p-2 bg-light text-primary text-center">
                    <h3>
                        My project
                    </h3>
                    <div class="row mt-2">
                        <div class="col">
                            <div>
                                <table class="table  table-hover table-sm align-middle table-responsive  table-light">
                                    <thead class="text-center ">
                                        <tr>

                                            <th scope="col">Project</th>
                                            <th scope="col">Project Details</th>
                                            <th scope="col">Duedate</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <?php while ($user = $result->fetch_assoc()) {?>
                                            <tr class="text-center">
                                                <!-- <th scope="row"><?php echo $user['id'] ?></th> -->
                                                <td><?php echo $user['project'] ?></td>
                                                <td><?php echo $user['project_details'] ?></td>
                                                <td><?php echo $user['due_date'] ?></td>
                                                <?php if ($user['status'] == "On-hold") { ?>
                                                    <td><span class="badge bg-danger"><?php echo $user['status'] ?></td>
                                                    </td>
                                                <?php } ?>
                                                <?php if ($user['status'] == "On going") { ?>
                                                    <td><span class="badge bg-warning"><?php echo $user['status'] ?></td>
                                                    </td>
                                                <?php } ?>
                                                <?php if ($user['status'] == "Completed") { ?>
                                                    <td><span class="badge bg-success"><?php echo $user['status'] ?></td>
                                                    </td>
                                                <?php } ?>
                                                <?php if ($user['status'] == "Overdue") { ?>
                                                    <td><span class="badge bg-primary"><?php echo $user['status'] ?></td>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php }?>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
            <div class="col-6">
                <div class=" p-2  border text-center bg-light text-danger">
                    <h3>
                        Overdue Task
                    </h3>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table  table-hover table-sm align-middle table-light">
                                    <thead class="text-center ">
                                        <tr>
                                            <th scope="col">Overdue</th>
                                            <th scope="col">Deadline</th>
                                            <th scope="col">task</th>
                                            <th scope="col">Employee</th>

                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <tr class="text-center">
                                            <td class="text-warning">1 Day</td>
                                            <td>13/9/2023</td>
                                            <td>Otto</td>
                                            <td>Mark</td>

                                        </tr>
                                        <tr class="text-center">
                                            <td class="text-warning">5 Day</td>
                                            <td>12/8/2023</td>
                                            <td>Thornton</td>
                                            <td>Jacob</td>

                                        </tr>
                                        <tr class="text-center">
                                            <td class="text-danger">10 Day</td>
                                            <td>15/12/2023</td>
                                            <td>Thornton</td>
                                            <td>Jacob</td>

                                        </tr>
                                        <tr class="text-center">
                                            <td class="text-danger">15 Day</td>
                                            <td>15/12/2023</td>
                                            <td>Thornton</td>
                                            <td>Jacob</td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

            <div class="col-6 my-3">
                <div class=" border text-center text-primary  pt-2" style="background-color: white;">
                    <div>
                        <h3>workload</h3>
                        <img src="images/workloadimg.jpg" width="540" alt="">
                    </div>
                </div>

            </div>
            <div class="col-6 pb-3">
                <div class=" p-2  border text-center bg-light text-danger">
                    <h3>
                        Upcoming Deadlines
                    </h3>
                    <div class="row mt-2">
                        <div class="col">
                            <div class="table-responsive">
                                <table class="table  table-hover table-sm align-middle table-light">
                                    <thead class="text-center ">
                                        <tr>
                                            <th scope="col">Employee</th>
                                            <th scope="col">task</th>
                                            <th scope="col">Deadline</th>
                                            <th scope="col">workload</th>

                                        </tr>
                                    </thead>
                                    <tbody class="table-group-divider">
                                        <tr class="text-center">
                                            <td>Mark</td>
                                            <td>Otto</td>
                                            <td>13/9/2023</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-danger" role="progressbar" style="width: 25%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">25%</div>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr class="text-center">
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>13/9/2023</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">50%</div>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr class="text-center">
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>13/9/2023</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100">75%</div>
                                                </div>
                                            </td>

                                        </tr>
                                        <tr class="text-center">
                                            <td>Jacob</td>
                                            <td>Thornton</td>
                                            <td>13/9/2023</td>
                                            <td>
                                                <div class="progress">
                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 100%;" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">100%</div>
                                                </div>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>

                    </div>
                </div>

            </div>


        </div>
    </div>
<?php } else
    header("Loction:login.php"); ?>
<?php include('header&footer/footer.php'); ?>