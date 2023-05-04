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
                    <!-- Page Heading -->
                    <div class="card-header py-3">
                        <div class="row">
                            <h2 class="m-0 font-weight-bold text-primary">
                                View Patient's Data
                            </h2>
                            <a href="http://localhost/admin2gh/patientTable.php" class="btn btn-primary" role="button">Back</a>
                        </div>
                    </div>
                    <?php
                    include('./components/patientForm-view.php');
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