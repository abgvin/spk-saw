<?php
$con = mysqli_connect('localhost', 'root', '', 'spk_saw') or die(mysqli_error());
include('../assets/lib/vendor/autoload.php');
session_start();
if ( empty($_SESSION['user']) || $_SESSION['user'] == '' ) {
    echo "<script>
            window.location='../login/index.html'
          </script>";
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from stacksthemes.com/metro/theme/templates/admin1/admin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Oct 2018 04:33:49 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>SPK - SAW</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../assets/plugins/icomoon/style.css" rel="stylesheet">
        <link href="../assets/plugins/waves/waves.min.css" rel="stylesheet">
        <link href="../assets/plugins/uniform/css/default.css" rel="stylesheet">
        <link href="../assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>	
        <link href="../assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/switchery/switchery.min.css" rel="stylesheet"/>
      
        <!-- Theme Styles -->
        <link href="../assets/css/metrotheme.min.css" rel="stylesheet">
        <link href="../assets/css/custom.css" rel="stylesheet">
        <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <!-- Page Container -->
        <div class="page-container">
            <!-- Page Sidebar -->
            <div class="page-sidebar">
                <a class="logo-box" href="index.html"><span>SAW SUPPLIER</span>
                    <i class="icon-close" id="sidebar-toggle-button-close"></i></a>
                <div class="page-sidebar-inner">
                    <div class="page-sidebar-menu">
                        <ul class="accordion-menu">
                        <?php
                        if ( $_GET['p'] == '' || $_GET['p'] == 'dashboard') { ?>
                            <li class="active-page">
                        <?php } else { ?>
                            <li>
                        <?php } ?>
                                <a href="admin.php?p=dashboard">
                                    <i class="menu-icon icon-home4"></i><span>Dashboard</span>
                                </a>
                            </li>
                            <?php
                            if ( $_GET['p'] == 'datasuplier' ) { ?>
                            <li class="active-page">
                            <?php } else { ?>
                            <li>
                            <?php } ?>
                                <a href="admin.php?p=datasuplier">
                                    <i class="menu-icon icon-inbox"></i><span>Data Suplier</span>
                                </a>
                            </li>
                            <?php
                            if ( $_GET['p'] == 'nilfuzzy' ) { ?>
                            <li class="active-page">
                            <?php } else { ?>
                            <li>
                            <?php } ?>
                                <a href="admin.php?p=nilfuzzy">
                                    <i class="menu-icon icon-show_chart"></i><span>Nilai Fuzzy</span>
                                </a>
                            </li>
                            <?php
                            if ( $_GET['p'] == 'proses' ) { ?>
                            <li class="active-page">
                            <?php } else { ?>
                            <li>
                            <?php } ?>
                                <a href="admin.php?p=proses">
                                    <i class="menu-icon icon-star"></i><span>Proses SAW</span>
                                </a>
                            </li>
                            <?php
                            if ( $_GET['p'] == 'rangking' ) { ?>
                            <li class="active-page">
                            <?php } else { ?>
                            <li>
                            <?php } ?>
                                <a href="admin.php?p=rangking">
                                    <i class="menu-icon icon-format_list_bulleted"></i><span>Hasil Rangking</span>
                                </a>
                            </li>
                            <li class="menu-divider"></li>
                            <?php
                            if ( $_GET['p'] == 'clear' ) { ?>
                            <li class="active-page">
                            <?php } else { ?>
                                <li>
                            <?php } ?>
                                <a href="admin.php?p=clear">
                                    <i class="menu-icon icon-flash_on"></i><span>Clear Data</span>
                                </a>
                            </li> 
                            <li class="menu-divider"></li>
                            <?php
                            if ( $_GET['p'] == 'logout' ) { ?>
                            <li class="active-page">
                            <?php } else { ?>
                                <li>
                            <?php } ?>
                                <a href="admin.php?p=logout">
                                    <i class="menu-icon icon-help_outline"></i><span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div><!-- /Page Sidebar -->
            
            <!-- Page Content -->
            <div class="page-content">
            
                <!-- Page Header -->
                <div class="page-header">
                    <div class="search-form">
                        <form action="#" method="GET">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control search-input" placeholder="Type something...">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" id="close-search" type="button"><i class="icon-close"></i></button>
                                </span>
                            </div>
                        </form>
                    </div>
                    <nav class="navbar navbar-default">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <div class="logo-sm">
                                    <a href="javascript:void(0)" id="sidebar-toggle-button"><i class="fa fa-bars"></i></a>
                                    <a class="logo-box" href="admin.html"><span>metro</span></a>
                                </div>
                                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                    <i class="fa fa-angle-down"></i>
                                </button>
                            </div>
                        
                            <!-- Collect the nav links, forms, and other content for toggling -->
                        
                            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                                <ul class="nav navbar-nav">
                                    <li class="collapsed-sidebar-toggle-inv"><a href="javascript:void(0)" id="collapsed-sidebar-toggle-button"><i class="fa fa-bars"></i></a></li>
                                    <li><a href="javascript:void(0)" id="toggle-fullscreen"><i class="fa fa-expand"></i></a></li>
                                    <li><a href="javascript:void(0)" id="search-button"><i class="fa fa-search"></i></a></li>
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.container-fluid -->
                    </nav>
                </div><!-- /Page Header -->
                <!-- Page Inner -->
                <div class="page-inner no-page-title">
                    
                    <div id="main-wrapper">
                       
                        <?php
                        if ( $_GET['p'] == 'dashboard' || $_GET['p'] =='' ) {
                            include('dashboard.php');
                        } else if ( $_GET['p'] == 'datasuplier' ) {
                            include('datasuplier.php');
                        } else if ( $_GET['p'] == 'nilfuzzy' ) {
                            include('nilfuzzy.php');
                        } else if ( $_GET['p'] == 'proses' ) {
                            include('proses.php');
                        } else if ( $_GET['p'] == 'rangking' ) {
                            include('rangking.php');
                        } else if ( $_GET['p'] == 'clear' ) {
                            include('clear.php');
                        } else if ( $_GET['p'] == 'logout' ) {
                            include('logout.php');
                        }

                        ?>

                    </div><!-- Main Wrapper -->

                    
                <div class="page-footer">
                    <p>Made with <i class="fa fa-magnet"></i> by stacks</p>
                </div>
                </div><!-- /Page Inner -->
                
                
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
        
        
        <!-- Javascripts -->
        <!-- <script src=../assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src=../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src=../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src=../assets/plugins/waves/waves.min.js"></script> -->
        <!-- <script sr../assets/plugins/uniform/js/jquery.uniform.standalone.js"></script> -->
        <!-- <script sr../assets/plugins/switchery/switchery.min.js"></script> -->
        <script src="../assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/waves/waves.min.js"></script>
        <script src="../assets/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="../assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="../assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
        <script src="../assets/plugins/switchery/switchery.min.js"></script>
        <script src="../assets/js/metrotheme.min.js"></script>
        <script src="../assets/js/pages/table-data.js"></script>
    </body>

<!-- Mirrored from stacksthemes.com/metro/theme/templates/admin1/admin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Oct 2018 04:35:48 GMT -->
</html>