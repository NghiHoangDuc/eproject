<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
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
                                <div class="sb-sidenav-menu-heading">Brands</div>
                                <a class="nav-link" href="html.php?option=add_brands">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Add brands
                                </a>
                                <a class="nav-link" href="html.php?option=brands">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Display All brands
                                </a> 
    
                                <div class="sb-sidenav-menu-heading">Products</div>

                                 <a class="nav-link" href="html.php?option=products_add">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Add Products
                                </a>
                                <a class="nav-link" href="html.php?option=products_display">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Display All Products
                                </a> 

                                <div class="sb-sidenav-menu-heading">Category</div>

                                 <a class="nav-link" href="html.php?option=category_add">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Add Category
                                </a>
                                <a class="nav-link" href="html.php?option=category_display">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Display All Category
                                </a> 
    
                                <div class="sb-sidenav-menu-heading">Supper Admin</div>
                                <a class="nav-link" href="html.php?option=display">
                                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                    Display Admin
                                </a>
                            </div>
                        </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        <?php
                        echo $_SESSION['Admin_name'];
                        ?>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <?php 
                    
                        if(isset($_GET['option'])){
                            switch ($_GET['option']){
                                case 'brands':
                                    include 'brand_index.php';
                                    break;
                            
                                case 'display':
                                    include 'admin_display.php';
                                    break;
                                
                                case 'sign_up':
                                    include 'sign_up.php';
                                    break;

                                case 'delete':
                                    include 'admin_delete.php';
                                    break;

                                case 'edit':
                                    include 'admin_edit.php';
                                    break;

                                case 'add_brands':
                                        include 'add_brands.php';
                                        break;
                                    
                                case 'edit_brands':
                                        include 'edit_brands.php';
                                        break;
    
                                case 'delete_brands':
                                        include 'delete_brands.php';
                                        break;
                                case 'products_add':
                                        include 'products_add.php';
                                        break;
                                case 'products_display':
                                        include 'products_index.php';
                                        break;
                                
                                case 'products_edit':
                                        include 'products_edit.php';
                                        break;
                                case 'category_add':
                                        include 'category_add.php';
                                        break;
                                        
                                case 'category_display':
                                         include 'category_index.php';
                                         break;  
                                                      
                                case 'category_update':
                                        include 'category_update.php';
                                         break;  
                             }
                      }
                   
                    
                    
                     ?>
                   
                </main>

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
