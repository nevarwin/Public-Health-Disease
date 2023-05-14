<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="homepage.php">
        <div class="sidebar-brand-icon rotate-n-15">
            <!-- <i class="fas fa-laugh-wink"></i> -->
        </div>
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-1">Public Health Disease Geomapping</div>
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
        <a class="nav-link" href="http://localhost/admin2gh/charts.php">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="http://localhost/admin2gh/map.php">
            <i class="fas fa-fw fa-map"></i>
            <span>Map</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->