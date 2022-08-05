<?php 
session_start();
	include 'koneksi.php';

//   supaya gabisa langsung akses ke dashboard sebelum login
	if($_SESSION['stat_login'] != true){
		echo '<script>window.location="index.php"</script>';
	}
    $tampil    =mysqli_query($conn, "SELECT * FROM login_admin WHERE id_admin=id_admin");
    $tmp = mysqli_fetch_object($tampil);

    $pegawai = mysqli_query($conn, "SELECT * FROM pegawai, bagian WHERE id_pegawai = '".$_GET['id']."' AND pegawai.id_bagian=bagian.id_bagian");
    $p =mysqli_fetch_object($pegawai);
   
 ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard | Update Pegawai</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
                <div class="sidebar-brand-icon">
                    <i class="fas fa-clinic-medical"></i>

                </div>
                <div class="sidebar-brand-text mx-2 ">SIMPEG</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-hospital-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item active">
                <a class="nav-link" href="data-pegawai.php">
                    <i class="fas fa-fw fa-user-nurse"></i>
                    <span>Pegawai</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="data-bagian.php">
                    <i class="fas fa-fw fa-user-nurse"></i>
                    <span>Bagian</span></a>
            </li>
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Aksi
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link" href="insert-pegawai.php">
                    <i class="fas fa-fw fa-user-nurse"></i>
                    <span>Tambah Pegawai</span></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" href="insert-bagian.php">
                    <i class="fas fa-fw fa-user-nurse"></i>
                    <span>Tambah Bagian</span></a>
            </li>
            <hr class="sidebar-divider">

            <div class="sidebar-heading">
                Loggig
            </div>

            <!-- Nav Item - Pages Collapse Menu -->

            <li class="nav-item">
                <a class="nav-link" href="log-update.php">
                    <i class="fa fa-clipboard-list"></i>
                    <span>Log Update</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $tmp->nama_admin?></span>
                                <img class="img-profile rounded-circle" src="images/undraw_profile.svg">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="logout.php">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-sm align-items-center justify-content-between mb-4">
                                <h4 class="m-0 font-weight-bold text-primary">Edit Data Pegawai</h4>
                                <div class="table-responsive">
                                </div>
                            </div>

                            <form action="save-update-pegawai.php" method="post">

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                                        <tr>
                    <td>ID Pegawai</td>
                    <td>:</td>
                    <td><input type="text" name="id_pegawai" class="form-control" value="<?php echo $p->id_pegawai ?>" readonly></td>
                </tr>
                    <tr>
                        <td>Tanggal Daftar</td>
                        <td>:</td>
                        <td><input type="date" name="tgl_daftar" class="form-control" value="<?php echo $p->tgl_daftar ?>" readonly></td>
                    </tr>
                    <tr>
                        <td>Nama Lengkap</td>
                        <td>:</td>
                        <td><input type="text" name="nm_pegawai" class="form-control" value="<?php echo $p->nm_pegawai ?>" required></td>
                    </tr>
                    <tr>
                        <td>Tempat Lahir</td>
                        <td>:</td>
                        <td><input type="text" name="tmp_lahir" class="form-control" value="<?php echo $p->tmp_lahir ?>" required></td>
                    </tr>
                    <tr>
                        <td>Tanggal Lahir</td>
                        <td>:</td>
                        <td><input type="date" name="tgl_lahir" class="form-control" value="<?php echo $p->tgl_lahir ?>" required></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td>
                            <select class="form-control" name="jk" required>
                                <option value="<?php echo $p->jk ?>"><?php echo $p->jk ?></option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Agama</td>
                        <td>:</td>
                        <td>
                            <select class="form-control" name="agama" required>
                                <option value="<?php echo $p->agama ?>"><?php echo $p->agama ?></option>
                                <option value="Islam">Islam</option>
                                <option value="Kristen">Kristen</option>
                                <option value="Katholik">Katholik</option>
                                <option value="Hindu">Hindu</option>
                                <option value="Budha">Budha</option>
                                <option value="Kong Hu Cu">Kong Hu Cu</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Telephone</td>
                        <td>:</td>
                        <td><input type="text" name="telp" class="form-control" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" placeholder="Telephone   Ex: 062-777-2960" value="<?php echo $p->telp ?>" required></td>
                    </tr>
                    <tr>
                        <td>Alamat Lengkap</td>
                        <td>:</td>
                        <td>
                            <textarea name="almt_pegawai" class="form-control" required><?php echo $p->almt_pegawai ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Bagian
                        </td>
                        <td>:</td>
                        <td>
                            <select name="id_bagian" class="form-control" required>
                                
                            <?php
                                $bagian = mysqli_query($conn, "SELECT * FROM bagian");
                            echo "<option value='" . $p->id_bagian . "'>" . $p->nama_bagian . "</option>";
                            while ($bgn = mysqli_fetch_array($bagian)) {
                                echo "<option value='" . $bgn['id_bagian'] . "'>" . $bgn['nama_bagian'] . "</option>";
                            }
                            ?>
                        </select>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td><input type="submit" name="submit" class="btn btn-success" value="Simpan"></td>
                    </tr>
                                    </table>
                    </div>
                </div>
            </div>
            <!-- End of Main Content -->
        </div>
        <!-- End of Content Wrapper -->
    </div>

                <!-- Scroll to Top Button-->
                <a class="scroll-to-top rounded" href="#page-top">
                    <i class="fas fa-angle-up"></i>
                </a>

                <!-- Bootstrap core JavaScript-->
                <script src="vendor/jquery/jquery.min.js"></script>
                <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

                <!-- Core plugin JavaScript-->
                <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

                <!-- Custom scripts for all pages-->
                <script src="js/sb-admin-2.min.js"></script>

                <!-- Page level plugins -->
                <script src="vendor/chart.js/Chart.min.js"></script>

                <!-- Page level custom scripts -->
                <script src="js/demo/chart-area-demo.js"></script>
                <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
