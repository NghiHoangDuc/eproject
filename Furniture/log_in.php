<?php
include 'libs/database.php';
$con = db_connect();
session_start();
$login = NULL;
$mobile = "";
$password = "";
$admin_name = "";
if (isset($_POST['login'])) {
    if (isset($_POST['mobile']) && isset($_POST['password'])) {
        $mobile  = $_POST['mobile'];
      $password = $_POST['password'];
        //$password = md5($_POST['password']);
          // echo"<script>alert('$password')</script>";
    } else {
        exit;
    }
}

$ketqua = GetLogin($mobile, $password);
if (isset($ketqua) && is_object($ketqua)) {
    if ($ketqua->num_rows > 0) {
        while ($x = $ketqua->fetch_assoc()) {
            $_SESSION['Admin_name'] = $x['name'];
            $_SESSION['AdminBoss'] = $x['Boss'];
        }
    } else {
        echo 'login fail';
    }
}
if (isset($_SESSION['AdminBoss'])) {
    $login = $_SESSION['AdminBoss'];
    header("location: html.php?option=products_display");
}
?>
<html>

<head>
    <title>Log in</title>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="share/Admin.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
        <!-- Navbar Brand-->
        <a class="navbar-brand ps-3">DURABLE FURNITURES</a>
        <!-- Sidebar Toggle-->

        <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="log_out.php">Logout</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">

                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    DURABLE FURNITURES
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main>
                <div class="container-fluid px-4">
                    <h1 class="mt-4">Log In</h1>
                    <ol class="breadcrumb mb-4">
                        <li class="breadcrumb-item active">Admin</li>
                    </ol>
                    <div class="card mb-4">
                        <div class="card-header">
                            <i class="fas fa-table me-1"></i>
                            Log in area
                        </div>
                        <center>
                            <div class="card-body">
                                <table id="datatablesSimple" border="1" width="100%">
                                    <form method="post" name="f2">
                                        <div class="Login">
                                            <table>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="">Phone Number</span>
                                                            </div>
                                                            <input type="number" name="mobile" class="form-control">

                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                </tr>
                                                <tr>
                                                    <td></td>
                                                    <td>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text" id="">Admin Password</span>
                                                            </div>
                                                            <input type="password" name="password" class="form-control">

                                                        </div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td></td>
                                                    <td> <button class="btn btn-secondary" name="login">Log in</button> </td>
                                                </tr>
                                            </table>
                                        </div>
                                    </form>
                                </table>
                            </div>
                        </center>
                    </div>
                </div>
            </main>
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="js/datatables-simple-demo.js"></script>
</body>

</html>