<?php

$position = $user_data['positionId'];

$sql = "SELECT * FROM positions WHERE positionId = '$position'";
$result = mysqli_query($con, $sql);
$positionRow = mysqli_fetch_assoc($result);
$positionValue = $positionRow['position'];
?>

<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">
        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-lg-inline d-md-inline d-sm-inline d-xs-inline text-gray-600 small"><?= $positionValue ?></span>
                <div class="topbar-divider d-none d-sm-block"></div>
                <span class="mr-2 d-lg-inline d-md-inline d-sm-inline d-xs-inline text-gray-600 small"><?= $user_data['name']; ?></span>
                <img class="img-profile rounded-circle" src="img/undraw_profile.svg" />
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="adminPage-view.php?id=<?= $user_data['id']; ?>">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="adminPage-updateProfile.php?id=<?= $user_data['id']; ?>">
                    <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                    Update Profile
                </a>
                <?php if ($user_data['positionId'] == 1) { ?>
                    <a class="dropdown-item" href="adminPage-diseaseUpdate.php">
                        <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                        Update Disease
                    </a>
                <?php } ?>
                <a class="dropdown-item" href="adminPage-changePassword.php?id=<?= $user_data['id']; ?>">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logoutmodal.php" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->