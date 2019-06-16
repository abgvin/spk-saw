<?php
if ( isset($_POST['login']) ) {
    $username = trim(mysqli_real_escape_string($con, $_POST['username']));
    $password = trim(mysqli_real_escape_string($con, $_POST['password']));
    $password = md5($password);

    $sqls = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$username' AND password = '$password'") or die (mysqli_error($con));
    $sql = mysqli_fetch_array($sqls);
    if ( mysqli_num_rows($sqls) == 1 ) {
        $_SESSION['user'] = $sql['nama_lengkap'];
    ?>    
     <script>
         window.location='../backend/'
     </script>   

    <?php } else {
        array_push($errors, "Username / Password salah ");
    }
} else if ( isset($_POST['submit']) ) {
    $nama = trim(mysqli_real_escape_string($con, $_POST['nama']));
    $username = trim(mysqli_real_escape_string($con, $_POST['username']));
    $password = trim(mysqli_real_escape_string($con, $_POST['password']));

    $cekusers = mysqli_query($con, "SELECT * FROM tb_user WHERE username = '$username'") or die(mysqli_error($con));
    if ( mysqli_num_rows($cekusers) == 1 ) {
        array_push($errors, "Username telah digunakanan, coba username lainnya");
    } else {
        $password = md5($password);
        mysqli_query($con, "INSERT INTO tb_user (nama_lengkap, username, password) VALUES ('$nama', '$username', '$password')") or die(mysqli_error($con));
        array_push($infos, "Registrasi Berhasil, klik login untuk melanjutkan");
        ?>

    <?php }
}

?>