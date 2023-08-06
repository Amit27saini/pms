<?php
include('header&footer/header.php');
include('connection.php');
include('session.php');
?>
<div class="container">


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
                <strong><?php  echo "Error: " . "<br>" . $conn->error;?></strong> 
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php } ?>
        <div class="row justify-content-center my-5">
            <div class="col-6 form-clr p-4 my-3">
                <div class=" p-1 text-center">
                    <h2> Login Form</h2>
                </div>

                <form action="#" method="post" class="row g-3">
                    <div class="col-12">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email">
                    </div>
                    <div class="col-12">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                    </div>
                   
                    <div class="col-12 text-center">
                        <button type="submit"  id="pjtbtn" class="btn btn-clr btn-hv px-4" ><b>Login</b></button>
                        
                    </div>
                </form>

            </div>
        </div>
    </div>

</div>
<?php include('header&footer/footer.php'); ?>