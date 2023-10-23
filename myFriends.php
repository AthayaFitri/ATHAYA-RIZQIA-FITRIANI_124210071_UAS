<?php
    require "function.php";
    error_reporting(0);
    session_start();
    
    if(!isset($_SESSION['login'])){
        header("Location: login.php");
    }

    $sql = "SELECT * FROM myfriends ORDER BY id DESC";
    $biodata = query($sql);

    if(isset($_POST['submit'])){
        if($_GET['page'] === 'edit'){
            if(editFriend($_POST) > 0){
                echo "<script> alert('Data Berhasil Diedit !'); document.location.href = 'myFriends.php'; </script>";
            }else{
                echo "<script> alert('Data Gagal Diedit !'); document.location.href = 'myFriends.php'; </script>";
            }
        }else{
            if(insertFriend($_POST) > 0){
                echo "<script> alert('Data Berhasil Ditambahkan !'); document.location.href = 'myFriends.php'; </script>";
            }else{
                echo "<script> alert('Data Gagal Ditambahkan !'); document.location.href = 'myFriends.php'; </script>";
            }
        }
    }
    if(isset($_GET['page'])){
        $id = $_GET['id'];
        if($_GET['page'] === 'hapus'){
            if(deleteFriend($id) > 0){
                echo "<script> alert('Data Berhasil Dihapus !'); document.location.href = 'myFriends.php'; </script>";
            }else{
                echo "<script> alert('Data Gagal Dihapus !'); document.location.href = 'myFriends.php'; </script>";
            }
        }
        if($_GET['page'] === 'edit'){
            $query = "SELECT * FROM myfriends WHERE id = $id";
            $result = mysqli_query($conn, $query);
            $cek = mysqli_fetch_assoc($result);

            if($cek){
                $pre_id = $cek['id'];
                $pre_nama = $cek['nama'];
                $pre_nohp = $cek['nohp'];
                $pre_alamat = $cek['alamat'];
                $pre_foto = $cek['foto'];
            }
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
    <title>MyFriendsApp | | myFriends</title>
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
                        <li class="sidebar-item selected">
                            <a class="sidebar-link sidebar-link active" aria-expanded="false" href="myFriends.php">
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
                            Form Input Biodata
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
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">My Friends</h4><br>
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="form-body">
                                        <input type="hidden" id="id" name="id" value="<?= $pre_id; ?>">
                                        <input type="hidden" id="foto" name="foto" value="<?= $pre_foto; ?>">
                                        <div class="form-group row">
                                            <i data-feather="user" class="feather-icon ml-3"></i>
                                            <label for="nama" class="col-md-2">Nama Lengkap</label>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="nama" name="nama"
                                                        value="<?= $pre_nama; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <i data-feather="phone" class="feather-icon ml-3"></i>
                                            <label for="nohp" class="col-md-2">Nomor Telepon</label>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="text" maxlength="13" placeholder="08**. . ."
                                                        class="form-control" id="nohp" name="nohp"
                                                        value="<?= $pre_nohp; ?>" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <i data-feather="home" class="feather-icon ml-3"></i>
                                            <label for="alamat" class="col-md-2">Alamat</label>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <textarea class="form-control" rows="3" id="alamat" name="alamat"
                                                        required><?= $pre_alamat; ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <i data-feather="image" class="feather-icon ml-3"></i>
                                            <label for="foto" class="col-md-2">Foto</label>
                                            <?php
                                            if($_GET['page'] === 'edit'){ ?>
                                            <div class="col-md-2">
                                                <img src="myFriendsPict/<?= $pre_foto; ?>" width="100">
                                            </div>
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <input type="file" name="foto" id="foto" name="foto">
                                                </div>
                                            </div>
                                            <?php }else{ ?>
                                            <div class="col-md-9">
                                                <div class="form-group">
                                                    <input type="file" name="foto" id="foto" name="foto">
                                                </div>
                                            </div>
                                            <?php } ?>
                                        </div>
                                    </div><br><br>
                                    <div class="form-actions">
                                        <div class="text-center">
                                            <button name="submit" type="submit" class="btn btn-info">Submit</button>
                                            <button type="reset" class="btn btn-dark">Reset</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Biodata</h4><br>
                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered no-wrap">
                                        <thead>
                                            <tr>
                                                <th>Nama</th>
                                                <th>No Telepon</th>
                                                <th>Alamat</th>
                                                <th>Foto</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach($biodata as $row) : ?>
                                            <tr>
                                                <td><?= $row['nama']; ?></td>
                                                <td><?= $row['nohp']; ?></td>
                                                <td><?= $row['alamat']; ?></td>
                                                <td><img src="myFriendsPict/<?= $row['foto']; ?>" width="100"></td>
                                                <td>
                                                    <a href="myFriends.php?page=edit&id=<?= $row['id']; ?>"
                                                        class="btn btn-outline-danger">
                                                        <i class="fa fa-pencil-alt"></i> Edit
                                                    </a>
                                                    <a href="myFriends.php?page=hapus&id=<?= $row['id']; ?>"
                                                        class="btn btn-outline-dark">
                                                        <i class="fa fa-trash"></i> Hapus
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
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