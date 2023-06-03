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
                        <div class="col-sm-6 col-md-8 col-lg-12 py2">
                            <?php
                            include('./components/linechart.php')
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
        ?>

        <!-- <script>
            // Get references to the form elements
            var form1 = document.getElementById('form1');
            var form2 = document.getElementById('form2');

            // Attach event listener for Form 1 submission
            form1.addEventListener('submit', function(event) {
                // event.preventDefault(); // Prevent form submission from reloading the page

                // Handle Form 1 submission logic
                // ...

                // Optionally, you can reset the form after submission
            });

            // Attach event listener for Form 2 submission
            form2.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent form submission from reloading the page

                // Handle Form 2 submission logic
                // ...

                // Optionally, you can reset the form after submission
            });
        </script> -->