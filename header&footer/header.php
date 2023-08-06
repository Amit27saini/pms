<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project management system</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">

</head>
<?php

$url =  $_SERVER['REQUEST_URI'];
?>

<body>
    <div class="sticky-top">
        <nav class="navbar navbar-expand-lg nav-color ">
            <div class="container">
                <!-- <a class="navbar-brand" href="#">Navbar</a> -->
                <a class="navbar-brand" href="#"><img src="images/pmslogo.png" alt="" width="70"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link px-3 text-dark <?php if ($url == '/pms/index.php') echo 'activeclr'; ?>" aria-current="page" href="index.php">Dashborad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 text-dark <?php if ($url == '/pms/project.php') echo 'activeclr'; ?>" aria-current="page" href="project.php">Project</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 text-dark <?php if ($url == '/pms/user.php') echo 'activeclr'; ?>" href="user.php">User</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link px-3 text-dark <?php if ($url == '/pms/task.php') echo 'activeclr'; ?>" href="task.php">Task</a>
                        </li>
                    </ul>
                    <ul>
                        <form  action="login.php">
                            <button type="submit" class="btn btn-primary btn-sm">Login</button>

                        </form>
                    </ul>
                </div>
            </div>
        </nav>

    </div>