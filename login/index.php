<?php
$con = mysqli_connect('localhost', 'root', '', 'spk_saw') or die(mysqli_error());
$errors = [];
$infos = [];
?>

<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from stacksthemes.com/metro/theme/templates/admin1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Oct 2018 04:41:46 GMT -->
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Responsive Admin Dashboard Template">
        <meta name="keywords" content="admin,dashboard">
        <meta name="author" content="stacks">
        <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        
        <!-- Title -->
        <title>Login Form</title>

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link href="../assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="../assets/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <link href="../assets/plugins/icomoon/style.css" rel="stylesheet">
        <link href="../assets/plugins/waves/waves.min.css" rel="stylesheet">
        <link href="../assets/plugins/uniform/css/default.css" rel="stylesheet">
        <link rel="shortcut icon" href="../favicon.png" type="image/x-icon">
      
        <!-- Theme Styles -->
        <link href="../assets/css/metrotheme.min.css" rel="stylesheet">
        <link href="../assets/css/custom.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        
        <!-- Page Container -->
        <div class="page-container register-page">
            
            <!-- Page Content -->
            <div class="page-content">
            <?php
            if ( $_GET['p'] == 'login' || $_GET['p'] == '') {
                include('login.php');
            } else if ( $_GET['p'] == 'regis' ) {
                include('regis.php');
            }

            ?>


               
            </div><!-- /Page Content -->
        </div><!-- /Page Container -->
        
        
        <!-- Javascripts -->
        <script src="../assets/plugins/jquery/jquery-3.1.0.min.js"></script>
        <script src="../assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="../assets/plugins/waves/waves.min.js"></script>
        <script src="../assets/plugins/uniform/js/jquery.uniform.standalone.js"></script>
        <script src="../assets/js/metrotheme.min.js"></script>
    </body>

<!-- Mirrored from stacksthemes.com/metro/theme/templates/admin1/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Oct 2018 04:41:46 GMT -->
</html>