<?php require "auth.php";?>
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <a class="navbar-brand ps-3" href="index.php">MyAdmin</a>
    <form class="form-inline mx-auto">
        <input class="form-control form-control-lg" type="search" placeholder="Search..." aria-label="Search">
        <button class="btn btn-outline-light btn-lg" type="submit"><i class="fas fa-search"></i></button>
    </form>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle fa-lg"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">Profile</a>
                <a class="dropdown-item" href="#">Settings</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link active" href="dashboard.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-home"></i></div>
                    Dashboard
                </a>
                <a class="nav-link" href="randevular.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-calendar-alt"></i></div>
                    Randevular
                </a>
                <a class="nav-link" href="index.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Adminler
                </a>
                <a class="nav-link" href="priceList.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-dollar-sign"></i></div>
                    Fiyat Listesi
                </a>
                <a class="nav-link" href="contact.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                    İletişim
                </a>
                <a class="nav-link" href="services.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                    Servisler
                </a>
                <a class="nav-link" href="personal.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-tie"></i></div>
                    Berberlerimiz
                </a>
                <div class="sb-sidenav-menu-heading">Settings</div>
                <a class="nav-link" href="settings.php">
                    <div class="sb-nav-link-icon"><i class="fas fa-cog"></i></div>
                    General Settings
                </a>
            </div>
        </div>
    </nav>
</div>
