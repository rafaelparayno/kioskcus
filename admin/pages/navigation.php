<?php
?>
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Montessori</a><button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href=""><i class="fas fa-bars"></i></button><!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ml-auto ml-md-0">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">

                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="logout.php">Logout</a>
            </div>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <a class="nav-link" href="./dashboard.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>
                    <div class="sb-sidenav-menu-heading">Core</div>

                    <a class="nav-link" href="./users.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                        Users
                    </a>
                    <a class="nav-link" href="./course.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Containers
                    </a>
                    <a class="nav-link" href="./strands.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Precaution
                    </a>
                    <a class="nav-link" href="./subjects.php">
                        <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                        Videos
                    </a>

                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small">Logged in as:</div>

            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">