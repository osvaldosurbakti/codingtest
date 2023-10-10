        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('employeedata'); ?>">
                <div class="sidebar-brand-icon ">
                    <img src="\img\transindo.png" alt="Company Logo" width="100">
                </div>
                <div class="sidebar-brand-text mx-3">Admin <sup></sup></div>
            </a>


            <?php if (in_groups('admin')) { ?>
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    MANAJEMEN BANK SAMPAH
                </div>

                <!-- Nav Item - Profile -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('sampahdata'); ?>">
                        <i class="fas fa-user"></i>
                        <span>DATA BANK SAMPAH</span></a>
                </li>
            <?php } ?>


            <?php if (!in_groups('admin')) { ?>
                <!-- Divider -->
                <hr class="sidebar-divider">

                <!-- Heading -->
                <div class="sidebar-heading">
                    User Profile
                </div>

                <!-- Nav Item - Profile -->
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('user'); ?>">
                        <i class="fas fa-user"></i>
                        <span>Profile</span>
                    </a>
                </li>
            <?php } ?>


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Logout -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('logout'); ?>">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->