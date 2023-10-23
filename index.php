<?php
    require "function.php";
    error_reporting(0);
    session_start();
    
    if(!isset($_SESSION['login'])){
        header("Location: login.php");
    }

    $sql = "SELECT * FROM myfriends ORDER BY id DESC";
    $biodata = query($sql);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="images/logo.png" />
    <link rel="stylesheet" href="src/dist/css/style.min.css">
    <link rel="stylesheet" href="highlights/highlight.min.css" type="text/css">
    <link href="src/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <style>
    .plugin-details {
        display: none;
    }

    .plugin-details-active {
        display: block;
    }
    </style>
    <title>MyFriendsApp - The Best Notes</title>
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6" style="
                    background-image: linear-gradient(
                        rgba(255, 255, 255, 0.8),
                        rgba(255, 255, 255),
                        rgba(255, 255, 255),
                        rgba(252, 109, 183, 0.5)
                    ),url(images/img1.jpg); background-position: center; background-size: cover;">
                    <div class="navbar-brand">
                        <a href="index.php">
                            <b class="logo-icon">
                                <img src="images/logo.png" alt="homepage" width="50%"
                                    style="margin: 45px; padding-top: 150px">
                            </b>
                        </a>
                    </div>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <br><br>
                        <li class="sidebar-item selected">
                            <a class="sidebar-link sidebar-link active" href="index.php" aria-expanded="false">
                                <i data-feather="home" class="feather-icon"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap">
                            <span class="hide-menu">Menu</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" aria-expanded="false" href="myFriends.php">
                                <i data-feather="github" class="feather-icon"></i>
                                <span class="hide-menu">myFriends</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" aria-expanded="false" href="thisDay.php">
                                <i data-feather="feather" class="feather-icon"></i>
                                <span class="hide-menu">thisDay</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" aria-expanded="false" href="myDays.php">
                                <i data-feather="calendar" class="feather-icon"></i>
                                <span class="hide-menu">myDays</span>
                            </a>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap">
                            <span class="hide-menu">User</span>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" aria-expanded="false" href="about.php">
                                <i class="fas fa-address-book"></i>
                                <span class="hide-menu">About</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" aria-expanded="false" href="logout.php">
                                <i data-feather="log-out" class="feather-icon"></i>
                                <span class="hide-menu">Logout</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <div class="page-wrapper position-relative" style="background-image: linear-gradient(
        rgba(255, 255, 255, 0.5),
        rgba(252, 109, 183, 0.5)
        ),url(images/img1.jpg);">
            <div class="page-breadcrumb" style="background-image: linear-gradient(
                rgba(255, 255, 255, 0.8),
                rgba(252, 240, 200, 0.5)
            )">
                <div class="row" style="padding-bottom: 20px;">
                    <div class=" col-7 align-self-center">
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">
                            My Friends
                        </h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.php" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Library</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row mt-4">
                    <?php foreach($biodata as $row) : ?>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header" style="background-color: #5f76e8;">
                                <h4 class="mb-0 text-white"><?= $row['nama']; ?></h4>
                            </div>
                            <div class="card-body" style="height: 350px;">
                                <center><img src="myFriendsPict/<?= $row['foto']; ?>" height="200px"
                                        style="max-width: 200px;">
                                </center><br>
                                <p class="card-text">Alamat : <?= $row['alamat']; ?></p>
                                <p class="card-text">No HP : <?= $row['nohp']; ?></p>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <footer class="footer text-center text-dark mb-0" style="background-image: linear-gradient(
                rgba(180, 100, 120, 0.8),
                rgba(252, 240, 200, 0.5)
            )">
                Copyright &copy; 2022 &nbsp <i> MyFriendsApp</i> &nbsp All Rights Reserved.
            </footer>
        </div>
    </div>
    <script src="src/assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="src/assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="src/assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <script src="src/dist/js/app-style-switcher.js"></script>
    <script src="src/dist/js/feather.min.js"></script>
    <script src="src/assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="src/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="src/dist/js/custom.min.js"></script>
    <script src="src/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="src/dist/js/pages/datatable/datatable-basic.init.js"></script>
    <script src="highlights/highlight.min.js"></script>
    <script>
    hljs.initHighlightingOnLoad();
    </script>
</body>

</html>