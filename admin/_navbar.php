<?php require_once "auth.php";
$username = $_SESSION["username"];
?>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-success">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="index.php">Yönetim Paneli</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Notifications (or any other content)-->
    <div class="d-none d-md-inline-block ms-auto me-0 me-md-3 my-2 my-md-0">
        <button class="btn btn-info btn-sm me-2"><i class="fas fa-bell"></i></button>
        <button class="btn btn-primary btn-sm"><i class="fas fa-envelope"></i></button>
    </div>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item d-flex align-items-center">
            <span class="navbar-text me-3"><?php echo $username?></span>
            <a class="btn btn-danger btn-sm" href="../adminLogin/logout.php">Logout</a>
        </li>
    </ul>
</nav><div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark bg-successW" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <!-- Core Section -->
                    <div class="sb-sidenav-menu-heading">Core</div>
                    <a class="nav-link" href="index.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-calendar-day"></i></div>
                        <span>Randevular</span>
                    </a>
                    <a class="nav-link" href="admins.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                        <span>Adminler</span>
                    </a>
                    <a class="nav-link" href="priceList.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tag"></i></div>
                        <span>Fiyat Listesi</span>
                    </a>
                    <a class="nav-link" href="contact.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                        <span>İletişim Bilgileri</span>
                    </a>
                    <a class="nav-link" href="services.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-concierge-bell"></i></div>
                        <span>Servisler</span>
                    </a>
                    <a class="nav-link" href="personal.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                        <span>Berberlerimiz</span>
                    </a>
                    
                    <!-- Additional Pages Section -->
                    <div class="sb-sidenav-menu-heading">Additional Pages</div>
                    <a class="nav-link" href="401.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-exclamation-circle"></i></div>
                        <span>401 Page</span>
                    </a>
                    <a class="nav-link" href="404.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-search"></i></div>
                        <span>404 Page</span>
                    </a>
                    <a class="nav-link" href="500.html">
                        <div class="sb-nav-link-icon"><i class="fas fa-database"></i></div>
                        <span>500 Page</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>
</div>