<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="homepage.php">
        <div class="sidebar-brand-icon">
            <img src="./assets/img/caviteLogo.png" alt="Logo" style="height:50px; width:50px;">
        </div>
        <div class="sidebar-brand-text ">Cavite Disease Mapping</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard
    <li class="nav-item active">
        <a class="nav-link" href="/admin2gh/homepage.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li> -->
    <?php
    if ($user_data['positionId'] == 1) {
    ?>
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/admin2gh/logsTable.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Logs Tables</span></a>
        </li>
    <?php
    }
    ?>

    <?php
    if ($user_data['positionId'] != 3) {
    ?>
        <!-- Nav Item - Tables -->
        <li class="nav-item">
            <a class="nav-link" href="http://localhost/admin2gh/adminTable.php">
                <i class="fas fa-fw fa-table"></i>
                <span>Admin Tables</span></a>
        </li>
    <?php
    }
    ?>


    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="http://localhost/admin2gh/patientTable.php">
            <i class="fas fa-fw fa-table"></i>
            <span>Patient Tables</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="http://localhost/admin2gh/lineChartPage.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Yearly disease count line chart</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="http://localhost/admin2gh/pieChartPage.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Disease cases per municipality pie chart</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="http://localhost/admin2gh/ageLineChartPage.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Yearly age distribution per disease line chart</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="http://localhost/admin2gh/map.php">
            <i class="fas fa-fw fa-map"></i>
            <span>Heatmap per disease</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->