<?php
session_start();
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Admins</h1>
                        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                    </div>
                    <?php
                    include('./components/message.php');
                    include('./components/createAdminForm.php');

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