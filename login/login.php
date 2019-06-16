<!-- Page Inner -->
 <div class="page-inner">
    <div id="main-wrapper"><div class="row">
            <div class="col-md-3 col-login-box-alt">
                <div class="panel panel-white login-box">
                    <div class="panel-body">
                        <a href="index.html" class="logo-name">mboy</a>
                        <p class="m-t-md">Please login into your account</p>
                        <?php include('proses.php') ?>
                        <?php include('errors.php') ?>
                        <form class="m-t-md" action="" method="post">
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="username" required="">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="password form-control" placeholder="Password" required="">
                            </div>
                            <button type="submit" class="btn btn-success btn-block" name="login">Login</button>
                            <a href="index.php?p=regis" class="btn btn-default btn-block metro-reg-button">Create an account</a>
                            <!-- <a href="#" class="display-block text-muted">Forgot Password?</a> -->
                        </form>
                        <p class="text-center m-t-xs text-sm login-footer">2018 &copy; stacks</p>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Main Wrapper -->
</div><!-- /Page Inner -->

