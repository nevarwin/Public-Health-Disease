<?php
include('./components/head.php');
?>

<!DOCTYPE html>
<html lang="en">

<style>
    body {
        overflow: hidden;
    }

    .background-image {
        position: fixed;
        bottom: 10%;
        right: -5%;
        z-index: -1;
        height: 50%;
        width: 50%;
        background-image: url('./assets/img/medlogo.png');
        background-size: 40%;
        background-position: bottom right;
        background-repeat: no-repeat;
        opacity: 0.3;
    }

    #wrapper {
        position: relative;
        z-index: 2;
    }

    #content-wrapper {
        position: relative;
        z-index: 1;
        overflow-y: auto;
        max-height: 100vh;
    }
</style>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
        include('./components/sidebar.php');
        ?>
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <div class="background-image"></div>
            <!-- Main Content -->
            <div id="content">
                <?php
                include('./components/topbar.php');
                ?>
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->

                    <?php
                    include('./components/patientForm-update.php');
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