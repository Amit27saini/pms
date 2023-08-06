<?php 
include('header&footer/header.php');
?>
<div class="container">

<div class="mt-3  ">
    <div class="row">
        <div class="col">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page"><b>Task</b></li>
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
                    <form action="#">
                        <button type="button" class="btn btn-hv btn-clr" onclick="add()"><b>Create Task</b></button>
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
                           <th scope="col">id</th>
                            <th scope="col">Assign Date</th>
                            <th scope="col">Due Date</th>
                            <th scope="col">Name</th>
                            <th scope="col">Assigned To</th>
                            <th scope="col">status</th>
                            <th scope="col">Completed  By</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        <tr class="text-center">
                            <th scope="row">1</th>
                            <td>13/8/2023</td>
                            <td>13/9/2023</td>
                            <td>Otto</td>
                            <td>Mark</td>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>
                                <button type="button" class="btn btn-primary"
                                    onclick="edit()"><b>Edit</b></button>

                                <button type="button" class="btn btn-danger"
                                    onclick="deleted()"><b>Delete</b></button>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <th scope="row">2</th>
                            <td>12/7/2023</td>
                            <td>12/8/2023</td>
                            <td>Thornton</td>
                            <td>Jacob</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>
                                <button type="button" class="btn btn-primary"
                                    onclick="edit()"><b>Edit</b></button>

                                <button type="button" class="btn btn-danger"
                                    onclick="deleted()"><b>Delete</b></button>
                            </td>
                        </tr>
                        <tr class="text-center">
                            <th scope="row">3</th>
                            <td>15/10/2023</td>
                            <td>15/12/2023</td>
                            <td>Thornton</td>
                            <td>Jacob</td>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>
                                <button type="button" class="btn btn-primary"
                                    onclick="edit()"><b>Edit</b></button>

                                <button type="button" class="btn btn-danger"
                                    onclick="deleted()"><b>Delete</b></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</div>
</div>
<?php include('header&footer/footer.php');?>