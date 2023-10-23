<?php
    require "function.php";
    error_reporting(0);
    session_start();

    if(!isset($_SESSION['login'])){
        header("Location: login.php");
    }

    $id = $_POST['id'];
    if(isset($_POST['more'])){
        $sql = "SELECT * FROM mydays WHERE id = $id";
        $result = mysqli_query($conn, $sql);
        $cek = mysqli_fetch_assoc($result);
        if($cek){
            $pre_id = $cek['id'];
            $pre_tanggal = $cek['tanggal'];
            $pre_waktu = $cek['waktu'];
            $pre_warna = $cek['warna'];
            $pre_judul = $cek['judul'];
            $pre_catatan = $cek['catatan'];
            $pre_foto = $cek['foto'];
        }
    }

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
    <title>MyFriendsApp | | myDays</title>
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
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="index.php" aria-expanded="false">
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
                        <li class="sidebar-item selected">
                            <a class="sidebar-link sidebar-link active" aria-expanded="false" href="myDays.php">
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
                            My Note
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-body">
                                    <form action="myDays.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row">
                                            <div class="col-md-12">
                                                <input type="hidden" name="id" id="id" value="<?= $pre_id; ?>">
                                                <input type="hidden" id="foto" name="foto" value="<?= $pre_foto; ?>">
                                                <div class="form-group">
                                                    <input type="text" class="form-control text-white"
                                                        style="background-color: <?= $pre_warna; ?>;" id="judul"
                                                        name="judul" value="<?= $pre_judul; ?>" required>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="date" class="form-control" id="tanggal"
                                                                name="tanggal" value="<?= $pre_tanggal; ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="time" class="form-control" id="waktu"
                                                                name="waktu" value="<?= $pre_waktu; ?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <center>
                                                            <img src="myNotesPict/<?= $pre_foto; ?>"
                                                                style="max-width: 400px;">
                                                        </center>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" rows="10" id="catatan"
                                                                name="catatan" placeholder="Tulis disini..."
                                                                required><?= $pre_catatan; ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <i class="fas fa-paint-brush ml-5 mt-2"></i>
                                                    <div class="col-md-5 ml-3">
                                                        <div class="form-group">
                                                            <input type="color" class="form-control" id="warna"
                                                                name="warna" value="<?= $pre_warna; ?>">
                                                        </div>
                                                    </div>
                                                    <i class="fas fa-image ml-5 mt-2"></i>
                                                    <div class="col-md-5 ml-3">
                                                        <div class="form-group">
                                                            <input type="file" name="foto" id="foto" name="foto">
                                                        </div>
                                                    </div>
                                                </div><br><br>
                                                <div class="form-actions">
                                                    <div class="text-center">
                                                        <button name="save" type="submit"
                                                            class="btn btn-info">Save</button>
                                                        <button name="delete" type="delete"
                                                            class="btn btn-dark">Delete</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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