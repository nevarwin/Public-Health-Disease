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
                    <div class="row justify-content-center">
                        <div class="col-md-12 col-lg-12 py-2 ">
                            <?php
                            include('./components/controllers/piechart.php')
                            ?>
                        </div>
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