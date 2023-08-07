<?php
include('header&footer/header.php');
include('connection.php');
// include('session.php');
$sql = "SELECT * FROM project_status";
$result=$conn->query($sql);
?>
<div class="container">
    <div class="mt-4  py-1">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item "><a href="project.php" class="text-decoration-none"><b>Project</b></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><b>Add Project</b></li>
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
                    <h2> Add New Project</h2>
                </div>

                <form action="insert.php" method="post" class="row g-3">
                    <div class="col-md-6">
                        <label for="inputtext" class="form-label">Project</label>
                        <input type="text" class="form-control" id="inputproject" name="fproject" placeholder="Enter Project Name">
                    </div>
                    
                    <div class="col-6">
                        <label for="inputAddress" class="form-label">Project Details</label>
                        <input type="text" class="form-control" id="inputAddress" name="fdetails" placeholder="Project Details">
                    </div>

                    <div class="col-md-6">
                        <label for="inputedate" class="form-label">Due Date</label>
                        <input type="date" class="form-control" name="duedate" id="duedate">
                    </div>
                    <div class="col-md-6">
                        <label for="inputStatus" class="form-label">status</label>
                        <select id="inputStatus" name="fstatus" class="form-select">
                            <option selected>Choose...</option>
                            <?php while($row=$result->fetch_assoc()) { ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['status'] ?></option>
                             <?php } ?>
                        </select>
                    </div>

                    <div class="col-md-12">
                        <label for="Details" class="form-label">Description</label>
                        <textarea type="text" class="form-control" id="inputDetails" name="fdes" placeholder="Description"></textarea>
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
                        <button type="submit" id="pjtbtn" class="btn btn-clr btn-hv" >Add</button>

                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
<?php include('header&footer/footer.php'); ?>