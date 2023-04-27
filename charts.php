<?php
include('./components/head.php');
?>

<!DOCTYPE html>
<html lang="en">

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
        include('./components/sidebar.php');
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <?php
                include('./components/topbar.php');
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="row">
                        <!-- Example single danger button -->
                        <div class="btn-group col-xl-1 col-lg-5 mb-2">
                            <div class="dropdown">
                                <button type="button" class="btn btn-primary dropdown-toggle mr-2" data-bs-toggle="dropdown" aria-expanded="false">
                                    Disease
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    <li><a class="dropdown-item" href="#">Separated link</a></li>
                                </ul>
                            </div>
                            <div class="dropdown">
                                <button type="button" class="btn btn-secondary dropdown-toggle mr-4" data-bs-toggle="dropdown" aria-expanded="false">
                                    Year
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="#">Action</a></li>
                                    <li><a class="dropdown-item" href="#">Another action</a></li>
                                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <?php
                        include('./components/linechart.php');
                        include('./components/piechart.php');

                        ?>
                    </div>

                    <?php
                    ?>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <?php
            include('./components/footer.php');
            ?>
        </div>
        <!-- End of Content Wrapper -->
    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php
    include('./components/logoutmodal.php');
    include('./components/script.php');
    ?>