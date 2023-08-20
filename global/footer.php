<!-- Footer -->
<footer class="text-center text-lg-start nav-color text-muted ">
    <!-- Section: Links  -->
    <section class="pt-1">
        <div class="container text-center text-md-start mt-5">
            <!-- Grid row -->
            <div class="row ">
                <!-- Grid column -->
                <div class="col-md-4 col-lg-4 col-xl-3">
                    <!-- Content -->
                    <div>
                        <img src="<?php echo $link ?>global/images/pmslogo.png" width="150">
                    </div>
                </div>
                <!-- Grid column -->
                <div class="col-md-4 col-lg-2 col-xl-2 mx-auto ">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">
                        Useful links
                    </h6>
                    <p>
                        <a href="index.php" class="text-reset">Project</a>
                    </p>
                    <p>
                        <a href="user.php" class="text-reset">User</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">Task</a>
                    </p>
                    <p>
                        <a href="#!" class="text-reset">List</a>
                    </p>
                </div>
                <!-- Grid column -->

                <!-- Grid column -->
                <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0">
                    <!-- Links -->
                    <h6 class="text-uppercase fw-bold mb-4">Contact</h6>
                    <p><i class="fas fa-home me-3"></i> Panipat,Haryana,132103 India</p>
                    <p>
                        <i class="fas fa-envelope me-3"></i>
                        amitsaini272001@gmail.com
                    </p>
                    <p><i class="fas fa-phone me-3"></i> 9306640205</p>
                    <!-- <p><i class="fas fa-print me-3"></i> + 01 234 567 89</p> -->
                </div>
                <!-- Grid column -->
            </div>
            <!-- Grid row -->
        </div>
    </section>
    <!-- Section: Links  -->

    <!-- Copyright -->
    <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
        © Copyright 2023 | Project Management System
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
<script src="<?php echo $link ?>global/js/script.js"></script>
<script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
</script>
</body>

</html>