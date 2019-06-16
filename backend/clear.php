<?php
mysqli_query($con, "DELETE FROM data_supplier") or die(mysqli_error($con));
mysqli_query($con, "DELETE FROM tb_supplier") or die(mysqli_error($con));
mysqli_query($con, "DELETE FROM fuzzy_supplier") or die(mysqli_error($con));
mysqli_query($con, "DELETE FROM hasil_prefensi") or die(mysqli_error($con));
mysqli_query($con, "DELETE FROM rating_kinerja") or die(mysqli_error($con));
?>

<script>
    window.location='admin.php?p=datasuplier';
</script>