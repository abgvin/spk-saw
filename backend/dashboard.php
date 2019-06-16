<div class="row">
    <div class="col-md-3">
        <div class="panel panel-white">
            <div class="panel-heading clearfix">
                <h4 class="panel-title">User Profile</h4>
            </div>
            <div class="panel-body user-profile-panel">
                <img src="../assets/images/avatars/avatar5.png" class="user-profile-image img-circle" alt="">
                <h4 class="text-center m-t-lg"><?= $_SESSION['user'] ?></h4>
                <p class="text-center">Level User</p>
                <hr>
                <ul class="list-unstyled text-center">
                   
                </ul>
                <hr>
                <a href="admin.php?p=logout" class="btn btn-info btn-block">Logout</a>
            </div>
        </div>
    </div>
    
</div><!-- Row -->